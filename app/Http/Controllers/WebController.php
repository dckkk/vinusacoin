<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use App\Coin;
use App\Paket;

class WebController extends Controller {
	public $data;

	public function __construct(){
		$this->data = [
			"header" => [
				"logo" => "/images/logo.png",
				"logo_text" => "/images/logo-text.png",
				"menu" => [
					"/" => "Home",
					"/about" => "About Us",
                    "/contact" => "Contact Us",
					"/investment" => "Investment Plan"
				]
			],
			"footer" => [
                "menu" => [
                    "/" => "Home",
                    "/about" => "About Us",
                    "/contact" => "Contact Us",
                    "/investment" => "Investment Plan"
                ],
            ]
		];
	}

    public function data(){
        return $this->data;
    }

    public function home() {
        // get data coin
        $coin = Coin::orderBy('id', 'desc')->first();

        // get limit data plans
        $plans = Paket::inRandomOrder()->limit(2)->get();

    	$data = $this->data;
        $data['page_title'] = "Home";
        $data['header']['page_title'] = $data['page_title'];
        $data['footer']['page_title'] = $data['page_title'];
        $data['coin'] = $coin;
        $data['plans'] = $plans;
        return view('web/home', $data);
    }

    public function about() {
    	$data = $this->data;
        $data['page_title'] = "About Us";
        $data['header']['page_title'] = $data['page_title'];
        $data['footer']['page_title'] = $data['page_title'];
        return view('web/about', $data);
    }

    public function contact() {
        $data = $this->data;
        $data['page_title'] = "Contact Us";
        $data['header']['page_title'] = $data['page_title'];
        $data['footer']['page_title'] = $data['page_title'];
        return view('web/contact', $data);
    }

    public function investment(){
        // get data investment plan
        $plan = Paket::all();

        $data = $this->data;
        $data['page_title'] = "Investment Plan";
        $data['header']['page_title'] = $data['page_title'];
        $data['footer']['page_title'] = $data['page_title'];
        $data['plan'] = $plan; 
        return view('web/investment', $data);
    }
}