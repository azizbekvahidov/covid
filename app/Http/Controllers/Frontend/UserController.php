<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use App\UserMessage;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() {
        return view("frontend.user.index");
    }

    public function profile() {
        return view("frontend.user.profile");
    }

    public function edit() {
        return view("frontend.user.edit");
    }

    public function update(Request $request) {
        $rule = [];

//        dd(bcrypt("11111111"));
//        dd($request->all(), \Auth::user());
        if (!is_null($request->old_password)) {
            if (password_verify($request->old_password, \Auth::user()->password)) {
                $rule = [
                    "name"      => "required|string",
                    "password"  => "required|confirmed",
                ];
            }
            else {
                return redirect()->back()->with(["message" => __("box.wrong_password")]);
            }
        }

        else {
            $rule = [
                "name"      => "required|string",
            ];
        }
        \Validator::make($request->all(), $rule)->validate();

        if($request->phone) {
//            dd($request->all(),\Auth::user()->verifyCode);
            if(\Auth::user()->verifyCode != $request->verifyCode){
                return redirect()->back()->with(["message" => __("box.wrong_verification_code")]);
            }

            /*Generating new confirm code and send to user*/
        }

        $file = $request->file("photo");
        if($file) {
            $extension = $file->getClientOriginalExtension();
            $photo_name = "IMG_".date("Y-m-d_H-i-s.").$extension;
            $file->storeAs("/public/avatars", $photo_name);

        }
        $user = User::find(\Auth::user()->id);
        $user->FIO  = $request->name;
        $request->birth ? $user->birth = $request->birth : "";
        $request->old_password ? $user->password = bcrypt($request->password) : "";
        $request->phone ? $user->phone = $request->phone: "";
        $file ? $user->photo = $photo_name : "";
        $file ? $user->verifyCode = "" : "";
        $user->save();

        return redirect("/user/index")->with(["message" => __("box.user_data_changed")]);
    }

    public function sendMessage(Request $request) {
//        dd($request->all());
        $strCode = mt_rand(100000,999999);
        $strPhone = "998".str_replace("-", "", str_replace(")", "", str_replace("(", "", $request->phone)));
        $userMessage = UserMessage::create([
            'phone'=>$strPhone,
            'smsCode'=>$strCode
        ]);
        try {
            User::wherePhone($strPhone)->update(["verifyCode" => $strCode]);

            return response()->json([
                "status"        => 'success',
                "message"       => \Auth::user()->id,
            ],200);

        }
        catch (\Exception $exception){
            return response()->json([
                "status" => 'error',
                "message" => $exception->getMessage()
            ],500);
        }
    }


}