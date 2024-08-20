@extends('layouts.backend.app')

@section('title', 'Tambah Data Mitra')

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
    <h1>Data Mitra</h1>
  </div>
  
  @error('judul')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="card">
    <div class="card-header">
      <span class="h4 font-weight-bold">Tambah Data Mitra</span>
    </div>
    <div class="card-body">
      <form action="/mitra" method="post" enctype="multipart/form-data">
        @csrf
        <x-input field="nama" name="nama" label="Nama Mitra" type="text" placeholder="Masukkan Nama Mitra..."/>
        
        <div class="form-group">
          <label class="form-label">Jenis Mitra</label>
          <div class="selectgroup selectgroup-pills">
            @foreach ($jenis_mitra as $jm)
            <label class="selectgroup-item">
              <input type="checkbox" name="jenis[]" value="{{ $jm->id }}" class="selectgroup-input">
              <span class="selectgroup-button">{{ucfirst($jm->nama)}}</span>
            </label>
            @endforeach
            @error('kategori')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <x-upload field="gambar" label="Upload Logo Mitra" ratio="*Untuk hasil terbaik, gunakan gambar dengan rasio 16:9 dengan resolusi minimal 1280x720"/>
    
        <button type="submit" class="btn btn-primary">Submit</button>
            
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