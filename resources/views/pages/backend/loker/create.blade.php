@extends('layouts.backend.app')

@section('title', 'Tambah Data Lowongan')

@push('style')
    <link rel="stylesheet" href="{{ asset('backend/assets/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
  <section class="section">
  <div class="section-header">
    <h1>Tambah Data Lowongan</h1>
  </div>
  
  @error('judul')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="card">
    <div class="card-header">
      <span class="h4 font-weight-bold">Tambah Data Lowongan</span>
    </div>
    <div class="card-body">
      <form action="{{ route('lowongan.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <x-input field="perusahaan" name="perusahaan" label="Nama Perusahaan" type="text" placeholder="Masukkan Nama Perusahaan..."/>
        <x-input field="judul" name="judul" label="Judul Lowongan" type="text" placeholder="Masukkan Judul Lowongan..."/>
        
        <div class ="form-group">
          <label>Tanggal :</label>
          <input type="date" name="tanggal" class="form-control">
        </div>

        <x-upload field="banner" label="Upload Poster Loker" ratio="*Untuk hasil terbaik, gunakan gambar dengan rasio 16:9 dengan resolusi minimal 1280x720"/>

        <x-upload field="logo" label="Upload Logo Perusahaan" ratio="*Untuk hasil terbaik, gunakan gambar dengan rasio 16:9 dengan resolusi minimal 1280x720"/>
    
        <button type="submit" class="btn btn-primary">Submit</button>
            
      </form>
    </div>
  </div>
  <div class="section-body">
  </div>
</section>
@endSection
