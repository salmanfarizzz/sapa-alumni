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
    <h1>@if ($question->id)
            <h2>{{ $question->question_text }}</h2>
        @endif</h1>
  </div>
  
  @error('judul')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="card">
    <div class="card-header">
      <span class="h4 font-weight-bold">Tambah Data Pilihan Ganda</span>
    </div>
    <div class="card-body">
      <form action="/jawaban_pertanyaan" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" id="question_id" name="question_id"
        placeholder="Masukkan jawaban....." value="{{ $question->id }}">
        <div class="form-group">
          <label for="option_text" class="form-label">Jawaban</label>
            <input type="text" class="form-control" id="option_text" name="option_text"
                value="{{ old('option_text') }}">
        </div>
                    
        <div class="form-group">
          <label for="point" class="form-label">Poin</label>
            <input type="number" class="form-control" id="point" name="point"
              value=" {{ old('point') }}" placeholder="Masukkan skala poin 1 - 5">
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