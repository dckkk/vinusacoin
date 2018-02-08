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
					"#about" => "About Us",
					"#contact" => "Contact Us"
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

}