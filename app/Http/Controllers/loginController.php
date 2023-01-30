<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    //
    public function login(Request $request){
      $username = $request->username;
      $password = $request->password;

      $cek = DB::table('m_user')->where('username',$username)->first();
      print_r($cek);
      if($cek){
        echo "ada";
      }else{
        echo "tidak ada";
      }

    }
    function searchTagihan(Request $request){
        $no_pelanggan = $request->tagihan;
        $data = DB::table('t_pemakaian')->where('username', $no_pelanggan)->get();
        echo json_encode($data);
    }
}
