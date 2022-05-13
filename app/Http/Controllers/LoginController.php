<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller
{
    
    public function index()
    {
        return view('login');
    }

    public function login(Request $req)
    {
        $username = $req->username;
        $md5 = hash("sha512", md5($req->password));
        $login = DB::table('tb_admin')->where('admin_username', $username)->where('admin_password', $md5)->first();

        if($login == true){
            session()->put('session_id', $login->admin_id);
            session()->put('session_username', $login->admin_username);
            session()->put('session_nama', $login->admin_nama);
            session()->put('session_level', $login->admin_level);
            return redirect('home')->with('pesan', 'Login Success!'.$login->admin_nama);
        } else {
            return back()->with('error', 'Invalid Data Login!');
        }
    }

    public function logout(Request $req)
    {
        $req->session()->forget('sesion_id');
        $req->session()->forget('session_username');
        $req->session()->forget('session_nama');
        $req->session()->forget('session_level');
        $req->session()->flush();
        return redirect('/')->with('pesan', 'Logout Success!');
    }

}
