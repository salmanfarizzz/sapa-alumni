@php
use Carbon\Carbon;    
@endphp
@extends('layouts.backend.app')
@section('title', 'Data Hasil')
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
    <h1>Data Hasil</h1>
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
        {{-- <a href="question/create" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pertanyaan</a> --}}
    </div>
    <form action="/result" method="GET">
    {{-- @csrf --}}
    <div class="row">
      <div class="form-group" style="margin-left: 30px; margin-top: 20px;">
        <label>Semester</label>
        <select class="form-control selectric" name="semester" id="semester">
          <option value="" @readonly(true)>Pilih Semester</option>
          @foreach ($semester as $smstr)
          <option value="{{ $smstr->id }}">{{ $smstr->name }}</option>
          @endforeach
        </select>
      </div>

      <h6 style="margin-left: 20px; margin-top: 60px;">--</h6>
      <div class="form-group" style="margin-left: 30px; margin-top: 20px;">
        <label>Tahun Akademik</label>
        <select class="form-control selectric" name="tahun_akademik" id="tahun_akademik">
          <option value="" @readonly(true)>Pilih Tahun Akademik</option>
          @foreach ($tahun_akademik as $tahun)
          <option value="{{ $tahun->id }}">{{ $tahun->name }}</option>
          @endforeach
        </select>
      </div>
      <button style="width: 120px; height: 30px; margin-top: 55px; margin-left: 500px"
      type="submit" class="btn btn-primary">Cari Data</button>
    </div>
  </form>
    <div class="card-body">
        <table id="pertanyaan" class="table table-sm">
           <thead>
            <tr>
                <th>No</th>
                {{-- <th>User</th> --}}
                <th>Nilai</th>
                {{-- <th>Pertanyaan</th> --}}
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                <tr>
                    <td>{{ $loop->index + 1 }}.</td>
                    <td>{{ $result->total_points }}</td>
                    {{-- <td>
                        @foreach ($result->questions as $question)
                            <span>{{ $question->question_text }}, </span>
                        @endforeach
                    </td> --}}
                    {{-- <td>{{ $result->options }}</td> --}}
                    {{-- <td>
                        @foreach ($result->questions as $key => $question)
                          <span class="badge badge-info">{{ $question->question_text }}</span>
                        @endforeach
                    </td> --}}
                    <td>
                        <div class="btn-group btn-group-sm">
                            <a href="{{ route('results.show', $result->id) }}" class="btn btn-success">
                                <i class="fa fa-eye"></i>
                            </a>
                            {{-- <a href="{{ route('results.edit', $result->id) }}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a> --}}
                            <form onclick="return confirm('are you sure ? ')" class="d-inline"
                                action="{{ route('results.destroy', $result->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                    <i class="fa fa-trash"></i>
                                </button>
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
        @foreach ($results as $result)
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