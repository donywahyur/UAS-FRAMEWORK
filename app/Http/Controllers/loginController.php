<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    //
    public function login(Request $request){
      $cred = array(
        'username' => $request->username,
        'password' => $request->password,
      );
      if (Auth::attempt($cred)) {
        return redirect('/dashboard');
      }else{
        return redirect('/')->with('error', 'Username atau Password Salah');
      }
    }
    function searchTagihan(Request $request){
        $no_pelanggan = $request->tagihan;
        $data = DB::table('t_pemakaian')->where('username', $no_pelanggan)->get();
        echo json_encode($data);
    }
}
