<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class AdminController extends Controller
{
    public function index()
    {
        $data = DB::table('tb_admin')->get();
        return view('admin.adminview', compact('data'));
    }

    public function adminadd(Request $req)
    {
        $md5 = hash("sha512", md5($req->password));
        $input = DB::table('tb_admin')->insert([
            'admin_nama'     => $req->nama,
            'admin_username' => $req->username,
            'admin_password' => $req->password,
            'admin_password_md5' => $md5,
            'admin_level' => $req->level
        ]);

        if($input == true){
            return redirect('/adminview')->with('pesan', 'Data Saving Success!');
        } else {
            return back()->with('error', 'Data Saving Failed!');
        }
    }

    public function adminedit($id)
    {
        $edit = DB::table('tb_admin')->where('admin_id', $id)->first();
        return view('admin.adminedit', compact('edit'));
    }

    public function adminupdate(Request $req)
    {
        $id       = $req->admin_id;
        $update = DB::table('tb_admin')->where('admin_id', $id)->update([
            'admin_nama'     => $req->nama,
            'admin_username' => $req->username,
            'admin_password' => $req->password,
        ]);

        if($update == true){
            return redirect('/adminview')->with('pesan', 'Data Update Success!');
        } else {
            return redirect('admin.adminedit', $id)->with('error', 'Data Update Failed!');
        }
    }

    public function admindelete($id)
    {
        $delete = DB::table('tb_admin')->where('admin_id', $id)->delete();

        if($delete == true){
            return back()->with('pesan', 'Data Delete Success!');
        } else {
            return back()->with('error', 'Data Delete failed!');
        }
    }


}
