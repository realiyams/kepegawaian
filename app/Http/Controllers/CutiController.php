<?php

namespace App\Http\Controllers;

use App\Models\cuti;
use App\Models\karyawan;
use Illuminate\Http\Request;

class CutiController extends Controller
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
        return view('cuti.index')
        ->with('cutis', cuti::orderBy('karyawan_id', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuti.create');
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

        $request->validate([
            'karyawan_id' => 'required',
            'mulai_cuti' => 'required',
            'selesai_cuti' => 'required',
        ]);

        $mulai_cuti = $request->input('mulai_cuti');
        $selesai_cuti = $request->input('selesai_cuti');
        
        //Cuti per hari
        $cutiPerHari = 50000;

        $interval = strtotime($selesai_cuti)-strtotime($mulai_cuti);
        if($interval <= 0){
            return redirect('/cuti/create')
            ->with('message', 'Indikasi kalender mundur !');
        }
        $interval = 1 + ceil(abs($interval/86400));
        $total = intval($cutiPerHari * $interval);
        //dd($total);

        cuti::create([
            'karyawan_id' => $request->input('karyawan_id'),
            'mulai_cuti' => $mulai_cuti,
            'selesai_cuti' => $selesai_cuti,
            'total_cuti' => $total,
            'status' => 'belum selesai'
        ]);

        return redirect('/cuti')
            ->with('message', 'Cuti dipersilahkan !');
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
        return view('cuti.index');
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
        cuti::where('id', $id)
        ->update([
            'status' => 'selesai cuti',
        ]);

        return redirect('/cuti')
            ->with('message', 'Cuti telah selesai !');
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
