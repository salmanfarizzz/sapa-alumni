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
      <form action="/semester" method="POST">
        @csrf 
        <div class="form-group">
          <label>Nama</label>
          <div class="input-group">
            <div class="input-group-prepend">
            </div>
            <input type="text" class="form-control" id="name" name="name"
            placeholder="Contoh : Semester Genap">
          </div>
        </div>

        <div class="form-group">
          <label>Status</label>
          <select class="form-control selectric" name="status" id="status">
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Tidak Aktif</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/semester" class="btn btn-primary">Kembali</a>
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