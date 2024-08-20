@extends('layouts.backend.app')

@section('title', 'Data Lowongan Kerja')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('backend/assets/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
  <section class="section">
  <div class="section-header">
    <h1>Data Lowongan Kerja</h1>
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
        <a href="{{ route('lowongan.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah Data</a>
    </div>
    <div class="card-body">
        <table id="lowongan" class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Banner</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lowongans as $l)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ ucfirst($l->judul) }}</td>
                    <td>{{ date("d F Y", strtotime($l->tanggal)) }}</td>
                    <td>
                    <img src="{{ url('/lowongan-images/gambar/'.$l->banner) }}" align="center" width="100px">
                    </td>
                    <td>
                        <a href="{{ route('lowongan.edit', $l->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                        <button type="button" class="btn btn-sm btn-danger deleteLowongan" data-id="{{ $l->id }}" data-toggle="modal" 
                          data-target="#deleteModal"><i class="fas fa-trash"></i> Hapus
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

  <div class="section-body">
  </div>
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger pr-4 pl-4">Ya</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Delete Modal -->

@endsection

@push('scripts')
    <script>
        $('.deleteLowongan').on('click', function() {
            const id = $(this).data('id');
            $('#formDelete').attr('action', '/loker/' + id);
        });
    </script>
@endpush
