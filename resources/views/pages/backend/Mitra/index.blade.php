@extends('layouts.backend.app')

@section('title', 'Data Mitra')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('backend/assets/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
<div class="main-content">
  <section class="section">
  <div class="section-header">
    <h1>Data Mitra Pengguna Lulusan</h1>
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
        <a href="mitra/create" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah Data</a>
    </div>
    <div class="card-body">
        <table id="mitra" class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mitra as $m)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ ucfirst($m->nama) }}</td>
                    <td>
                    <img src="{{url('/mitra-images/gambar/'.$m->gambar) }}" align="center" width="100px">
                    </td>
                    <td>
                      @php
                      $jenis_ids = explode(',', $m->jenis);
                      @endphp
                      @foreach ($jenis_mitra as $jm)
                      @if(in_array($jm->id, $jenis_ids))
                      <label class="selectgroup-item">
                        <input class="selectgroup-input">
                        <span class="btn btn-light disabled">{{ ucfirst($jm->nama) }}</span>
                      </label>
                      @endif
                      @endforeach
                    </td>
                    <td>
                        <a href="{{ route('mitra.edit', $m->id) }}" class="btn btn-sm btn-info">
                          <i class="fas fa-edit"></i> Edit</a>
                        <form action="{{ route('mitra.destroy', $m->id) }}" method="POST" style="display:inline-block;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                            <i class="fas fa-trash"></i> Hapus
                          </button>
                        </form>
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
        <h5 class="text-center">Yakin menghapus data ini?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Ya</button>
      </div>
    </div>
  </div>
</div>
<!-- End Delete Modal -->

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
  // Add event listener to the delete button in the modal
  document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.deleteMitra');
    deleteButtons.forEach(button => {
      button.addEventListener('click', function () {
        const mitraId = this.getAttribute('data-id');
        const formDelete = document.getElementById('formDelete');
        formDelete.action = `/mitra/${mitraId}`;
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
