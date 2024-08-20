@extends('layouts.backend.app')

@section('title', 'Terima Kasih')

@section('main')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Terima Kasih</h1>
    </div>
    <div class="section-body">
      <div class="card">
        <div class="card-body">
          <p>Terima kasih sudah mengisi tracer study alumni UCIC.</p>
          <a href="{{ url('/home') }}" class="btn btn-primary">Kembali ke Beranda</a>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
