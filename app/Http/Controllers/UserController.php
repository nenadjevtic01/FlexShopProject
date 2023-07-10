<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('pages.admins.addUser');
    }

    public function addUser(AddUserRequest $request){
        $first_name=$request->post('first_name');
        $last_name=$request->post('last_name');
        $email=$request->post('email');
        $username=$request->post('username');
        $password=$request->post('password');
        $role=$request->post('role');
        $id=User::insert([
            'user_id'=>null,
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'email'=>$email,
            'username'=>$username,
            'password'=>md5($password),
            'role_id'=>$role,
            'is_logged_in'=>0
        ]);

        return redirect()->back()->with('success-msg', 'User added!');
    }

    public function indexRemove(){
        $this->data['users']=User::where('role_id',2)->get();
        return view('pages.admins.removeUser',['data'=>$this->data]);
    }

    public function removeUser(Request $request){
        try {
            $id=$request->post('user');
            $userModel=new User();
            User::where('user_id',$id)->delete();
            $userModel->removeUserDetail($id);

            return redirect()->back()->with('success-msg', 'User removed!');
        }catch(\Exception $e){
            return redirect()->back()->with('error-msg', $e->getMessage());
        }
    }

}
