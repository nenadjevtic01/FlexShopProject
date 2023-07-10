<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Statistic;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('pages.login',['data'=>$this->data]);
    }

    public function login(LoginRequest $request){
        $email=$request->email;
        $password=md5($request->password);
        $user=User::where('email',$email)->first();
        if(!$user){
            return redirect()->back()->with('error-msg', 'No user found!');
        }
        if($password != $user->password){
            return redirect()->back()->with('error-msg', 'Wrong password!');
        }
        if($user->is_banned){
            return redirect()->back()->with('error-msg', 'Account banned! Contact support.');
        }else{
            $user_id=$user->user_id;
            $userModel=new User();
            $userModel->updateLogin($user_id);
            $request->session()->put('user',$user);
            Statistic::create([
                'name'=>session('user')->first_name.' '.session('user')->last_name,
                'email'=>session('user')->email,
                'action'=>'Login'
            ]);
            return redirect()->route('Browse products');
        }
    }

    public function logout(){
        $userModel=new User();
        $user_id=session('user')->user_id;
        $userModel->updateLogout($user_id);
        Statistic::create([
            'name'=>session('user')->first_name.' '.session('user')->last_name,
            'email'=>session('user')->email,
            'action'=>'Logout'
        ]);
        session()->forget('user');
        return redirect()->route('Home');
    }
}
