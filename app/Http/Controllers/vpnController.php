<?php

namespace App\Http\Controllers;

use App\VPN\newAccountPage;
use App\VPN\oneMonthPlanPage;
use App\VPN\startPage;
use Illuminate\Http\Request;
use App\VPN\incomingRequestPolish;
use App\VPN\telegram;


class vpnController extends Controller
{
    //
    public function test()
    {
        $Message = file_get_contents("php://input");
        $Message_Object= json_decode($Message);

        $message=json_decode('{
"update_id": 233970560,
"message": {
"message_id": 1791,
"from": {
"id": 535558561,
"is_bot": false,
"first_name": "Ahmad",
"last_name": "Taheri",
"username": "ahmadtaheri_ircl",
"language_code": "fa"
},
"chat": {
"id": 535558561,
"first_name": "Ahmad",
"last_name": "Taheri",
"username": "ahmadtaheri_ircl",
"type": "private"
},
"date": 1545575318,
"text": "/start",
"entities": [
{
"offset": 0,
"length": 6,
"type": "bot_command"
}
]
}
}');
        $callback=json_decode('{
"update_id": 233970563,
"callback_query": {
"id": "2300206505773940939",
"from": {
"id": 535558561,
"is_bot": false,
"first_name": "Ahmad",
"last_name": "Taheri",
"username": "ahmadtaheri_ircl",
"language_code": "fa"
},
"message": {
"message_id": 1789,
"from": {
"id": 774012444,
"is_bot": true,
"first_name": "VPN factory",
"username": "vpnfactorybot"
},
"chat": {
"id": 535558561,
"first_name": "Ahmad",
"last_name": "Taheri",
"username": "ahmadtaheri_ircl",
"type": "private"
},
"date": 1545566427,
"text": "dsd"
},
"chat_instance": "-4291612063202133648",
"data": "2"
}
}');
        $polishedMsg=new incomingRequestPolish($Message_Object);
        $tg= new telegram($polishedMsg);
//        dd($tg);
        (new oneMonthPlanPage($tg))->sendResponse();
//        if ($polishedMsg->isMessageObject==true&&$polishedMsg->MessageObjectText==='/start'){
//            return 'hi';
//        }

    }
}
