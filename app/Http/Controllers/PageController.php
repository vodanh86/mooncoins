<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    public function promote()
    {
        return view('promote');
    }

    public function newsletter()
    {
        return view('newsletter');
    }

    public function viewCoin($id){
        $coin = Coin::find($id);
        $user = null;
        if (auth()->user()){
            $user = User::find(auth()->user()->id);
        }

        return view('view', [
            'coin' => $coin,
            'user' => $user
        ]);
    }

    public function checkIp($coins){
        $updatedCoins = array();
        foreach($coins as $i => $coin){
            if (strpos($coin["ips"].",", $_SERVER['REMOTE_ADDR'].",") === false) {
                $coin["voted"] = 0;
            } else {
                $coin["voted"] = 1;
            }
            $updatedCoins[] = $coin;
        }
        return $updatedCoins;
    }
}
