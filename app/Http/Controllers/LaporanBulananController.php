<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tarif;
use App\Models\Pemakaian;
use Validator;

class LaporanBulananController extends Controller
{
    public function __construct()
    {
        // $this->middleware(function ($request, $next) {
        //     $this->user = Auth::user();
    
        //     // return $next($request);
        // });
        $this->middleware('auth');
    }
    
    public function index(){
        return view('menu.laporan');
    }

    public function laporanTable(Request $req){
        $tahun = $req->tahun;
        $bulan = $req->bulan;

        $whereCondition = array (
            't_pemakaian.tahun' => $tahun,
        );
        if ($bulan!=null) {
            $whereCondition['t_pemakaian.bulan'] = $bulan;
        }
        // print_r(Auth::user());

        if (Auth::user()->role_id == 4) {
            $whereCondition['m_user.id'] = Auth::user()->id;
        }

        $data['data'] = Pemakaian::select([
            'm_user.id',
            'm_user.username',
            'm_user.nama',
            'm_user.no_telp',
            'm_user.alamat',
            't_pemakaian.trx_id',
            't_pemakaian.tahun',
            't_pemakaian.bulan',
            't_pemakaian.meter',
            't_pemakaian.tarif',
            't_pemakaian.total',
            't_pemakaian.status',
        ])->join('m_user', 't_pemakaian.user_id', '=', 'm_user.id')
        ->where($whereCondition)->get();
        $data['tahunPilih'] = $tahun;
        $data['bulanPilih'] = $bulan;
        return view('menu.laporan_table', $data);
    }
}