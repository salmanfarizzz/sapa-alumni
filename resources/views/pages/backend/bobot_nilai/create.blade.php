@extends('layouts.backend.app')

@section('title', 'Tambah Pertanyaan')

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
    <h1>Data Pertanyaan</h1>
  </div>
  
  @error('judul')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="card">
    <div class="card-header">
      <span class="h4 font-weight-bold">Tambah Pertanyaan</span>
    </div>
    <div class="card-body">
      <form action="/question" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label for="category" class="form-label">Kategori</label>
          <input type="text" class="form-control" id="category" name="category">
        </div>
        
        <div class="mb-3">
          <label for="name" class="form-label">Pertanyaan</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        
        <div class="mb-3">
          <label for="point" class="form-label">Nilai</label>
          <input type="number" class="form-control" id="point" name="point">
        </div>
          
        <a href="/questions" class="btn btn-primary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
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
@endSection