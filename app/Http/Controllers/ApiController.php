<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Wallet;
use App\Coin;
use App\OrderHistory;
use App\Paket;
use App\InvestmentUser;
use App\User;

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

        if($total_coin < 50) {
            return redirect('home')->with('status', 'Sorry, you must have minimum 50 VNC !');
        } else {
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
        if($request->total_eth < 6) {
            return redirect('deposit');
        }
        $user = User::where('email', $request->email)->first();
        $wallet = Wallet::where('user_email', $request->email)->first();
        $wallet = $wallet->total_eth;
        $req = array(
            "currency" => "eth",
            "withdraw_address" => $user->vipwallet,
            "withdraw_amount" => $request->total_eth,
            "withdraw_memo" => "Withdraw",
            "request_id" => "Test",
        );
        
        // Wallet::where('user_email', $request->email)->update([
        //     'total_eth' => $wallet - $request->total_eth,
        //     ]);
        // OrderHistory::create([
        //     'user_email' => $request->email,
        //     'action' => 'Withdraw ETH',
        //     'total' => $request->total_eth,
        //     'result' => 'success'
        // ]);
            
        // $wd = ApiController::btcid_query("withdrawCoin", $req);
        
        return redirect('home');
    }

    public function deposit(Request $request)
    {
        if($request->total_coin < 6) {
            return redirect('deposit');
        }
        $coin = Coin::first();
        if($coin->stage_1 > 0) {
            $stage = 'stage_1';
            $coin = $coin->stage_1;
        } elseif($coin->stage_2 > 0 && $coin->stage_1 == 0) {
            $stage = 'stage_2';
            $coin = $coin->stage_2;
        } else {
            $stage = 'stage_3';
            $coin = $coin->stage_3;
        }

        
        $wallet = Wallet::where('user_email', $request->email)->first();
        $wallet = $wallet->total_coin;
        
        // date now
        $now = Carbon::now('Asia/Jakarta');
        
        Coin::where('id', 1)->update([$stage => $coin - $request->total_coin,]);
        // Wallet::where('user_email', $request->email)->update([
        //     'total_coin' => $wallet + $request->total_coin,
        //     ]);
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

        if ($wallet < 50) {
            return redirect('/client-investment')->with('error', 'You must have minimum 50 VNC !');
        } else {
            $requestData = $request->all();
            InvestmentUser::create($requestData);
            Wallet::where('user_email', $request->user_email)->update([
                'total_coin' => $wallet,
            ]);
    
            return redirect('/client-investment');
        }
    }

    function btcid_query($method, array $req = array()) {
        // API settings
        $key = 'HMFNDZUZ-XAFOANTT-KXKMATZK-WZJ1XRH1-M4WOURKK'; // your API-key
        $secret = 'd05923422b0c876be0cb82a4790f9ee7e8d80291134ce9f57677a6f786c4565cd6255301fa6aceb4'; // your Secret-key
        $req['method'] = $method;
        $req['nonce'] = time();
       
        // generate the POST data string
        $post_data = http_build_query($req, '', '&');
        $sign = hash_hmac('sha512', $post_data, $secret);
        // generate the extra headers
        $headers = array(
       'Sign: '.$sign,
       'Key: '.$key,
        );
        // our curl handle (initialize if required)
        static $ch = null;
        if (is_null($ch)) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible;
       BITCOINCOID PHP client; '.php_uname('s').'; PHP/'.phpversion().')');
        }
        curl_setopt($ch, CURLOPT_URL, 'https://vip.bitcoin.co.id/tapi/');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
       
        // run the query
        $res = curl_exec($ch);
        if ($res === false) throw new Exception('Could not get reply:
       '.curl_error($ch));
        $dec = json_decode($res, true);
        if (!$dec) throw new Exception('Invalid data received, please make sure
       connection is working and requested API exists: '.$res);
       
        curl_close($ch);
        $ch = null;
        return $dec;
       }

}