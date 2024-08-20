@extends('layouts.backend.app')

@section('title', 'Isi Kuisioner')

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
    <h1>Tracer Study Alumni UCIC</h1>
  </div>
  
  @error('judul')
  <div class="alert alert-danger">{{ $message }}</div>
  @enderror

  <div class="card">
    <div class="card-body">
      <form action="{{ route('alumni.tracer.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
         @foreach ($questions as $question)
         <div class="card @if (!$loop->last) mb-3 @endif">
          <div class="card-header">
            <h6>{{ $question->question_text }}</h6>
          </div>
          <div class="card-body">
            <input type="hidden" name="questions[{{ $question->id }}]"
            value="">
            @foreach ($question->questionOptions as $option)
            <div class="form-check">
              <input class="form-check-input" type="radio"
              name="questions[{{ $question->id }}]"
              id="option-{{ $option->id }}"
              value="{{ $option->id }}"@if (old("questions.$question->id") == $option->id) checked @endif>
              <label class="form-check-label"
              for="option-{{ $option->id }}">
              {{ $option->option_text }}
            </label>
          </div>
          @endforeach
          @if ($errors->has("questions.$question->id"))
          <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;"
          role="alert">
          <strong>{{ $errors->first("questions.$question->id") }}</strong>
        </span>
        @endif
      </div>
    </div>
    @endforeach
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