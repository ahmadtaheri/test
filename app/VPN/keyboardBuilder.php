<?php
/**
 * Created by PhpStorm.
 * User: ahmad.ta
 * Date: 12/22/2018
 * Time: 3:09 PM
 */

namespace App\VPN;


class keyboardBuilder
{
    public static function button($text,$callbackData,$url="")
    {
        return ['text'=>$text,'callback_data'=>$callbackData,'url'=>$url];
    }

    public static function inlineKeyboard($rows)
    {
        return  json_encode(['inline_keyboard' => $rows]);

    }
}