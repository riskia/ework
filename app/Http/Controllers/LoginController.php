<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use App\Models\Users;
use App\Models\Rayon;

class LoginController extends Controller
{
    public function loginpost(Request $login) {
        $user = $login->username;
        $pass = $login->password; 

        $data = Users::with('userlevel')->where('username','=', $user)->get();
        
        if(count($data) > 0) { //ada atau tidak
            if(Hash::check($pass,$data[0]->password)) {
                Session::put('username',$user);
                Session::put('user_level',$data[0]->user_level_id);
                Session::put('iduser',$data[0]->user_id);
                Session::put('login',TRUE);
                return redirect('dashboard');
            }
            else{
                return redirect('/')->with('alert','Wrong Username or Password');
            }
        }
        else {
            return redirect('/')->with('alert','Wrong Username or Password');
        }
    }

    public function logout() {
        Session::flush();
        return redirect('/')->with('alert','Logout Success');
    }

    public function changepass(Request $pass) {
        $iduser    = session('iduser');
        $newpass   = bcrypt($pass->newpassword1);
        
        Users::where('user_id', $iduser)->update(['password' => $newpass]);

        return redirect('/profile')->with('alert','Change Password Success');
    }

    public function adduser(Request $datauser) {
        $users = new users;
        $users->user_level_id = $datauser->userlevelid;
        $users->rayon_id = $datauser->rayonid;
        $users->username = $datauser->username;
        $users->nama_user = $datauser->namauser;
        $users->password = bcrypt($datauser->password);
        $users->save();
        return redirect('/user');
    }

}
