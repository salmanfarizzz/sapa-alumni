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
      <h1>Data Kategori Berita</h1>
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
    <div class="col-lg-8">
      <div class="card">
        <div class="card-body">
          <table id="kategori" class="table table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)
              <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ ucfirst($category->nama) }}</td>
                <td>{{ $category->deskripsi }}</td>
                <td>
                  <a href="{{ route('kategori.edit', $category->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i> Edit</a>
                  <button class="btn btn-sm btn-danger deleteKategori" data-id="{{ $category->id }}" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash"></i> Hapus</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header">
          <span id="card-title" class="h4 font-weight-bold">Tambah Kategori</span>
        </div>
        <div class="card-body">
          <form id="formKategori" action="/dashboard/kategori" method="post">
          @csrf
          <input id="method" type="hidden" name="_method" value="post">
          <x-input field="nama" label="Nama Kategori" type="text" placeholder="Isi nama kategori disini"/>
          <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea id="deskripsi" name="deskripsi" class="form-control deskripsi-artikel"
          rows="5" cols="80" placeholder="Tulis deskripsi disini"></textarea>
        </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
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
                    <h5 class="modal-title">Hapus data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formDelete" action="/" method="post">
                        @csrf
                        @method('DELETE')
                        <h5 class="text-center">Yakin menghapus data ini?</h5>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Ya</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('backend/assets/library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ asset('backend/assets/library/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('backend/assets/library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('backend/assets/library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('backend/assets/library/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('backend/assets/library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.deleteKategori');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function () {
            const categoryId = this.getAttribute('data-id');
            const formDelete = document.getElementById('formDelete');
            formDelete.action = `/dashboard/kategori/${categoryId}`;
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
