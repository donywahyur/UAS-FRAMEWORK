<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
      $cred = array(
        'username' => $request->username,
        'password' => $request->password,
      );
      if (Auth::attempt($cred)) {
        if(Auth::user()->status == 0){
          Auth::logout();
          return redirect('/')->with('error', 'User dinonaktifkan');
        }else{
          return redirect('/dashboard');
        }
      }else{
        return redirect('/')->with('error', 'Username atau Password Salah');
      }
    }
    function searchTagihan(Request $request){
        $no_pelanggan = $request->no_tagihan;
        $data = DB::table('t_pemakaian')
        ->join('m_user', 'm_user.id', '=', 't_pemakaian.user_id')
        ->where('username', $no_pelanggan)
        ->latest('trx_id')
        ->first();
        
        if($data){
          $response = array(
            'no_pelanggan' => $no_pelanggan,
            'nama' => $data->nama,
            'tahun' => $data->tahun,
            'bulan' => getNamaBulan($data->bulan),
            'meter_air' => $data->meter,
            'jumlah_tagihan' => $data->total,
            'not_found' => 0
          );  
          echo json_encode($response);
        }else{
          echo json_encode(array('not_found' => 1));
        }
    }
    function logout(){
        Auth::logout();
        return redirect('/');
    }
}
