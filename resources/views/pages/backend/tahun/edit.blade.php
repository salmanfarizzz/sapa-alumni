@extends('layouts.backend.app')

@section('title', 'Edit Data Tahun')

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
    <h1>Data Tahun</h1>
  </div>

@if (Session::has('status'))
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    {{ Session::get('status') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span class="small" aria-hidden="true">×</span>
    </button>
  </div>
  @endif
  @if (Session::has('warning'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ Session::get('warning') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span class="small" aria-hidden="true">×</span>
    </button>
  </div>
  @endif
  @if (Session::has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span class="small" aria-hidden="true">×</span>
    </button>
  </div>
  @endif

  <div class="card">
    <div class="card-header">
      <span class="h4 font-weight-bold">Edit Data Tahun</span>
    </div>
    <div class="card-body">
      <form action="{{ route('tahun.update', $data->id) }}" method="POST">
        @csrf 
        @method('PUT')
        <div class="form-group">
          <label>Nama</label>
          <div class="input-group">
            <div class="input-group-prepend">

            </div>
            <input type="text" class="form-control" id="name" name="name"
            placeholder="Masukkan Nama....." value="{{ old('name', $data->name) }}">
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
        <a href="/tahun" class="btn btn-primary">Kembali</a>
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
@endsection