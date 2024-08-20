<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\jenis_mitra;
use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class Jenis_MitraController extends Controller
{
    public function index()
    {
        $jenis_mitras = jenis_mitra::all();
        return view('pages.backend.jenisMitra.index', ['jenis_mitras' => $jenis_mitras]);
    }

    public function create()
    {
        return view('pages.backend.jenisMitra.create');
    }

    public function store(Request $request)
    {
        request()->validate([
            'nama'     => 'required|unique:jenis_mitra',
        ]);
        

        jenis_mitra::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama, '-'),
            'deskripsi' => $request->deskripsi,
        ]);

        Session::flash('success', 'Data Jenis Mitra berhasil ditambah');
        return redirect('/jenis')->with('success', 'Data Jenis mitra berhasil ditambahkan');
    }

    public function show(JenisMitra $jenis_mitra)
    {
        return view('jenis_mitras.show', compact('jenis_mitra'));
    }

    // public function edit(Jenis_Mitra $jenis_mitra)
    // {
    //     // $jenis_mitra = jenis_mitra::All();
    //     return view('pages.backend.jenisMitra.edit', compact('jenis_mitra'));
    // }

    public function edit($id)
{
    // Mengambil data pegawai berdasarkan id yang dipilih
    $jenis_mitra = DB::table('jenis_mitra')->where('id', $id)->first();
    // Passing data pegawai yang didapat ke view edit.blade.php
    return view('pages.backend.jenisMitra.edit', ['jenis_mitra' => $jenis_mitra]);
}

public function update(Request $request, $id)
{
    $jenis_mitra = jenis_mitra::findOrFail($id);

    $jenis_mitra->update([
        'nama' => $request->nama,
        'slug' => Str::slug($request->nama, '-'),
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect('/jenis')->with([
            'message' => 'Data berhasil diperbarui!',
            'alert-type' => 'success'
        ]);
}

    public function destroy($id)
    {
        $jenis_mitra = Jenis_Mitra::findOrFail($id);
        $jenis_mitra->delete();

        return redirect('/jenis')->with('success', 'Data Jenis Mitra berhasil dihapus');
    }

}
