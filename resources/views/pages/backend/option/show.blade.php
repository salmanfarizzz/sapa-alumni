@extends('layouts.backend.app')

@section('title', 'Data Artikel')

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
    <h1>@if ($question->id)
            <h2>{{ $question->question_text }}</h2>
        @endif</h1>
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
        <a href="/create" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
    <div class="card-body">
        <table id="pertanyaan" class="table table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jawaban</th>
                    <th>Nilai</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($options as $op)
              <tr>
                <td>{{ $loop->index + 1 }}.</td>
                <td>{{ $op->option_text }}</td>
                <td>{{ $op->point }}</td>
                <td>
                  <div class="btn-group btn-group-sm">
                    <a href="{{ route('questions.edit', $q->id) }}"
                      class="btn btn-square btn-primary m-2"><i class="fa fa-pen"></i></a>
                      <form action="{{ route('questions.destroy', $q->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                        onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini ?')"
                        class="btn btn-square btn-primary m-2"><i class="fa fa-trash"></i></button>
                      </form>
                  </div>
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
  <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- <form action="" id="formDelete" method="POST"> --}}
        @foreach ($options as $q)
        <form id="formDelete" action="" method="post">
        @endforeach
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