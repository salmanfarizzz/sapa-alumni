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
        <div class="form-group">
          <label>Semester</label>
          <select class="form-control selectric" name="semester" id="semester">
            @foreach ($semester as $smstr)
            <option value="{{ $smstr->id }}">{{ $smstr->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label>Tahun Akademik</label>
          <select class="form-control selectric" name="tahun_akademik" id="tahun_akademik">
            @foreach ($tahun_akademik as $thn_akdmk)
            <option value="{{ $thn_akdmk->id }}">{{ $thn_akdmk->name }}</option>
            @endforeach
          </select>
        </div>
        <br>

        <div class="form-group">
          <label>Status</label>
            <select class="form-control selectric" name="status" id="status">
              <option value="alumni">Alumni</option>
              <option value="mitra">Mitra</option>
            </select>
        </div>
        <br>

        <div class="form-group">
          <label>Tipe Jawaban</label>
           <select class="form-control selectric" name="tipe" id="tipe">
            <option value="" @readonly(true)>Pilih Jawaban</option>
            <option value="esai">Esai</option>
            <option value="pilihan">Pilihan</option>
           </select>
        </div>

        <br>
        <div class="form-group">
          <label for="question_text" class="form-label">Pertanyaan </label>
          <input type="text" class="form-control" id="question_text" name="question_text">
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