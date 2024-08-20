@php
use Carbon\Carbon;    
@endphp

@extends('layouts.backend.app')

@section('title', 'Data Tentang Kami')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('backend/assets/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Tentang Kami</h1>
    </div>
    @if (Session::has('status'))
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ Session::get('status') }}
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

    @if (Session::has('warning'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ Session::get('warning') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span class="small" aria-hidden="true">×</span>
        </button>
      </div>
    @endif

    <div class="card">
      <div class="card-header">
        <a href="about/create" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
      </div>
      <div class="card-body">
        <table id="pertanyaan" class="table table-sm">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Tanggal</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $dt)
              <tr>
                <td class="text-center">{{ $loop->index + 1 }}.</td>
                <td>{{ $dt->judul }}</td>
                <td>{{ $dt->tanggal }}</td>
                <td>{!! html_entity_decode($dt->deskripsi) !!}</td>
                <td>
                  <div class="btn-group btn-group-sm">
                    <a href="{{ route('about.edit', $dt->id) }}" class="btn btn-icon btn-primary"><i class="fas fa-edit"></i></a>
                    <button class="btn btn-sm btn-danger deleteAbout" data-id="{{ $dt->id }}" data-toggle="modal" data-target="#deleteModal">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="section-body"></div>
  </section>

  <!-- Delete Warning Modal -->
  <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formDelete" method="post">
            @csrf
            @method('DELETE')
            <h5 class="text-center">Yakin menghapus data ini?</h5>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger pr-4 pl-4" id="confirmDelete">Ya</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Delete Modal -->
</div>
@endsection

@push('scripts')
<!-- JS Libraries -->
<script src="{{ asset('backend/assets/library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('backend/assets/library/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('backend/assets/library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('backend/assets/library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('backend/assets/library/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('backend/assets/library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('backend/assets/js/page/index-0.js') }}"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.deleteAbout');
    deleteButtons.forEach(button => {
      button.addEventListener('click', function () {
        const aboutId = this.getAttribute('data-id');
        const formDelete = document.getElementById('formDelete');
        formDelete.action = `/about/${aboutId}`;
      });
    });

    const confirmDeleteButton = document.getElementById('confirmDelete');
    confirmDeleteButton.addEventListener('click', function () {
      const formDelete = document.getElementById('formDelete');
      formDelete.submit();
    });
  });
</script>
@endpush
