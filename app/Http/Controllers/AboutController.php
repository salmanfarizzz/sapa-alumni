<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $data = About::all();

        return view('pages.backend.about.index', compact('user', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        return view('pages.backend.about.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required', 
            'tanggal' => 'required',
            'deskripsi' => 'required'

        ], [
            'judul.required' => 'Judul wajib diisi',
            'tanggal.required' => 'kondisi wajib dipilih',
            'deskripsi.required' => 'kondisi wajib dipilih'
        ]);

        $data = [
            'judul' => $request->input('judul'),
            'tanggal' => $request->input('tanggal'),
            'deskripsi' => $request->input('deskripsi')
        ];

        About::create($data);

        return redirect('/about')->with([
            'message' => 'Data berhasil dibuat !',
            'alert-type' => 'success'
        ]);
    }

    
    public function show(About $abouts)
    {
        $data = About::all();

        return view('pages.frontend.ucic_karir', compact( 'data'));
    }

    
    public function edit($id)
    {
        // Mengambil data pegawai berdasarkan id yang dipilih
    $data = DB::table('about')->where('id', $id)->first();
    // Passing data pegawai yang didapat ke view edit.blade.php
    return view('pages.backend.about.edit', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = About::findOrFail($id);
        
        $data->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);
        
        return redirect('/about')->with([
            'message' => 'Data berhasil diperbarui!',
            'alert-type' => 'success'
        ]);
    }


    public function destroy($id)
    {
        $data = About::findOrFail($id);
        $data->delete();

        return redirect('/about')->with('success', 'Data berhasil dihapus');
    }
}
