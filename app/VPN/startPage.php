<?php
/**
 * Created by PhpStorm.
 * User: ahmad.ta
 * Date: 12/25/2018
 * Time: 3:59 AM
 */

namespace App\VPN;

use App\VPN\keyboardBuilder;
use App\VPN\telegram;
use App\VPN\responseInterface;

class startPage implements responseInterface
{
    private $telegram;

    public function __construct(telegram $tg)
    {
        $this->telegram = $tg;
    }

    public function keyboard()
    {
        $buttonNewAccount = keyboardBuilder::button("میخواهم اکانت جدید VPN بسازم", "newaccount");
        $row1 = array($buttonNewAccount);
        $buttonOldAccount = keyboardBuilder::button("از قبل اکانت VPN دارم.( اعتبار باقیمانده، بازیابی پسورد، تمدید،ارتباط با پشتیبانی  و ....)", "oldaccount");
        $row2 = array($buttonOldAccount);
        return keyboardBuilder::inlineKeyboard(array($row1, $row2));
    }

    public function sendResponse()
    {
        $text = "ویژگی های استفاده از ربات  VPN Factory: 
 نام کاربری و پسورد بلافاصله پس از درخواست شما ساخته می شود.
 پس از ایجاد نام کاربری و پسورد شما می توانید تا 3 روز به صورت رایگان از VPN استفاده کنید.
 نیاز نیست در لحظه درخواست VPN هزینه ای بپردازید.
 پس از استفاده رایگان و کسب اطمینان از کیفیت VPN تا 3 روز فرصت پرداخت هزینه دارید.
هزینه پرداختی در این ربات به نسبت سایرین کمتر است. چون ما معتقد به سود کم و فروش بیشتر هستیم. ";
        $this->telegram->sendMessage($text, $this->keyboard());
    }


}