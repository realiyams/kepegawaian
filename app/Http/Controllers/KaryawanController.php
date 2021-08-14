<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
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
        //$karyawan = karyawan::all();
        //dd($karyawan);

        return view('karyawan.index')
            ->with('karyawans', karyawan::orderBy('nama', 'ASC')->get());    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
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
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
        ]);

        karyawan::create([
            'nama' => $request->input('nama'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat')
        ]);

        return redirect('/karyawan')
            ->with('message', 'Karyawan berhasil ditambahkan !');
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
        return view('karyawan.edit')
        ->with('karyawan', karyawan::where('id', $id)->first());
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
        //dd($request);

        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
        ]);

        karyawan::where('id', $id)
        ->update([
            'nama' => $request->input('nama'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'no_telepon' => $request->input('no_telepon'),
            'alamat' => $request->input('alamat')
        ]);

        return redirect('/karyawan')
            ->with('message', 'Karyawan berhasil diperbaharui !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = karyawan::where('id', $id);
        $karyawan->delete();

        return redirect('/karyawan')
        ->with('message', 'Karyawan berhasil dihapus !');
    }
}
