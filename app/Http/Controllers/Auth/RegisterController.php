<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function verifyPhone(){
        return view("auth.register1");
    }

    public function sendMessage(Request $request){
        $strCode = "222222";
        $strPhone = "998".str_replace("-", "", str_replace(")", "", str_replace("(", "", $request->phone)));

        $obj = [
          "messages" => [
                "recipient" => $strPhone,
                "message-id" => $strCode,
          ],
        ];
        $json = json_encode($obj);
        $url = "http://91.204.239.44/broker-api/send";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $returned = curl_exec($ch);
        print_r($ch);
        curl_close ($ch);
        dd($returned, $json);
        die();

        try {
            $userModel = User::wherePhone($strPhone)->first();
            if(empty($userModel)){
                $user = User::create([
                    'phone' => $strPhone,
                    'verifyCode' => $strCode,
                ]);
                return response()->json([
                    "status" => 'success',
                    "message" => $user->id
                ],200);
            }
            else{
                User::destroy($userModel->id);
                $user = User::create([
                    'phone' => $strPhone,
                    'verifyCode' => $strCode,
                ]);
                return response()->json([
                    "status" => 'success',
                    "message" => $user->id
                ],200);
            }
        }
        catch (\Exception $exception){
            return response()->json([
                "status" => 'error',
                "message" => $exception->getMessage()
            ],500);
        }
    }

    public function verifyCode(Request $request){
        $userModel = User::find($request->id);
        if($userModel->verifyCode == $request->verifyCode){
            return response()->json([
                "status" => 'success',
                "message" => "verified"
            ],200);
        }
        else{
            return response()->json([
                "status" => 'success',
                "message" => "not verified"
            ],200);
        }
    }

    public function setPassword($id){
        $userModel = User::find($id);
        if($userModel->password != null){
            return redirect()->route("register.verifyPhone");
        }
        else{
            return view("auth.setpass",[
                'id'=>$id
            ]);

        }
    }

    public function savePassword($id,Request $request){
        $userModel = User::find($id);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::find($data["id"]);
        if (is_null($data['file'])) {
            $user->FIO      = $data["FIO"];
            $user->gender   = $data["gender"];
            $user->birth    = $data["birth"];
//            $user->save();
        }
        else {
            $user->FIO      = $data["FIO"];
            $user->gender   = $data["gender"];
            $user->birth    = $data["birth"];
//            $user->save();
        }
        return $user;
    }
}
