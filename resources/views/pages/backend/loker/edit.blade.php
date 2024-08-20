@extends('layouts.backend.app')

@section('title', 'Ubah Data Lowongan')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
  <section class="section">
  <div class="section-header">
    <h1>Ubah Data Lowongan</h1>
  </div>
  
  @error('judul')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="card">
    <div class="card-header">
      <span class="h4 font-weight-bold">Ubah Data Lowongan</span>
    </div>
    <div class="card-body">
      <form action="{{ route('lowongan.update', $lowongan->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-input field="perusahaan" name="perusahaan" label="Nama Perusahaan" type="text" placeholder="Masukkan Nama Perusahaan..." value="{{ $lowongan->perusahaan }}"/>
        <x-input field="judul" name="judul" label="Judul Lowongan" type="text" placeholder="Masukkan Judul Lowongan..." value="{{ $lowongan->judul }}"/>
        
        <div class ="form-group">
          <label>Tanggal :</label>
          <input type="date" name="tanggal" class="form-control" value="{{ $lowongan->tanggal }}">
        </div>

        <x-upload field="banner" label="Upload Poster Loker" ratio="*Untuk hasil terbaik, gunakan gambar dengan rasio 16:9 dengan resolusi minimal 1280x720"/>
        <img src="{{ url('/lowongan-images/gambar/'.$lowongan->banner) }}" width="100px" alt="current banner">
        <br>
        <br>
        <x-upload field="logo" label="Upload Logo Perusahaan" ratio="*Untuk hasil terbaik, gunakan gambar dengan rasio 16:9 dengan resolusi minimal 1280x720"/>
        <img src="{{ url('/lowongan-images/logo/'.$lowongan->logo) }}" width="100px" alt="current logo">
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
            
      </form>
    </div>
  </div>
  <div class="section-body">
  </div>
</section>
@endSection
