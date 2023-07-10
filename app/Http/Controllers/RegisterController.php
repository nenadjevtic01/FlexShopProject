<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Info;
use App\Models\Statistic;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('pages.register',['data'=>$this->data]);
    }

    public function register(RegisterRequest $request){
        $first_name=$request->post('first_name');
        $last_name=$request->post('last_name');
        $email=$request->post('email');
        $username=$request->post('username');
        $password=$request->post('password');
        //$confirm=$request->post('confirmPassword');
        $address=$request->post('address');
        $postal_code=$request->post('postal_code');
        $city=$request->post('city');
        $country=$request->post('country');

            $id=User::insertGetId([
                'user_id'=>null,
                'first_name'=>$first_name,
                'last_name'=>$last_name,
                'email'=>$email,
                'username'=>$username,
                'password'=>md5($password),
                'role_id'=>2,
                'is_logged_in'=>1
            ]);

            Info::create([
                'user_info_id'=>null,
                'address'=>$address,
                'city'=>$city,
                'postal_code'=>$postal_code,
                'country'=>$country,
                'user_id'=>$id
            ]);
            $request->session()->put('user',User::where('user_id',$id)->first());
            Statistic::create([
                'name'=>session('user')->first_name.' '.session('user')->last_name,
                'email'=>session('user')->email,
                'action'=>'Register'
            ]);

            return redirect()->route('Browse products');
    }
}
