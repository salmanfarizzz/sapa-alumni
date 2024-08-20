@extends('layouts.backend.app')

@section('title', 'Tambah Pengguna')

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
  <div class="card">
    <div class="card-header">
      <span class="h4 font-weight-bold">Tambah Data Pengguna</span>
    </div>
    <div class="card-body">
      <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-lg-6">
            <x-input field="name" label="Nama" type="text" placeholder="Isi nama disini"/>
            <x-input field="email" label="Email" type="text" placeholder="Isi email disini"/> 
            <x-input field="password" label="Password" type="password" placeholder="Isi password disini"/> 
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-label">Role</label>
                <div class="selectgroup w-100">
                  <label class="selectgroup-item">
                    <input type="radio" name="role" value="pusat karir" class="selectgroup-input"
                    checked="">
                    <span class="selectgroup-button">Pusat Karir</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="role" value="alumni" class="selectgroup-input">
                    <span class="selectgroup-button">Alumni</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="role" value="mitra" class="selectgroup-input">
                    <span class="selectgroup-button">Mitra</span>
                  </label>

                                </div>
                            </div>    
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>     
        </div>
        
      </form>
    </div>
  </div>
  <div class="section-body">
  </div>
</section>
@endSection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('backend/assets/library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('backend/assets/library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/assets/library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('backend/assets/library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('backend/assets/js/page/index-0.js') }}"></script>
@endpush