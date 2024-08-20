<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Lowongan;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class WebController extends Controller
{
public function index(Request $request)
{
    $records = Artikel::join('users', 'users.id', '=', 'artikel.penulis')
        ->where('artikel.is_publish', 'ya')
        ->select('artikel.*','users.name')
        ->get();
        
    $main_artikel = array();
    $temp_kategori = array();
    $temp_popular = array();
    $popular = Artikel::orderBy('accessed', 'desc')->take(5)->get();
    $no = 0;

    foreach ($records as $key => $a) {
        foreach (json_decode($a->kategori) as $key2 => $a2) {
            $category = Kategori::where('id', $a2)->first();
            $temp_kategori[$key2]['id_kategori'] = $a2;
            $temp_kategori[$key2]['nama_kategori'] = $category['nama'];
            $temp_kategori[$key2]['slug_kategori'] = $category['slug'];
        }
        $records[$key]['data_kategori'] = $temp_kategori;
        if($records[$key]['is_featured'] != 'ya'){
            $main_artikel[$no++] = $records[$key];
        }
    }
    
    foreach ($popular as $key => $p) {
        foreach (json_decode($p->kategori) as $key2 => $p2) {
            $category = Kategori::where('id', $p2)->first();
            $temp_popular[$key2]['id_kategori'] = $p2;
            $temp_popular[$key2]['nama_kategori'] = $category['nama'];
            $temp_popular[$key2]['slug_kategori'] = $category['slug'];
        }
        $popular[$key]['data_kategori'] = $temp_popular;
    }
    
    $kategori = Kategori::All();
    $lowongans = Lowongan::all();
    $all_artikel = $records->take(3); // Mengambil hanya 3 artikel terbaru

    return view('pages.frontend.index', ['records' => $records, 'lowongans' => $lowongans, 'popular' => $popular, 'all_artikel' => $all_artikel, 'kategori' => $kategori]);
}

public function show($slug_kategori, $slug_artikel){
        $kategori = Kategori::where('slug', $slug_kategori)->first();
        if(empty($kategori)){
            return abort(404);
        }

        $artikel = Artikel::where('slug', $slug_artikel)->where('is_publish', 'ya')->first();
        if(empty($artikel)){
            return abort(404);
        }
        
        $penulis = User::select('name','id')->where('id',$artikel->penulis)->first();
        
        $id = $artikel['id'];
        $accessed = $artikel['accessed']+1;

        Artikel::find($id)->update([
            'accessed'  => $accessed,
        ]);

        //Pinned Post
        $artikel_temp = Artikel::join('users', 'users.id', '=', 'artikel.penulis')
                ->where('artikel.is_publish', 'ya')
                ->select('artikel.*','users.name')
                ->get();
        $category = Kategori::All();
        $temp_kategori = array();
        foreach ($artikel_temp as $key => $a) {
            $temp_kategori[$key]['id_kategori'] = json_decode($a->kategori);
            foreach (json_decode($a->kategori) as $key2 => $a2) {
                $category = Kategori::where('id', $a2)->first();
                //$temp_kategori[id_artikel][id_kategori]
                $temp_kategori[$key2]['id_kategori'] = $a2;
                $temp_kategori[$key2]['nama_kategori'] = $category['nama'];
                $temp_kategori[$key2]['slug_kategori'] = $category['slug'];
            }
            $artikel_temp[$key]['data_kategori'] = $temp_kategori;
        }
        // $id_kategori = array_column($temp_kategori, 'id_kategori');
        $all_artikel = $artikel_temp;
        $kategori_menu = Kategori::All();

    return view('pages.frontend.news_post',['artikel' => $artikel, 'kategori' => $kategori, 'penulis' => $penulis, 'kategori_menu' => $kategori_menu, 'all_artikel' => $all_artikel] );
}

    // public function index(Request $request)
    // {
    //     $records = Artikel::join('users', 'users.id', '=', 'artikel.penulis')
    //         ->where('artikel.is_publish', 'ya')
    //         ->select('artikel.*','users.name')
    //         ->get();

    //     $main_artikel = array();
    //     $temp_kategori = array();
    //     $popular = Artikel::orderBy('accessed', 'desc')->take(5)->get();
    //     $no = 0;

    //     foreach ($records as $key => $a) {
    //         $temp_kategori = array();
    //         foreach (json_decode($a->kategori) as $key2 => $a2) {
    //             $category = Kategori::where('id', $a2)->first();
    //             $temp_kategori[$key2]['id_kategori'] = $a2;
    //             $temp_kategori[$key2]['nama_kategori'] = $category['nama'];
    //             $temp_kategori[$key2]['slug_kategori'] = $category['slug'];
    //         }
    //         $records[$key]['data_kategori'] = $temp_kategori;
    //         if ($records[$key]['is_featured'] != 'ya') {
    //             $main_artikel[$no++] = $records[$key];
    //         }
    //     }

    //     foreach ($popular as $key => $p) {
    //         $temp_popular = array();
    //         foreach (json_decode($p->kategori) as $key2 => $p2) {
    //             $category = Kategori::where('id', $p2)->first();
    //             $temp_popular[$key2]['id_kategori'] = $p2;
    //             $temp_popular[$key2]['nama_kategori'] = $category['nama'];
    //             $temp_popular[$key2]['slug_kategori'] = $category['slug'];
    //         }
    //         $popular[$key]['data_kategori'] = $temp_popular;
    //     }

    //     $kategori = Kategori::all();
    //     $lowongans = Lowongan::all();
    //     $all_artikel = $main_artikel;

    //     return view('pages.frontend.index', compact('records', 'lowongans', 'popular', 'all_artikel', 'kategori'));
    // }
}
