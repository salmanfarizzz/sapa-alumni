<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use Session;
use Validator;
use ImageResize;

class ArtikelController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $category = Kategori::All();

        if($user->role == 'pusat karir'){
            $records = DB::table('artikel')
            ->join('users', 'users.id', '=', 'artikel.penulis')
            ->select('artikel.*','users.role')
            ->get();
        }
        return view('pages.backend.artikel.index', ['article' => $records, 'category' => $category]);
    }
    

    public function create()
    {
        $category = Kategori::All();
        return view('pages.backend.artikel.create', compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
        'judul'      => 'required|max:300',
        'kategori'   => 'required',
        'thumbnail'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'tanggal'    => 'required',
    ]);
    
    $imgName = "";
    $user_id = Auth::user()->id;
    $tanggal = $request->tanggal;

    if(!empty($request->thumbnail)){
        $imgName = $request->thumbnail->getClientOriginalName() . '-' . time() . '.' . $request->thumbnail->extension();
        $request->thumbnail->move(public_path('/article-images/thumbnail/'), $imgName);
    }

    Artikel::create([
        'judul'      => $request->judul,
        'deskripsi'  => $request->deskripsi,
        'slug'       => Str::slug($request->judul, '-'),
        'subjek'     => $request->subjek,
        'thumbnail'  => $imgName,
        'kategori'   => $request->kategori,
        'penulis'    => $user_id,
        'tanggal'    => $tanggal,
        'is_publish' => $request->is_publish,
        'is_featured'=> $request->is_featured,
    ]);

    Session::flash('success', 'Artikel Berhasil disimpan');
    return redirect('dashboard/artikel');
}


    public function show($id)
    {
        $user = User::where('id', $id)->first();
        $user = array($user);

        if ($user == null) abort(404);
        return view('pages.backend.artikel.detail', compact('user'));
    }
    
    public function edit($id)
    {
        $article = Artikel::where('id', $id)->first();
        $data_kategori = array();

        foreach (json_decode($article['kategori']) as $key => $id) {
            $category = Kategori::where('id', $id)->first();
            $data_kategori[$key]['id_kategori'] = $id;
            $data_kategori[$key]['nama_kategori'] = $category['nama'];
        }

        $nama_penulis = User::where('id', $article['penulis'])->first();;
        $article['nama_penulis'] = $nama_penulis['nama'];
        $article['data_kategori']= $data_kategori;
        $category = Kategori::All();
        return view('pages.backend.artikel.edit', ['article' => $article, 'category' => $category]);

    }

    public function update(Request $request, $id)
    {

        $this->validate($request,[
           'judul' => 'required|max:300',
           'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imgName = "";
        
        $article = Artikel::where('id', $id)->first();
        // $user_id = $article->penulis;
        $user_id = Auth::user()->id;
        $oldImgName = $article->thumbnail;
            if(!empty($request->thumbnail)){

            $imgName     = $request->thumbnail->getClientOriginalName() . '-' . time() . '.' . $request->thumbnail->extension();

            $image       =       $request->file('thumbnail');

            $path        =       public_path('images/'.$user_id.'/article-images/thumbnail/');

            File::exists($path) or File::makeDirectory($path, 0777, true, true);
        }else{
            $imgName = $article->thumbnail;
        }

        Artikel::find($id)->update([
            'judul'  => $request->judul,
            'deskripsi' => $request->deskripsi,
            'slug' => Str::slug($request->judul, '-'),
            'subjek' => $request->subjek,
            'thumbnail' => $imgName,
            'kategori' => $request->kategori,
            'is_publish' => $request->is_publish,
            'is_featured' => $request->is_featured,
        ]);

        
        Session::flash('success', 'Artikel Berhasil di update');
        return redirect('dashboard/artikel/');
    }

    public function destroy($id)
    {
        $article = Artikel::where('id', $id)->first();
        // $user_id = $article->pusatkarir;
        $user_id = $article->penulis;
        $imgName = $article->thumbnail;
        $path    = public_path('images/'.$user_id.'/article-images/thumbnail/');

        if($article->thumbnail != ''){
            $imgName = $article->thumbnail;
            File::delete(public_path('/article-images/thumbnail/'.$imgName));
        }

        Artikel::find($id)->delete();

        Session::flash('success', 'Artikel berhasil dihapus');
        return redirect('/dashboard/artikel');
    }
    

    public function uploadimage(Request $request)
    {
        if($request->hasFile('upload')) {
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $filenametostore = $filename.'_article_image_'.time().'.'.$extension;
            
            $user_id = Auth::user()->id;

            $request->file('upload')->move(public_path('images/'.$user_id.'/article-images/'), $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$user_id.'/article-images/'.$filenametostore);
            
            $msg = 'Gambar berhasil diunggah';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }


}
