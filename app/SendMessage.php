<?php


namespace App;


class SendMessage
{

    public function sendSMS($phone,$msg){
//        $data = [
//            "app"   => "ws",
//            "u"     => "fyd7a",
//            "h"     => "ec9114005d6f0515b4ea2f2743909a9a",
//            "op"    => "pv",
//            "to"    => $phone,
//            "msg"   => $msg,
//        ];
//        $url = "https://developer.apix.uz/index.php";
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL,$url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
//        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
//        $returned = curl_exec($ch);
//        curl_close ($ch);
        $userMessage = UserMessage::create([
            'phone'=>$phone,
            'smsCode'=>$msg
        ]);
        $user_mes_id = $userMessage->id;
        $data = '{ "messages": [{'.
                        '"recipient": "'. $phone .'",'.
                        '"message-id": "sogbolinguz' . $user_mes_id . '",'.
                        '"sms": {'.
                            '"originator": "3700",'.
                            '"content":{ '.
                                '"text": "'. $msg .'"}}}]}';




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
    }
}
