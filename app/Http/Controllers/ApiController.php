<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Wallet;
use App\Coin;
use App\OrderHistory;
use App\Paket;
use App\InvestmentUser;

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
        $vnc = (int) $eth / $idr;

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
        $vnc = (int) $idr / $eth;

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
        OrderHistory::create([
            'user_email' => $request->email,
            'action' => 'Convert VNC to ETH',
            'total' => $request->total_coin,
            'result' => 'success'
        ]);
        

        return redirect()->back();
    }

    public function convertEthVnc(Request $request)
    {
        $wallet = Wallet::where('user_email', $request->email)->first();
        $total_coin = (float) $wallet->total_coin + $request->total_coin;
        $total_eth = (float) $wallet->total_eth - $request->total_eth;
        Wallet::where('user_email', $request->email)->update([
            'total_coin' => $total_coin,
            'total_eth' => $total_eth
        ]);
        OrderHistory::create([
            'user_email' => $request->email,
            'action' => 'Convert ETH to VNC',
            'total' => $request->total_eth,
            'result' => 'success'
        ]);

        return redirect()->back();
    }

    public function withdrawCallback(Request $request) 
    {
        return "ok";
    }

    public function deposit(Request $request)
    {
        $coin = Coin::first();
        if($coin->stage_1 > 0) {
            $stage = 'stage_1';
            $coin = $coin->stage_1;
        } elseif($coin->stage_2 > 0 && $coin->stage_1 == 0) {
            $stage = 'stage_2';
            $coin = $coin->stage_2;
        } else {
            $stage = 'stage_1';
            $coin = $coin->stage_3;
        }

        
        $wallet = Wallet::where('user_email', $request->email)->first();
        $wallet = $wallet->total_coin;
        
        // date now
        $now = Carbon::now('Asia/Jakarta');

        Coin::where('id', 1)->update([$stage => $coin - $request->total_coin,]);
        Wallet::where('user_email', $request->email)->update([
            'total_coin' => $wallet + $request->total_coin,
            ]);
        OrderHistory::create([
            'user_email' => $request->email,
            'action' => 'Deposit VNC',
            'total' => $request->total_coin,
            'result' => 'pending',
            'description' => 'Wait transfer ETH to VIP Bitcoin Account',
            'expired_date' => $now->addHours(2),
            'transfer_need' => $request->total_eth
        ]);
        
        return redirect('loading');
    }
    
    public function withdraw(Request $request)
    {
        $wallet = Wallet::where('user_email', $request->email)->first();
        $wallet = $wallet->total_eth;
        
        Wallet::where('user_email', $request->email)->update([
            'total_eth' => $wallet - $request->total_eth,
            ]);
        OrderHistory::create([
            'user_email' => $request->email,
            'action' => 'Withdraw ETH',
            'total' => $request->total_eth,
            'result' => 'success'
        ]);
            
        return redirect('home');
    }

    public function depositPlans(Request $request)
    {
        $plans = Paket::where('name', $request->paket_name)->first();
        $wallets = Wallet::select('total_coin')->where('user_email', $request->user_email)->first();
        $wallet = (float) $wallets->total_coin - $request->total_deposit;
        $dt = Carbon::now('Asia/Jakarta');
        $edt = Carbon::now('Asia/Jakarta');
        $edt = $edt->addMonths($plans->contract);

        $request['total_reward'] = (float) ($request->total_deposit * $plans->reward) / 100;
        $request['join_date'] = $dt->year.'-'.$dt->month.'-'.$dt->day;
        $request['reward_date'] = $dt->day;
        $request['expired_date'] = $edt->year.'-'.$edt->month.'-'.$edt->day;

        $requestData = $request->all();
        InvestmentUser::create($requestData);
        Wallet::where('user_email', $request->user_email)->update([
            'total_coin' => $wallet,
        ]);

        return redirect('/client-investment');
    }

}
