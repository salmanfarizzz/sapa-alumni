@extends('layouts.backend.app')

@section('title', 'Tambah Data')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('backend/assets/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
  <section class="section">
  <div class="section-header">
    <h1>Data Tentang Kami</h1>
  </div>
  
  @error('judul')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="card">
    <div class="card-header">
      <span class="h4 font-weight-bold">Tambah Data</span>
    </div>
    <div class="card-body">
      <form action="/about" method="POST">
        @csrf 
        
        <div class="form-group">
          <label>Judul</label>
          <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <input type="text" class="form-control" id="judul" name="judul"
            placeholder="Masukkan judul">
          </div>
        </div>

        <div class ="form-group">
          <label>Tanggal :</label>
          <input type="date" name="tanggal" class="form-control">
        </div>

        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea id="deskripsi" name="deskripsi" class="form-control deskripsi"
          rows="5" cols="80" placeholder="Tulis deskripsi disini" value="{{old('deskripsi')}}"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/about" class="btn btn-primary">Kembali</a>
      </form>
    </div>
  </div>
  <div class="section-body">
  </div>
</section>
<script src="{{ asset('backend/assets/ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( '', {height: 500, filebrowserUploadMethod: 'form',});
</script>
<script>
CKEDITOR.replace( 'deskripsi', {height: 500, filebrowserUploadMethod: 'form',});
</script>
@endSection