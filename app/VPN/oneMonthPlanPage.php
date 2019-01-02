<?php
/**
 * Created by PhpStorm.
 * User: ahmad.ta
 * Date: 12/30/2018
 * Time: 6:41 AM
 */

namespace App\VPN;

use App\VPN\keyboardBuilder;
use App\VPN\telegram;
use App\VPN\responseInterface;

class oneMonthPlanPage implements responseInterface
{
    private $telegram;

    public function __construct(telegram $tg)
    {
        $this->telegram = $tg;
    }

    public function keyboard()
    {
        $buttonOneMonthConfirmation = keyboardBuilder::button("از انتخاب اکانت یک ماهه اطمینان دارم.", "oneMonthPlanConfirmed");
        $row1 = array($buttonOneMonthConfirmation);
        $buttonBack = keyboardBuilder::button("بازگشت", "newAccount");
        $row2 = array($buttonBack);
        return keyboardBuilder::inlineKeyboard(array($row1, $row2));
    }

    public function sendResponse()
    {
        $text = "مرحله اطمینان از انتخاب";
        $this->telegram->sendMessage($text, $this->keyboard());
    }
}