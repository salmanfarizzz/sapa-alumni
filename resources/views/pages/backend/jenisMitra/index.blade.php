@extends('layouts.backend.app')

@section('title', 'Data Jenis Mitra')

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

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('jenis.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Data Jenis Mitra</a>
          </div>
          <div class="card-body">
            <table id="jenis_mitra" class="table table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($jenis_mitras as $jm)
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ ucfirst($jm->nama) }}</td>
                    <td>{!! html_entity_decode($jm->deskripsi) !!}</td>
                    <td>
                      <a href="{{ route('jenis.edit', $jm->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                      <button class="btn btn-sm btn-danger deleteJenis" data-id="{{ $jm->id }}" data-toggle="modal" data-target="#deleteModal">
                        <i class="fas fa-trash"></i> Hapus
                      </button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
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
<!-- JS Libraies -->
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
    const deleteButtons = document.querySelectorAll('.deleteJenis');
    deleteButtons.forEach(button => {
      button.addEventListener('click', function () {
        const jenisId = this.getAttribute('data-id');
        const formDelete = document.getElementById('formDelete');
        formDelete.action = `/jenis/${jenisId}`;
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
