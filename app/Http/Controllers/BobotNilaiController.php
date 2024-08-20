<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;

class BobotNilaiController extends Controller
{
    public function index()
    {
        $data = auth()->user();
        $penilaian = Penilaian::orderBy('id', 'asc')->get();

        return view('pages.backend.bobot_nilai.index', compact('penilaian', 'data'));
    }

    public function create()
    {
        $data = auth()->user();

        return view('pages.backend.bobot_nilai.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'point' => 'required|integer',
        ], [
            'category.required' => 'Kategori wajib diisi',
            'name.required' => 'Nama wajib diisi',
            'point.required' => 'Nilai wajib diisi',
            'point.integer' => 'Nilai wajib diisi dengan angka',
        ]);


        $data = [
            'category' => $request->input('category'),
            'name' => $request->input('name'),
            'point' => $request->input('point'),
        ];

        Penilaian::create($data);

        return redirect('/question')->with([
        'message' => 'Bobot Nilai berhasil dibuat !',
        'alert-type' => 'success'
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BobotNilai $bobotNilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // dd($bobotNilai);
        $data = auth()->user();
        $penilaian = Penilaian::findOrFail($id);

        // $bobot_nilai = $bobotNilai;
        // $id = $bobotNilai->id;

        return view(
            'admin.bobot_nilai.edit',
            [
                'data' => $data,
                'Penilaian' => $penilaian
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'point' => 'required|integer',
        ], [
            'category.required' => 'Kategori wajib diisi',
            'name.required' => 'Nama wajib diisi',
            'point.required' => 'Nilai wajib diisi',
            'point.integer' => 'Nilai wajib diisi dengan angka',
        ]);


        $data = [
            'category' => $request->input('category'),
            'name' => $request->input('name'),
            'point' => $request->input('point'),
        ];

        $penilaian = Penilaian::findOrFail($id);

        $penilaian->update($data);

        return redirect('/admin/bobotnilai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penilaian = Penilaian::findOrFail($id);

        $penilaian->delete();
        // Alert::success('Data Biaya', 'Berhasil dihapus!!');
        return redirect('/admin/bobotnilai');
    }
}
