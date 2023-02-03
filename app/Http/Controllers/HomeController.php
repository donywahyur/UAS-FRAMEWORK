<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tarif;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('menu.dashboard');
    }
    public function pelanggan(){
        $user =  User::where('role_id', '4');
        $data['pelanggan'] = $user->get();
        $data['last_id'] = $user->orderBy('id', 'desc')->first();
        return view('menu.pelanggan',$data);
    }
    public function tambahPelanggan(Request $req){
        $user =  User::where('role_id', '4');
        $last_id = $user->orderBy('id', 'desc')->first();
        $insert = User::create([
            'username' => ($last_id->username+1),
            'password' => bcrypt(($last_id->username+1)),
            'nama' => $req->nama,
            'no_telp' => $req->no_telp,
            'alamat' => $req->alamat,
            'role_id' => '4',
            'status' => '1',
        ]);
        if($insert){
            return redirect()->route('pelanggan')->with(['status' => 1 , 'msg' => 'Berhasil Menambahkan Data']);
        }else{
            return redirect()->route('pelanggan')->with(['status' => 0 , 'msg' => 'Gagal Menambahkan Data']);
        }
    }

    public function modalEditPelanggan($id){
        echo json_encode(User::where('id', $id)->first());
    }

    public function editPelanggan(Request $req){
        $update = User::where('id', $req->id)->update([
            'nama' => $req->nama,
            'no_telp' => $req->no_telp,
            'alamat' => $req->alamat,
            'modified_by' => '1',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if($update){
            return redirect()->route('pelanggan')->with(['status' => 1 , 'msg' => 'Berhasil Mengubah Data']);
        }else{
            return redirect()->route('pelanggan')->with(['status' => 0 , 'msg' => 'Gagal Mengubah Data']);
        }
    }   
    
    public function nonaktifkanPelanggan($id){
        $update = User::where('id', $id)->update([
            'status' => '0',
            'modified_by' => '1',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if($update){
            return redirect()->route('pelanggan')->with(['status' => 1 , 'msg' => 'Berhasil Nonaktifkan Pelanggan']);
        }else{
            return redirect()->route('pelanggan')->with(['status' => 0 , 'msg' => 'Gagal Nonaktifkan Pelanggan']);
        }
    }

    public function aktifkanPelanggan($id){
        $update = User::where('id', $id)->update([
            'status' => '1',
            'modified_by' => '1',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if($update){
            return redirect()->route('pelanggan')->with(['status' => 1 , 'msg' => 'Berhasil Aktifkan Pelanggan']);
        }else{
            return redirect()->route('pelanggan')->with(['status' => 0 , 'msg' => 'Gagal Aktifkan Pelanggan']);
        }
    }

    public function tarif(){
        $data['tarif'] = Tarif::first();
        return view('menu.tarif',$data);
    }
    public function updateTarif(Request $req){
        //validate request
        $this->validate($req, [
            'tarif' => 'required|numeric',
        ]);
        $update = Tarif::where('id', '1')->update([
            'tarif' => $req->tarif,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        if($update){
            return redirect()->route('tarif')->with(['status' => 1 , 'msg' => 'Berhasil Mengubah Data']);
        }else{
            return redirect()->route('tarif')->with(['status' => 0 , 'msg' => 'Gagal Mengubah Data']);
        }
    }

    public function pemakaian(){
        return view('menu.pemakaian');
    }
    public function pemakaianTable(Request $req){
        $tahun = $req->tahun;
        $bulan = $req->bulan;

        $data = User::select([
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
        ])->leftJoin('t_pemakaian', function($join) use ($tahun, $bulan){
            $join->where('t_pemakaian.tahun', '=', $tahun);
            $join->where('t_pemakaian.bulan', '=', $bulan);
        })->where('m_user.role_id',4)->get();

        return view('menu.pemakaian_table', compact('data'));
    }
}
