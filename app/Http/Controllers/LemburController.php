<?php

namespace App\Http\Controllers;

use App\Models\lembur;
use Illuminate\Http\Request;

class LemburController extends Controller
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
        return view('lembur.index')
        ->with('lemburs', lembur::orderBy('karyawan_id', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lembur.create');
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
            'mulai_lembur' => 'required',
            'selesai_lembur' => 'required',
        ]);

        $mulai_lembur = $request->input('mulai_lembur');
        $selesai_lembur = $request->input('selesai_lembur');

        //Lembur Per jam
        $lemburPerJam = 25000;

        $interval = strtotime($selesai_lembur)-strtotime($mulai_lembur);
        if($interval <= 0){
            return redirect('/lembur/create')
            ->with('message', 'Indikasi Jam mundur !');
        }
        $interval =ceil(abs($interval/3600));
        //dd($interval);
        $total = intval($lemburPerJam * $interval);
        //dd($total);

        lembur::create([
            'karyawan_id' => $request->input('karyawan_id'),
            'mulai_lembur' => $mulai_lembur,
            'selesai_lembur' => $selesai_lembur,
            'total_jam' => $interval,
            'total' => $total
        ]);

        return redirect('/lembur')
            ->with('message', 'Selamat Bekerja Lembur');
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
