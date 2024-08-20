<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\jenis_mitra;
use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class MitraController extends Controller
{

    public function index() 
{
    $jenis_mitra = jenis_mitra::all();
    
    $records = DB::table('mitra')
    ->join('jenis_mitra', 'jenis_mitra.id', '=', 'mitra.jenis')
    ->select('mitra.*','jenis_mitra.nama as jenis_nama')
    ->get();

    return view('pages.backend.Mitra.index', ['mitra' => $records, 'jenis_mitra' => $jenis_mitra]);
}


   public function show()
{
    $jenis_mitra = jenis_mitra::all();
    
    $pemerintah = Mitra::where('jenis', jenis_mitra::where('nama', 'Pemerintah')->first()->id)->get();
    $perguruan_tinggi = Mitra::where('jenis', jenis_mitra::where('nama', 'Perguruan Tinggi')->first()->id)->get();
    $industri = Mitra::where('jenis', jenis_mitra::where('nama', 'Industri')->first()->id)->get();
    $asosiasi = Mitra::where('jenis', jenis_mitra::where('nama', 'Asosiasi')->first()->id)->get();
    $pendidikan = Mitra::where('jenis', jenis_mitra::where('nama', 'Pendidikan')->first()->id)->get();

    return view('pages.frontend.mitra', compact('pemerintah', 'perguruan_tinggi', 'industri', 'asosiasi', 'pendidikan'));
}


    // public function create()
    // {
    //     $jenis_mitra = jenis_mitra::All();
    //     return view('pages.backend.Mitra.create', compact('jenis_mitra'));
    // }

    public function create()
    {
        $jenis_mitra = jenis_mitra::All();
        return view('pages.backend.Mitra.create', compact('jenis_mitra'));
    }

//     public function store(Request $request)
//     {
//         $this->validate($request, [
//         'nama'    => 'required|max:300',
//         'jenis'   => 'required',
//         'gambar'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//     ]);
    
//     $imgName = "";

//     if(!empty($request->gambar)){
//         $imgName = $request->gambar->getClientOriginalName() . '-' . time() . '.' . $request->gambar->extension();
//         $request->gambar->move(public_path('/mitra-images/gambar/'), $imgName);
//     }

//     Mitra::create([
//         'nama'      => $request->nama,
//         'slug'       => Str::slug($request->nama, '-'),
//         'jenis'     => $request->jenis,
//         'gambar'  => $imgName
//     ]);

//     Session::flash('success', 'Data Mitra Berhasil disimpan');
//      return redirect('/mitra')->with('success', 'Data mitra berhasil ditambahkan');
// }

public function store(Request $request)
{
    $this->validate($request, [
        'nama'    => 'required|max:300',
        'jenis'   => 'required',
        'gambar'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    
    $imgName = "";

    if(!empty($request->gambar)){
        $imgName = $request->gambar->getClientOriginalName() . '-' . time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('/mitra-images/gambar/'), $imgName);
    }

    Mitra::create([
        'nama'      => $request->nama,
        'slug'       => Str::slug($request->nama, '-'),
       'jenis'     => implode(',', $request->jenis),
        'gambar'  => $imgName
    ]);

    Session::flash('success', 'Data Mitra Berhasil disimpan');
     return redirect('/mitra')->with('success', 'Data mitra berhasil ditambahkan');
}

public function edit($id)
    {
        $user = auth()->user();
        $data = Mitra::findOrFail($id);
        $jenis_mitra = jenis_mitra::all();

        return view('pages.backend.mitra.edit', compact('user', 'data', 'jenis_mitra'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama'    => 'required|max:300',
            'jenis'   => 'required',
            'gambar'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $mitra = Mitra::findOrFail($id);

        $imgName = $mitra->gambar;
        if ($request->hasFile('gambar')) {
            $imgName = $request->gambar->getClientOriginalName() . '-' . time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('/mitra-images/gambar/'), $imgName);
        }

        $mitra->update([
            'nama'   => $request->nama,
            'slug'   => Str::slug($request->nama, '-'),
            'jenis'  => implode(',', $request->jenis),
            'gambar' => $imgName
        ]);

        return redirect('/mitra')->with([
            'message' => 'Data berhasil diperbarui!',
            'alert-type' => 'success'
        ]);
    }

public function destroy($id)
    {
        $mitra = Mitra::findOrFail($id);
        File::delete(public_path('/mitra-images/gambar/' . $mitra->gambar));
        $mitra->delete();
        
        return redirect('/mitra')->with('success', 'Data mitra berhasil dihapus');
    }

}
