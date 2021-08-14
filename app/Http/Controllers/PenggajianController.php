<?php

namespace App\Http\Controllers;

use App\Models\penggajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggajianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gajian.index')
            ->with('penggajians', penggajian::orderBy('tanggal', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gajian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $jumlah_lembur = 0;
        $jumlah_cuti = 0;

        $request->validate([
            'karyawan_id' => 'required',
            'tanggal' => 'required',
            'jumlah_gaji' => 'required',
        ]);

        $jumlah_gaji = $request->input('jumlah_gaji');
        $karyawan_id = $request->input('karyawan_id');
        $tanggal = $request->input('tanggal');
        
        //dd(strtotime($tanggal));
        //Hitung Jumlah Lembur dan cuti 1 karyawan
        $karyawan_lembur = DB::table('lembur')->get();
        $karyawan_cuti = DB::table('cuti')->get();
        //dd($karyawan_lembur);

        foreach($karyawan_lembur as $satu_lembur){
            if($karyawan_id == $satu_lembur->karyawan_id){
                //dd($satu_lembur);
                $jumlah_lembur += $satu_lembur->total;
            }
        }

        foreach($karyawan_cuti as $satu_cuti){

            $tanggal_cuti = strtotime($satu_cuti->mulai_cuti);
            $tanggal_gajian = strtotime($tanggal);
            $selisih = ($tanggal_gajian - $tanggal_cuti)/86400;
            //dd($selisih);

            if(($karyawan_id == $satu_cuti->karyawan_id)&&(intval(ceil(abs($selisih))) <= 30)){
                $jumlah_cuti += $satu_cuti->total_cuti;
            }
        }

        $total_gaji = $jumlah_gaji + $jumlah_lembur - $jumlah_cuti;

        penggajian::create([
            'karyawan_id' => $request->input('karyawan_id'),
            'tanggal' => $request->input('tanggal'),
            'jumlah_gaji' => $jumlah_gaji,
            'jumlah_lembur' => $jumlah_lembur,
            'jumlah_cuti' => $jumlah_cuti,
            'total_gaji' => $total_gaji
        ]);

        return redirect('/gajian')
            ->with('message', 'Selamat Gajian !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
