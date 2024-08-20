@extends('layouts.backend.app')

@section('title', 'Data Pengguna')

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

    <div class="section-body">
      <div class="card">
        <div class="card-header">
          <a href="user/create" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pengguna</a>
        </div>
        <div class="card-body">
          <table class="table table-sm" id="user">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Level User</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $u)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ ucfirst($u->name) }}</td>
                  <td>{{ ucfirst($u->role) }}</td>
                  <td>
                    <a href="{{ route('user.edit', $u->id) }}" class="btn btn-sm btn-info mr-2"><i class="fas fa-eye"></i> Edit</a>
                    <a href="#" data-id="{{ $u->id }}" class="btn btn-sm btn-danger deleteUser" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i> Hapus</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
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
          <form id="formDelete" action="/" method="post">
            @csrf
            @method('DELETE')
            <h5 class="text-center">Yakin menghapus data ini?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-danger pr-4 pl-4">Ya</button>
          </form>
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
        const deleteUserButtons = document.querySelectorAll('.deleteUser');
        deleteUserButtons.forEach(button => {
          button.addEventListener('click', function () {
            const userId = this.getAttribute('data-id');
            const formDelete = document.getElementById('formDelete');
            formDelete.setAttribute('action', `/dashboard/user/${userId}`);
          });
        });
      });
    </script>
@endpush
