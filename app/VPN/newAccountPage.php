<?php
/**
 * Created by PhpStorm.
 * User: ahmad.ta
 * Date: 12/30/2018
 * Time: 6:18 AM
 */

namespace App\VPN;

use App\VPN\keyboardBuilder;
use App\VPN\telegram;
use App\VPN\responseInterface;

class newAccountPage implements responseInterface
{
    private $telegram;

    public function __construct(telegram $tg)
    {
        $this->telegram = $tg;
    }

    public function keyboard()
    {
        $buttonNewAccount = keyboardBuilder::button("یک ماهه ( 4000 تومان + سه روز تست رایگان)", "oneMonthPlan");
        $row1 = array($buttonNewAccount);
        $buttonThreeMonth = keyboardBuilder::button("سه ماهه ( 10000 تومان + سه روز تست رایگان)", "threeMonthPlan");
        $row2 = array($buttonThreeMonth);
        $buttonSixMonth = keyboardBuilder::button("شش ماهه ( 18000 تومان + سه روز تست رایگان)", "sixMonthPlan");
        $row3 = array($buttonSixMonth);
        $buttonOneYear = keyboardBuilder::button("یکساله ( 35000 تومان + سه روز تست رایگان)", "oneYearPlan");
        $row4 = array($buttonOneYear);
        return keyboardBuilder::inlineKeyboard(array($row1, $row2, $row3, $row4));
    }

    public function sendResponse()
    {
        $text = "لطفا یکی از طرح های زیر را انتخاب کنید:
        (نگران نباشید! تا 3 روز فرصت پرداخت هزینه دارید.)";
        $this->telegram->sendMessage($text, $this->keyboard());
    }
}