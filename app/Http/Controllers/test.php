<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VPN\Telegram;
use App\VPN\vpnMaker;
use App\VPN\keyboardBuilder;

class test extends Controller
{
    //

    public function test(Request $request)
    {

    }


    public function test1()
    {

//        $v = new vpnmaker();
////        return $v->resellerCredit();
//        return $v->deleteUser('at'.'67045207');




       $a=keyboardBuilder::button("a","1","https://www.google.com/");
       $b=keyboardBuilder::button("b","2");
       $c=keyboardBuilder::button("c","3");
       $row1=array($b,$a);
       $row2=array($c);
       $x=keyboardBuilder::menu(array($row1));
       $tg = new telegram("535558561");
       $tg->sendMessage("dsd",$x);
       dd($x);

//        dd($Message_Object);


    }

    /**
     * @return array
     */
    public function getMiddleware(): array
    {
        return $this->middleware;
    }

    /**
     * @param array $middleware
     */
    public function setMiddleware(array $middleware): void
    {
        $this->middleware = $middleware;
    }




}

