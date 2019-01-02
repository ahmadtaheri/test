<?php
/**
 * Created by PhpStorm.
 * User: ahmad.ta
 * Date: 12/24/2018
 * Time: 2:08 PM
 */

namespace App\VPN;


class incomingRequestPolish
{
    public $incomingRequest;
    public $isMessageObject = False;
    public $MessageObjectText = null;
    public $isCallbackQueryObject = False;
    public $callbackObjectData = null;
    public $chatId;

    public function __construct($message)
    {
        $this->incomingRequest = $message;
        $this->extractInfo();
//        $this->saveReceivedMessageToDB();
    }

    /**extract commands from message received from user
     * @param $message
     * @return mixed
     */
    public function extractInfo()
    {
        if ($this->isMessage()) {
            $this->isMessageObject = True;
            $this->chatId = $this->incomingRequest->message->from->id;
            $this->MessageObjectText = $this->incomingRequest->message->text;
        } elseif ($this->isCallBack()) {
            $this->isCallbackQueryObject = True;
            $this->chatId = $this->incomingRequest->callback_query->from->id;
            $this->callbackObjectData = $this->incomingRequest->callback_query->data;
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
        return isset($this->incomingRequest->message) ? true : false;
    }


    /**check Telegram message that is callback type or not
     * @return bool
     */
    private function isCallBack()
    {
        return isset($this->incomingRequest->callback_query) ? true : false;
    }
}