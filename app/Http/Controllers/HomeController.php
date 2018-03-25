<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Paket;
use App\Wallet;
use App\InvestmentUser;
use Auth;

class HomeController extends Controller
{
    public $data;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->data = [
			"page_title" => "Dashboard",
			"header" => [
                "logo" => "/images/logo.png",
				"images_user2" => "/images/img/user2-160x160.jpg",
				"images_user3" => "/images/img/user3-128x128.jpg",
				"images_user4" => "/images/img/user4-128x128.jpg",
				"images_user5" => "/images/img/user5-128x128.jpg",
				"images_user6" => "/images/img/user6-128x128.jpg",
				"images_user7" => "/images/img/user7-128x128.jpg",
				"images_user8" => "/images/img/user8-128x128.jpg"
			],
			"images_user2" => "/images/img/user2-160x160.jpg",
			"images_user3" => "/images/img/user3-128x128.jpg",
			"images_user4" => "/images/img/user4-128x128.jpg",
			"images_user5" => "/images/img/user5-128x128.jpg",
			"images_user6" => "/images/img/user6-128x128.jpg",
			"images_user7" => "/images/img/user7-128x128.jpg",
			"images_user8" => "/images/img/user8-128x128.jpg"
        ];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->data;
        $wallet = Wallet::where('user_email', Auth::user()->email)->first();
        $data['wallet'] = $wallet;

        return view('admin/dashboard', $data);
    }

    public function loading(Request $request)
    {
        $data = $this->data;
        $data['page_title'] = "Processing Data";
        $data['email'] = $request->email; 
        $data['total_eth'] = $request->total_eth;

        return view('loadingpage', $data);
    }

    public function deposit()
    {
        $data = $this->data;
        $user = User::where('email', Auth::user()->email)->first();
        $wallet = Wallet::where('user_email', Auth::user()->email)->first();
        $data['wallet'] = $wallet;
        $data['account'] = $wallet;
        
        return view('admin/deposit', $data);
    }
    
    public function invest()
    {
        $data = $this->data;
        // get invest plan
        $plans = Paket::all();
        $data['plans'] = $plans;
        
        return view('admin/plans', $data);
    }
    
    public function depositRegister($plan)
    {   
        $data = $this->data;
        
        $wallet = Wallet::where('user_email', Auth::user()->email)->first();
        $plans = Paket::where('name', $plan)->first();
        
        $data['wallet'] = $wallet;
        $data['plans'] = $plans;
        
        return view('admin/deposit_plans', $data);
    }
    
    public function reward(Request $request)
    {
        $data = $this->data;
        
        $reward = InvestmentUser::where('user_email', $request->email)->where('paket_name', $request->paket)->first();
        $data['reward'] = $reward;
        
        return view('admin/reward', $data);
    }
}
