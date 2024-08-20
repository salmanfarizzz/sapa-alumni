<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemestersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $data = Semester::all();

        return view('pages.backend.semester.index', compact('user', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        return view('pages.backend.semester.create', compact('user'));
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

        Semester::create($data);

        return redirect('/semester')->with([
            'message' => 'Semester berhasil dibuat !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Semesters  $semesters
     * @return \Illuminate\Http\Response
     */
    public function show(Semesters $semesters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Semesters  $semesters
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();

        $data = Semester::findOrFail($id);

        return view('pages.backend.semester.edit', compact('user', 'data'));
    }

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


        $semester = Semester::findOrFail($id);

        $semester->update($data);

        return redirect('/semester')->with([
            'message' => 'Semester berhasil diperbarui !',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Semesters  $semesters
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semester = Semester::findOrFail($id);
        $semester->delete();

        return redirect('/semester')->with('success', 'Data Semester berhasil dihapus');
    }
}
