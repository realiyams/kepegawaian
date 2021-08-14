<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jumlah_user = 0;
        $jumlah_karyawan = 0;
        $jumlah_cuti = 0;
        $total_cuti = 0;
        $total_lembur = 0;

        $users = DB::table('users')->get();
        //dd($users);
        foreach($users as $user){
            $jumlah_user += 1;
        }

        $karyawans = DB::table('karyawan')->get();
        foreach($karyawans as $karyawan){
            $jumlah_karyawan += 1;
        }

        $cutis = DB::table('cuti')->get();
        foreach($cutis as $cuti){

            $total_cuti += $cuti->total_cuti;
            if($cuti->status == "belum selesai")
            $jumlah_cuti += 1;
        }

        $lemburs = DB::table('lembur')->get();
        foreach($lemburs as $lembur){
            $total_lembur += $lembur->total;
        }

        $selisih = $total_cuti - $total_lembur ;

        return view('/dashboard.index')
            ->with('jumlah_user', $jumlah_user)
            ->with('jumlah_karyawan', $jumlah_karyawan)
            ->with('total_lembur', $total_lembur)
            ->with('jumlah_cuti', $jumlah_cuti)
            ->with('total_cuti', $total_cuti)
            ->with('selisih', $selisih);
    }
}
