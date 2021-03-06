<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Wallet;
use App\Referal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;

use App\Http\Controllers\WebController;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    public function showRegistrationForm()
    {
        $dataobj = new WebController();
        $data =  $dataobj->data;
        $data['page_title'] = 'Register';
        return view('auth.register',$data);
    }


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'vipwallet' => 'required|string|max:255|min:6',
            'g-recaptcha-response' => 'required',
            'referal_code' => 'required|max:45|min:6',
            ]);
        }
        
        /**
         * Create a new user instance after a valid registration.
         *
         * @param  array  $data
         * @return \App\User
         */
        protected function create(array $data)
        {

            $check = Referal::where('name', $data['referal_code'])->count();
            
            if($check > 0) {
                $pin = mt_rand(1000000, 9999999)
                    . mt_rand(1000000, 9999999)
                    . $data['email'][rand(0, strlen($data['email']) - 1)];
    
                Wallet::create([
                    'user_email' => $data['email'],
                    'token' => $string = str_shuffle($pin)
                ]);
    
                return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                    'vipwallet' => $data['vipwallet'],
                    'referal_code' => $data['referal_code'],
                    'accesskey' => bcrypt('VNC'.Carbon::now()),
                ]);
            } else {
                return redirect('/register')->withErrors(["referal"]);
            }
            
                
        }
}
