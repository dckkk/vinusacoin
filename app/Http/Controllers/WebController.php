<?php

namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class WebController extends Controller {

    public function home() {
        $data['page_title'] = "Home";
        return view('web/home', $data);
    }

}