<?php

namespace App\Http\Controllers;
use App\Models\TahunAkademik;
use App\Models\Semester;
use Illuminate\Http\Request;

class TahunAkademiksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $data = TahunAkademik::all();

        return view('pages.backend.tahun.index', compact('user', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $user = auth()->user();

        return view('pages.backend.tahun.create', compact('user'));
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
            'name' => 'required', 'status' => 'required'

        ], [
            'name.required' => 'Nama wajib diisi',
            'status.required' => 'kondisi wajib dipilih',
        ]);

        $data = [
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ];

        TahunAkademik::create($data);

        return redirect('/tahun')->with([
            'message' => 'Semester berhasil dibuat !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tahun_akademiks  $tahun_akademiks
     * @return \Illuminate\Http\Response
     */
    public function show(tahun_akademiks $tahun_akademiks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tahun_akademiks  $tahun_akademiks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();

        $data = TahunAkademik::findOrFail($id);

        return view('pages.backend.tahun.edit', compact('user', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tahun_akademiks  $tahun_akademiks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',

        ], [
            'name.required' => 'nama kategori wajib diisi',
            'status.required' => 'data_pendukung kategori wajib diisi',
        ]);

        $user = auth()->user();

        $data = [
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ];


        $semester = TahunAkademik::findOrFail($id);

        $semester->update($data);

        return redirect('/tahun')->with([
            'message' => 'Semester berhasil diperbarui !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tahun_akademiks  $tahun_akademiks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tahun_akademik = TahunAkademik::findOrFail($id);

        $tahun_akademik->delete();
        // Alert::success('user Biaya', 'Berhasil dihapus!!');
        $user = auth()->user();

        return redirect('/tahun')->with([
            'message' => 'Tahun Akademik berhasil dihapus !',
            'alert-type' => 'success'
        ]);
    }
}
