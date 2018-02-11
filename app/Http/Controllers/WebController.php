<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;

class WebController extends Controller {
	public $data;

	public function __construct(){
		$this->data = [
			"header" => [
				"logo" => "/img/logo.png",
				"logo_text" => "/img/logo-text.png",
				"menu" => [
					"/" => "Home",
					"/about" => "About Us",
                    "#contact" => "Contact Us",
					"/investment" => "INVESTMENT PLAN"
				]
			],
			"footer" => []
		];
	}

    public function home() {
    	$data = $this->data;
        $data['page_title'] = "Home";
        $data['header']['page_title'] = $data['page_title'];
        $data['footer']['page_title'] = $data['page_title'];
        return view('web/home', $data);
    }

    public function about() {
    	$data = $this->data;
        $data['page_title'] = "About Us";
        $data['header']['page_title'] = $data['page_title'];
        $data['footer']['page_title'] = $data['page_title'];
        return view('web/about', $data);
    }


    public function investment(){
        $data = $this->data;
        $data['page_title'] = "Investment Plan";
        $data['header']['page_title'] = $data['page_title'];
        $data['footer']['page_title'] = $data['page_title'];
        return view('web/investment', $data);
    }

    public function login(){
        $data = $this->data;
        $data['page_title'] = "Login";
        $data['header']['page_title'] = $data['page_title'];
        $data['footer']['page_title'] = $data['page_title'];
        return view('web/login', $data);
    }

    public function register(){
        $data = $this->data;
        $data['page_title'] = "Register";
        $data['header']['page_title'] = $data['page_title'];
        $data['footer']['page_title'] = $data['page_title'];
        return view('web/register', $data);
    }
}