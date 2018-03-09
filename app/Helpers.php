<?php
use App\InvestmentUser;

class Helpers {
    
    static function checkPlans($plan, $email){
        $check = InvestmentUser::where('user_email', $email)->where('paket_name', $plan)->count();

        return $check;
    }
}