@extends('layouts.backend.app')

@section('title', 'Tambah Artikel')

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
    <h1>Data Jenis Mitra</h1>
  </div>
  
  @error('judul')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="card">
    <div class="card-header">
      <span class="h4 font-weight-bold">Tambah Jenis Mitra</span>
    </div>
    <div class="card-body">
      <form action="/jenis" method="post" enctype="multipart/form-data">
        @csrf
        <x-input field="nama" name="nama" label="nama" type="text" placeholder="Masukkan Nama Mitra..."/>
        
        <div class="form-group">
          <label for="deskripsi">Deskripsi Jenis Mitra</label>
          <textarea id="deskripsi" name="deskripsi" class="form-control deskripsi-jenis"
          rows="5" cols="80" placeholder="Tulis deskripsi disini" value="{{old('deskripsi')}}"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
  <div class="section-body">
  </div>
</section>
<script src="{{ asset('backend/assets/ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'subjek', {height: 500, filebrowserUploadMethod: 'form',});
</script>
<script>
CKEDITOR.replace( 'deskripsi', {height: 500, filebrowserUploadMethod: 'form',});
</script>
@endSection