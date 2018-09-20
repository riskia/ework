<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginpost(Request $login)
    {
        $user = $login->username;
        $pass = $login->password; 

        // $data = DB::table('user')
        //             ->join('user_level', 'user_level.id_user_level', '=', 'user.id_user_level')
        //             ->where('username','=', $user)
        //             ->get();
        $data = \App\Users::with('userlevel')->where('username','=', $user)->get();
        
        if(count($data) > 0){ //ada atau tidak
            if(Hash::check($pass,$data[0]->password))
            {
                Session::put('username',$user);
                Session::put('user_level',$data[0]->id_user_level);
                Session::put('iduser',$data[0]->id_user);
                Session::put('login',TRUE);
                return redirect('dashboard');
            }
            else{
                return redirect('/')->with('alert','Wrong Username or Password');
            }
        }
        else{
            return redirect('/')->with('alert','Wrong Username or Password');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/')->with('alert','Logout Success');
    }

    public function changepass(Request $pass)
    {
        $iduser    = session('iduser');
        $newpass   = bcrypt($pass->newpassword1);
        
        \App\Users::where('id_user', $iduser)->update(['password' => $newpass]);

        return redirect('/profile')->with('alert','Change Password Success');
    }
}
