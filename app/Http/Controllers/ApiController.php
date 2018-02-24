<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getEthVns()
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

        // formula to get vns
        $vns = (int) ($eth / $idr)*10;

        if($vns) {
            $result = array(
                "success" => true,
                "statusCode" => 200,
                "response" => $vns
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
}
