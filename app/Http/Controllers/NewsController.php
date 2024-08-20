<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsController extends Controller
{
    // public function showNews()
    // {
    //     // Retrieve the articles from the database (you might need to adjust this based on your database structure)
    //     $articles = Artikel::where('is_publish', 'ya')->orderBy('tanggal', 'desc')->get();

    //     // Pass the articles to the view
    //     return view('pages.frontend.news', ['articles' => $articles]);
    // }
    // public function index(Request $request)
    // {
    //     $records = DB::table('artikel')
    //     ->join('users', 'users.id', '=', 'artikel.penulis')
    //     ->where('artikel.is_publish', 'ya')
    //     ->select('artikel.*','users.nama')
    //     ->get();

    //     $records = Article::join('users', 'users.id', '=', 'artikel.penulis')
    //     ->where('artikel.is_publish', 'ya')
    //     ->select('artikel.*','users.nama')
    //     ->get();
        
    //     $main_artikel = array();
    //     $temp_kategori = array();
    //     $temp_popular = array();
    //     $popular = Artikel::orderBy('accessed', 'desc')->take(5)->get();
    //     // $menu = Menu::All();
    //     $no = 0;
        
    //     foreach ($records as $key => $a) {
    //         foreach (json_decode($a->kategori) as $key2 => $a2) {
    //             $category = Kategori::where('id', $a2)->first();
    //             $temp_kategori[$key2]['id_kategori'] = $a2;
    //             $temp_kategori[$key2]['nama_kategori'] = $category['nama'];
    //             $temp_kategori[$key2]['slug_kategori'] = $category['slug'];
    //         }
    //         $records[$key]['data_kategori'] = $temp_kategori;
    //         if($records[$key]['is_featured'] != 'ya' && $records[$key]['is_pinned'] != 'ya'){
    //             $main_artikel[$no++] = $records[$key];
    //         }

    //     }

    //     foreach ($popular as $key => $p) {
    //         foreach (json_decode($p->kategori) as $key2 => $p2) {
    //             $category = Category::where('id', $p2)->first();
    //             $temp_popular[$key2]['id_kategori'] = $p2;
    //             $temp_popular[$key2]['nama_kategori'] = $category['nama'];
    //             $temp_popular[$key2]['slug_kategori'] = $category['slug'];

                
    //         }
    //         $popular[$key]['data_kategori'] = $temp_popular;
    //     }
       
    //     $paginated = $this->paginate($main_artikel);

    //     $kategori = Kategori::All();
    //     // $about    = About::All();
    //     $all_artikel = $records;
    //     //dd($records);
    //     return view('pages.frontend.news', ['article' => $records, 'popular' => $popular, 'main_artikel' => $paginated, 'all_artikel' => $all_artikel]);
    // }

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
        // $menu = Menu::All();
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
        $paginated = $this->paginate($main_artikel, 4);
        $kategori = Kategori::All();
        // $about    = About::All();
        $all_artikel = $records;
        //dd($records);
    return view('pages.frontend.news', ['records' => $records, 'popular' => $popular, 'main_artikel' => $paginated, 'all_artikel' => $all_artikel, 'kategori' => $kategori]);
}
    public function paginate($items, $perPage = 4, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $total = count($items);
        $currentpage = $page;
        $offset = ($currentpage * $perPage) - $perPage ;
        $itemstoshow = array_slice($items , $offset , $perPage);
        return new LengthAwarePaginator($itemstoshow ,$total ,$perPage);
    }



    // public function show($id)
    // {
    //     return view('web.pages.blog-single');
    // }

    // public function search(Request $request){
        
    //     $query = trim($request->get('query'));  

    //     $kategori_query = "artikel.kategori LIKE CONCAT('%" . '"' . "'" . ', kategori.id, ' . "'" . '"%' . "'" . ")"; 
    //     $search_query = "artikel.judul LIKE CONCAT('%','"  . $query . "','%')"; 
    //     $artikel_search = Article::join('kategori', 'artikel.id', '=', 'artikel.id')
    //             ->join('users', 'users.id', '=', 'artikel.penulis')
    //             ->where('artikel.is_pinned', 'tidak')
    //             ->where('artikel.is_publish', 'ya')
    //             ->whereRaw($kategori_query)
    //             ->whereRaw($search_query)
    //             ->select('artikel.*','kategori.id as id_kategori','kategori.slug as slug_kategori','kategori.nama as nama_kategori', 'users.id as id_penulis', 'users.nama as nama_penulis')
    //             ->get();

    //     $artikel_search = $artikel_search->groupBy('id');

    //     $pinned_query = "artikel.kategori LIKE CONCAT('%" . '"' . "'" . ', kategori.id, ' . "'" . '"%' . "'" . ")"; 
    //     $pinned_artikel = Article::join('kategori', 'artikel.id', '=', 'artikel.id')
    //             ->where('artikel.is_pinned', 'ya')
    //             ->where('artikel.is_publish', 'ya')
    //             ->whereRaw($pinned_query)
    //             ->select('artikel.*','kategori.id as id_kategori','kategori.slug as slug_kategori','kategori.nama as nama_kategori')
    //             ->get();
        

    //     $pinned_artikel = $pinned_artikel->groupBy('id');

    //     $about    = About::All();
    //     $menu = Menu::All();
    //     $kategori = Category::All();
    //     $widget = Widget::All();

    //     return view('web.pages.search', ['query'=> $query, 'artikel' => $artikel_search, 'about' => $about, 'kategori_menu' => $kategori, 'menu' => $menu, 'pinned_artikel' => $pinned_artikel, 'widget' => $widget]);
    // }

    public function articleByCategory($slug_kategori){
        $kategori = Kategori::where('slug', $slug_kategori)->first();
        $id = $kategori->id;
        if(empty($kategori)){
            return abort(404);
        }
        $artikel = Artikel::where('kategori','LIKE','%"'.$id.'"%')
        ->where('is_publish', 'ya')
        ->get();

        if(!empty($artikel)){
            $temp_artikel = array();
            foreach ($artikel as $key => $a) {
                foreach (json_decode($a->kategori) as $key2 => $a2) {
                    $category = Kategori::where('id', $a2)->first();
                    //$temp_popular[id_artikel][id_kategori]
                    $temp_artikel[$key2]['id_kategori'] = $a2;
                    $temp_artikel[$key2]['nama_kategori'] = $category['nama'];
                    $temp_artikel[$key2]['slug_kategori'] = $category['slug'];
                }
                $artikel[$key]['data_kategori'] = $temp_artikel;
            }

        }else{
            return abort(404);
        }
        $kategori = Kategori::All();

        return view('pages.frontend.category', ['artikel' => $artikel, 'kategori_menu' => $kategori]);
    }

    public function single($slug_kategori, $slug_artikel){
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

//     public function single($slug_kategori, $slug_artikel){
//     $kategori = Kategori::where('slug', $slug_kategori)->first();
//     if(empty($kategori)){
//         return abort(404);
//     }
//     $artikel = Artikel::where('slug', $slug_artikel)->where('is_publish', 'ya')->first();
//     if(empty($artikel)){
//         return abort(404);
//     }
    
//     $penulis = User::select('nama','id','foto')->where('id',$artikel->penulis)->first();
    

//     $id = $artikel['id'];
//     $accessed = $artikel['accessed']+1;

//     Artikel::find($id)->update([
//         'accessed'  => $accessed,
//     ]);


//     //Pinned Post
//     $artikel_temp = Artikel::join('users', 'users.id', '=', 'artikel.penulis')
//             ->where('artikel.is_publish', 'ya')
//             ->select('artikel.*','users.nama')
//             ->get();
//     $category = Kategori::All();
//     $temp_kategori = array();
//     foreach ($artikel_temp as $key => $a) {
//         $temp_kategori[$key]['id_kategori'] = json_decode($a->kategori);
//         foreach (json_decode($a->kategori) as $key2 => $a2) {
//             $category = Kategori::where('id', $a2)->first();
//             //$temp_kategori[id_artikel][id_kategori]
//             $temp_kategori[$key2]['id_kategori'] = $a2;
//             $temp_kategori[$key2]['nama_kategori'] = $category['nama'];
//             $temp_kategori[$key2]['slug_kategori'] = $category['slug'];
//         }
//         $artikel_temp[$key]['data_kategori'] = $temp_kategori;
//     }
//     $temp_kategori = array_filter($temp_kategori, fn($item) => !empty($item['id_kategori']));
//     $id_kategori = array_map(fn($item) => $item['id_kategori'], $temp_kategori);
//     $id_kategori = json_encode(array_unique($id_kategori));
//     $id_kategori = json_decode($id_kategori, true);

    
//     $all_artikel = $artikel_temp;
//     $kategori_menu = Kategori::All();

//     return view('pages.frontend.news_post',['artikel' => $artikel, 'kategori' => $kategori, 'penulis' => $penulis, 'kategori_menu' => $kategori_menu, 'all_artikel' => $all_artikel] );
// }
}
