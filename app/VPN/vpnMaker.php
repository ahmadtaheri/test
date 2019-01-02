<?php
/**
 * Created by PhpStorm.
 * User: ahmad.ta
 * Date: 12/14/2018
 * Time: 4:08 AM
 */

namespace App\VPN;


class vpnMaker
{
    private $apiKey="4d5d9a54e00e155b76155840ac744c87";
    private $resellerUserName="ahmad.taheri1988";


    /**
     * this function shows remained credit of reseller
     * @return bool|string
     */
    public function resellerCredit()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.vpnmakers.com/resellers/v2/info");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Auth-Name:".$this->resellerUserName, "X-Auth-Key:".$this->apiKey));
        $result = curl_exec($ch);
        return $result;
    }

    /**
     * @param $username
     * @param $password
     * @param string $credit
     * @return bool|string
     */
    public function newUserCreate($username, $password, $credit="7")
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.vpnmakers.com/resellers/v2/user/".$username);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Auth-Name:".$this->resellerUserName, "X-Auth-Key:".$this->apiKey));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array("credit"=>$credit, "password"=>$password)));
        $result = curl_exec($ch);
        return $result;
    }


    /**
     * shows user info including credit,password, ..
     * @param $user
     * @return bool|string
     */
    public function userInfo($user)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.vpnmakers.com/resellers/v2/user/".$user);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Auth-Name:".$this->resellerUserName, "X-Auth-Key:".$this->apiKey));
        $result = curl_exec($ch);
        return $result;
    }

    public function changePassword($user,$newPassword)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.vpnmakers.com/resellers/v2/user/".$user."/password");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Auth-Name:".$this->resellerUserName, "X-Auth-Key:".$this->apiKey));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array("password"=>$newPassword)));
        $result = curl_exec($ch);
        return $result;
    }

    public function changeCredit($user,$credit)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.vpnmakers.com/resellers/v2/user/".$user."/credit");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Auth-Name:".$this->resellerUserName, "X-Auth-Key:".$this->apiKey));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array("credit"=>$credit)));
        $result = curl_exec($ch);
        return $result;
    }


    /**
     * @param $user
     * @return bool|string
     */
    public function deleteUser($user)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.vpnmakers.com/resellers/v2/user/".$user);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Auth-Name:".$this->resellerUserName, "X-Auth-Key:".$this->apiKey));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $result = curl_exec($ch);
        return $result;
    }
}
