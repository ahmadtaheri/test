<?php
/**
 * Created by PhpStorm.
 * User: ahmad.ta
 * Date: 12/13/2018
 * Time: 4:46 PM
 */

namespace App\VPN;
use App\VPN\incomingRequestPolish;

class telegram
{
    private $botToken="774012444:AAFSP_td7mXRrLmJrmdDBZLUNsf0xOLcnUc";
    private $botUrl = "https://api.telegram.org/bot";
    private $polishedMsg;
    private $chatId;
    Private $sendMessageMethod="/sendmessage";

    /**
     * The Constructor Sets $chatId
     * @param $chatId
     */
    public function __construct(incomingRequestPolish $message)
    {
        $this->polishedMsg = $message;
        $this->setChatId();
    }


    /**
     * @param mixed $chatId
     */
    public function setChatId(): void
    {

        $this->chatId = $this->polishedMsg->chatId;
    }


    /**
     *generate telegram bot url
     * @return string
     */
    private function botUrl()
    {
        return $this->botUrl.$this->botToken;
    }


    /** doing curl function
     * @param $url
     * @return bool|string , it will return the result on success, FALSE on failure.
     */
    private function curl($url)  {

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result=curl_exec($curl);

        curl_close($curl);

        return $result;

    }


    /**
     * send message to Telegram bot and telegram send it to user
     * @param $text
     * @param $replyMarkup ( inline keyboard )
     * @return bool|string , it will return the result on success, FALSE on failure.
     */
    public function sendMessage($text, $replyMarkup=null)
    {
        $parameters=array
        (
            "chat_id"=>$this->chatId,
            "text"=>$text,
            "parse_mode"=>"HTML",
            "disable_web_page_preview"=>"False",
            "disable_notification"=>"False",
            "reply_markup"=>$replyMarkup,

        );
        $url=$this->botUrl().$this->sendMessageMethod."?".http_build_query($parameters);
        return $this->curl($url);
    }
}