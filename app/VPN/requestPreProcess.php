<?php
/**
 * Created by PhpStorm.
 * User: ahmad.ta
 * Date: 12/23/2018
 * Time: 8:30 PM
 */

namespace App\VPN;


class receivedMsgProcess
{
    private $receivedMessage;
    private $isMessageObject=False;
    private $isCallbackQueryObject=False;
    private $MessageObjectText=null;
    private $callbackObjectData=null;

    public function __construct($message)
    {
        $this->receivedMessage=$message;
        $this->extractCommand();
//        $this->saveReceivedMessageToDB();
    }

    /**extract commands from message received from user
     * @param $message
     * @return mixed
     */
    public function extractCommand()
    {
        if($this->isMessage()){
            $this->isMessageObject=True;
            $this->MessageObjectText=$this->receivedMessage->message->text;
        }
        elseif($this->isCallBack()){
            $this->isCallbackQueryObject=True;
            $this->callbackObjectData=$this->receivedMessage->callback_query->data;
        }
    }


//    private function saveReceivedMessageToDB()
//    {
//        $DBTable=new dfds();
//        $DBTable->saveToDB($this->receivedMessage);
//    }


    /**check Telegram message that is message type or not.
     * @return bool
     */
    private function isMessage()
    {
       return isset($this->receivedMessage->message)? true :false;
    }


    /**check Telegram message that is callback type or not
     * @return bool
     */
    private function isCallBack()
    {
        return isset($this->receivedMessage->callback_query) ? true : false;
    }
}

