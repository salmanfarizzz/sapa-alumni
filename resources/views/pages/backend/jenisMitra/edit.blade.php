@extends('layouts.backend.app')

@section('title', 'Ubah Artikel')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('backend/assets/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Jenis Mitra</h1>
        </div>

        @error('judul')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="card">
            <div class="card-header">
                <span class="h4 font-weight-bold">Ubah Jenis Mitra</span>
            </div>
            <div class="card-body">
                <form action="{{ url('/jenis/'.$jenis_mitra->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <x-input field="nama" label="Nama Mitra" type="text" note="{{ ucwords($jenis_mitra->nama) }}"/>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" class="form-control deskripsi-jenis_mitra"
                        rows="5" cols="80">{{ ucfirst($jenis_mitra->deskripsi) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <div class="section-body">
        </div>
    </section>
</div>
<script src="{{ asset('backend/assets/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('deskripsi', {height: 500, filebrowserUploadMethod: 'form',});
</script>
@endsection
