<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\UserMessage;
use Illuminate\Auth\Events\Registered;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm($id)
    {
        return view('auth.register', ["id" => $id]);
    }


    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $photo = $request->file("photo");
        event(new Registered($user = $this->create($request->all(), $photo)));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }





    public function verifyPhone(){
        return view("auth.verifyPhone");
    }

    public function sendMessage(Request $request){
        $strCode = mt_rand(100000,999999);
        $strPhone = "998".str_replace("-", "", str_replace(")", "", str_replace("(", "", $request->phone)));
        $userMessage = UserMessage::create([
            'phone'=>$strPhone,
            'smsCode'=>$strCode
        ]);
        $user_mes_id = $userMessage->id;
        $data = '{ "messages": [{'.
                        '"recipient": "'. $strPhone .'",'.
                        '"message-id": "sogbolinguz' . $user_mes_id . '",'.
                        '"sms": {'.
                            '"originator": "3700",'.
                            '"content":{ '.
                                '"text": "'. $strCode .'"}}}]}';




        $url = "http://91.204.239.44/broker-api/send";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Basic ".base64_encode("xakimtashkent:ma4PdW1"),
            'Content-Type: application/json'));

        $returned = curl_exec($ch);
        curl_close ($ch);
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
                if($userModel->verify) {
                    session(["phone"    => substr($strPhone,3)]);
                    session(["message"  => __("box.authorized_message")]);
                    return response()->json([
                        "url" => "/login",
                    ], 200);
                }
                User::destroy($userModel->id);
                $user = User::create([
                    'phone'         => $strPhone,
                    'verifyCode'    => $strCode,
                ]);
                return response()->json([
                    "status"        => 'success',
                    "message"       => $user->id
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
            $userModel->verifyCode  = "";
            $userModel->save();
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

        if(!is_null($userModel->password)){
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
        if ($request->password === $request->confirm_password) {
            $userModel->password = bcrypt($request->password);
            $userModel->save();

            return redirect($id."/register");
        }

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
            'FIO'       => ['required', 'string', 'max:255'],
            'gender'    => ['required', 'string'],
            'birth'     => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data, $photo = null)
    {
        $user = User::find($data["id"]);
//        dd($data, $photo);
        if (is_null($photo)) {
            $user->gender   = $data["gender"];
            $user->FIO      = $data["FIO"];
            $user->birth    = $data["birth"];
            $user->verify   = "1";
            $user->role     = "3";
            $user->save();
        }
        else {
            $extension = $data["photo"]->getClientOriginalExtension();
            $photo_name = "IMG_".date("Y-m-d_H-i-s.").$extension;
            $data["photo"]->storeAs("/public/avatars", $photo_name);

            $user->gender   = $data["gender"];
            $user->FIO      = $data["FIO"];
            $user->birth    = $data["birth"];
            $user->verify   = "1";
            $user->photo    = $photo_name;
            $user->role     = "3";
            $user->save();
        }
        return $user;
    }
}
