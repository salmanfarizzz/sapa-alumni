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
    <h1>Data Pengguna</h1>
  </div>
  
  @error('judul')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="card">
    <div class="card-header">
      <span class="h4 font-weight-bold">Tambah Artikel</span>
    </div>
    <div class="card-body">
      <form action="/dashboard/artikel" method="post" enctype="multipart/form-data">
        @csrf
        <x-input field="judul" name="judul" label="Judul Artikel" type="text" placeholder="Judul artikel..."/>
        
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea id="deskripsi" name="deskripsi" class="form-control deskripsi-artikel"
          rows="5" cols="80" placeholder="Tulis deskripsi disini" value="{{old('deskripsi')}}"></textarea>
        </div>
        
        <div class="form-group">
          <label class="form-label">Kategori</label>
          <div class="selectgroup selectgroup-pills">
            @foreach ($category as $c)
            <label class="selectgroup-item">
              <input type="checkbox" name="kategori[]" value="{{ $c->id }}" class="selectgroup-input">
              <span class="selectgroup-button">{{ucfirst($c->nama)}}</span>
            </label>
            @endforeach
            @error('kategori')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class ="form-group">
          <label>Tanggal :</label>
          <input type="date" name="tanggal" class="form-control">
        </div>

        <x-upload field="thumbnail" label="Upload Thumbnail" ratio="*Untuk hasil terbaik, gunakan gambar dengan rasio 16:9 dengan resolusi minimal 1280x720"/>
        <div class="form-group">
          <label for="subjek">Subjek</label><br>
          <small class="font-italic">*Untuk gambar dalam artikel, gunakan gambar dengan lebar < 500px untuk hasil yang lebih baik</small>
          <textarea id="subjek" name="subjek" class="form-control" placeholder="Tulis artikel disini" value="{{old('subjek')}}"></textarea>
        </div>
        
        <div class="form-group">
          <label class="form-label">Artikel Unggulan</label>
          <div class="selectgroup w-100">
            <label class="selectgroup-item col-lg-3 col-md-3 col-sm-6">
              <input type="radio" name="is_featured" value="ya" class="selectgroup-input">
              <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-user-edit mr-2"></i>Ya</span>
            </label>
            <label class="selectgroup-item col-lg-3 col-md-3 col-sm-6">
              <input type="radio" name="is_featured" value="tidak" class="selectgroup-input" checked="true">
              <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-user-cog mr-2"></i>Tidak</span>
            </label>
          </div>
        </div>

        {{-- <div class="form-group">
          <label class="form-label">Sematkan Artikel (Widget Informasi Penting)</label>
          <div class="selectgroup w-100">
            <label class="selectgroup-item col-lg-3 col-md-3 col-sm-6">
              <input type="radio" name="is_pinned" value="ya" class="selectgroup-input">
              <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-user-edit mr-2"></i>Ya</span>
            </label>
            <label class="selectgroup-item col-lg-3 col-md-3 col-sm-6">
              <input type="radio" name="is_pinned" value="tidak" class="selectgroup-input" checked>
              <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-user-cog mr-2"></i>Tidak</span>
            </label>
          </div>
        </div> --}}


        <div class="form-group">
          <label class="form-label">Status Publikasi</label>
          <div class="selectgroup w-100">
            <label class="selectgroup-item col-lg-3 col-md-3 col-sm-6">
              <input type="radio" name="is_publish" value="ya" class="selectgroup-input" checked="true">
              <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-user-edit mr-2"></i>Ya</span>
            </label>
            <label class="selectgroup-item col-lg-3 col-md-3 col-sm-6">
              <input type="radio" name="is_publish" value="tidak" class="selectgroup-input">
              <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-user-cog mr-2"></i>Tidak</span>
            </label>
          </div>
        </div>

        

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