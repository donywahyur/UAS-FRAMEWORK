<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        $data['pelanggan'] = User::where('role_id', '4')->get();
        return view('menu.pelanggan',$data);
    }
}
