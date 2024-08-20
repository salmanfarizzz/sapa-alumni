<?php

namespace App\Http\Controllers;

use App\Models\Kategori;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Kategori::all();
        return view('pages.backend.category.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.backend.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategori',
        ]);

        Kategori::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama, '-'),
            'deskripsi' => $request->deskripsi,
        ]);

        Session::flash('success', 'Kategori berhasil ditambah');
        return redirect()->route('kategori.index');
    }

    public function show($id)
    {
        $category = Kategori::findOrFail($id);
        return view('pages.backend.category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Kategori::findOrFail($id);
        return view('pages.backend.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:kategori,nama,' . $id,
        ]);

        $category = Kategori::findOrFail($id);
        $category->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama, '-'),
            'deskripsi' => $request->deskripsi,
        ]);

        Session::flash('success', 'Kategori berhasil diubah');
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $category = Kategori::findOrFail($id);
        $category->delete();

        Session::flash('success', 'Kategori berhasil dihapus');
        return redirect()->route('kategori.index');
    }
}
