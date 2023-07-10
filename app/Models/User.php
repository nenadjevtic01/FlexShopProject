<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['password'];

    public function updateLogin($user_id){
        $user=\DB::table('users')
            ->where('users.user_id','=',$user_id)
            ->update(['is_logged_in'=>1]);
        return $user;
    }

    public function updateLogout($user_id){
        $user=\DB::table('users')
            ->where('users.user_id','=',$user_id)
            ->update(['is_logged_in'=>0]);
        return $user;
    }

    public function userCount(){
        $userCount=\DB::table('users')
            ->count('users.user_id');

        return $userCount;
    }

    public function removeUserDetail($id){
        $user=\DB::table('infos')
            ->where('infos.user_id','=',$id)
            ->delete();

        return $user;
    }

}
