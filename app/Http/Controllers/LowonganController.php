<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class LowonganController extends Controller
{

    public function index() 
    {
        $lowongans = Lowongan::all();
        return view('pages.backend.loker.index', ['lowongans' => $lowongans]);
    }

    public function show()
    {
        $lowongans = Lowongan::all();
        return view('pages.frontend.lowongan', ['lowongans' => $lowongans]);
    }

    public function lokerpost($id)
{
    $lowongan = Lowongan::find($id);
    return view('pages.frontend.loker_post', ['lowongan' => $lowongan]);
}
    // public function lokershow() 
    // {
    //     $lowongans = Lowongan::all();
    //     return view('pages.frontend.index', ['lowongans' => $lowongans]);
    // }

    public function create()
    {
        $lowongans = Lowongan::All();
        return view('pages.backend.loker.create', compact('lowongans'));
    }      

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul'      => 'required|max:300',
            'tanggal'    => 'required|date',
            'banner'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'perusahaan' => 'required'
        ]);

        $bannerName = "";
        $logoName = "";

        if ($request->hasFile('banner')) {
            $bannerName = $request->banner->getClientOriginalName() . '-' . time() . '.' . $request->banner->extension();
            $request->banner->move(public_path('/lowongan-images/gambar/'), $bannerName);
        }

        if ($request->hasFile('logo')) {
            $logoName = $request->logo->getClientOriginalName() . '-' . time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('/lowongan-images/logo/'), $logoName);
        }

        Lowongan::create([
            'judul'      => $request->judul,
            'tanggal'    => $request->tanggal,
            'banner'     => $bannerName,
            'logo'       => $logoName,
            'perusahaan' => $request->perusahaan
        ]);

        Session::flash('success', 'Data Lowongan Kerja Berhasil disimpan');
        return redirect('/loker')->with('success', 'Data lowongan kerja berhasil ditambahkan');
    }

    public function edit($id){
        
         $lowongan = Lowongan::findOrFail($id);
        return view('pages.backend.loker.edit', compact('lowongan'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul'      => 'required|max:300',
            'tanggal'    => 'required|date',
            'banner'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'perusahaan' => 'required'
        ]);

        $lowongan = Lowongan::findOrFail($id);

        $bannerName = $lowongan->banner;
        $logoName = $lowongan->logo;

        if ($request->hasFile('banner')) {
            $bannerName = $request->banner->getClientOriginalName() . '-' . time() . '.' . $request->banner->extension();
            $request->banner->move(public_path('/lowongan-images/gambar/'), $bannerName);
        }

        if ($request->hasFile('logo')) {
            $logoName = $request->logo->getClientOriginalName() . '-' . time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('/lowongan-images/logo/'), $logoName);
        }

        $lowongan->update([
            'judul'      => $request->judul,
            'tanggal'    => $request->tanggal,
            'banner'     => $bannerName,
            'logo'       => $logoName,
            'perusahaan' => $request->perusahaan
        ]);

        return redirect('/loker')->with([
            'message' => 'Data Lowongan berhasil diperbarui!',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $lowongan = Lowongan::findOrFail($id);
        File::delete(public_path('/lowongan-images/gambar/' . $lowongan->banner));
        File::delete(public_path('/lowongan-images/logo/' . $lowongan->logo));
        $lowongan->delete();

        return redirect('/loker')->with('success', 'Data Lowongan berhasil dihapus');
    }
}
