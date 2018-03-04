<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Wallet;

class ApiController extends Controller
{
    public function getEthVnc()
    {
        // get guzzle class
        $client = new \GuzzleHttp\Client();

        // get convert currencies usd to idr
        $request = $client->request('GET', 'https://api.fixer.io/latest?base=USD&symbols=IDR');
        $idr = json_decode($request->getBody()->getContents(), true);
        $idr = (int) $idr['rates']['IDR'];
        
        // get convert eth to idr
        $request2 = $client->request('GET', 'https://vip.bitcoin.co.id/api/eth_idr/ticker');
        $eth = json_decode($request2->getBody()->getContents(), true);
        $eth = (int) $eth['ticker']['last'];
        // 13jt

        // formula to get vnc
        $vnc = (int) ($eth / $idr) / 10;

        if($vnc) {
            $result = array(
                "success" => true,
                "statusCode" => 200,
                "response" => $vnc
            );
        } else {
            $result = array(
                "success" => false,
                "statusCode" => 400,
                "response" => null
            );
        }
        
        return json_encode($result);        
        
    }

    public function getVncEth()
    {
        // get guzzle class
        $client = new \GuzzleHttp\Client();

        // get convert currencies usd to idr
        $request = $client->request('GET', 'https://api.fixer.io/latest?base=USD&symbols=IDR');
        $idr = json_decode($request->getBody()->getContents(), true);
        $idr = (int) $idr['rates']['IDR'];
        
        // get convert eth to idr
        $request2 = $client->request('GET', 'https://vip.bitcoin.co.id/api/eth_idr/ticker');
        $eth = json_decode($request2->getBody()->getContents(), true);
        $eth = (int) $eth['ticker']['last'];
        // 13jt

        // formula to get vnc
        $vnc = (int) ($idr * 10) / $eth;

        if($vnc) {
            $result = array(
                "success" => true,
                "statusCode" => 200,
                "response" => $vnc
            );
        } else {
            $result = array(
                "success" => false,
                "statusCode" => 400,
                "response" => null
            );
        }
        
        return json_encode($result);
    }

    public function convertVncEth(Request $request)
    {
        $wallet = Wallet::where('user_email', $request->email)->first();
        $total_coin = (float) $wallet->total_coin - $request->total_coin;
        $total_eth = (float) $wallet->total_eth + $request->total_eth;
        Wallet::where('user_email', $request->email)->update([
            'total_coin' => $total_coin,
            'total_eth' => $total_eth
        ]);

        return redirect()->back();
    }

    public function convertEthVnc(Request $request)
    {
        dd($request);
    }

    public function withdrawCallback(Request $request) 
    {
        return "ok";
    }

}
