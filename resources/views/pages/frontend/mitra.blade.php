@extends('layouts.frontend.mitra_layout')
@section('title', 'Pengguna Lulusan')
@section('content')

<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url({{url('frontend/assets/images/news_background.jpg')}})"></div>
		</div>
		{{-- <div class="home_content">
			<h1>Mitra</h1>
		</div> --}}
	</div>

	<!-- Popular -->

	<div class="popular page_section">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Pengguna Lulusan</h1>
					</div>
				</div>
			</div>

			<div class="row course_boxes">
				<!-- Popular Course Item -->

				@foreach ($pemerintah as $mitra)
				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="{{url('/mitra-images/gambar/'.$mitra->gambar) }}" alt="Gambar">
					</div>
				</div>
				@endforeach

				@foreach($perguruan_tinggi as $mitra)
				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="{{url('/mitra-images/gambar/'.$mitra->gambar) }}" alt="Gambar">
					</div>
				</div>
				@endforeach

				@foreach($industri as $mitra)
				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="{{url('/mitra-images/gambar/'.$mitra->gambar) }}" alt="Gambar">
					</div>
				</div>
				@endforeach
				
				@foreach($asosiasi as $mitra)
				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="{{url('/mitra-images/gambar/'.$mitra->gambar) }}" alt="Gambar">
					</div>
				</div>
				@endforeach

				@foreach($pendidikan as $mitra)
				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="{{url('/mitra-images/gambar/'.$mitra->gambar) }}" alt="Gambar">
					</div>
				</div>
				@endforeach
				
			</div><br><br>

			{{-- <div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Perguruan Tinggi</h1>
					</div>
				</div>
			</div>

			<div class="row course_boxes">
				<!-- Popular Course Item -->
				@foreach($perguruan_tinggi as $mitra)
				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="{{url('/mitra-images/gambar/'.$mitra->gambar) }}" alt="Gambar">
					</div>
				</div>
				@endforeach

			</div><br><br> --}}

			{{-- <div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Industri</h1>
					</div>
				</div>
			</div>

			<div class="row course_boxes">
				<!-- Popular Course Item -->
				@foreach($industri as $mitra)
				<div class="col-lg-4 course_box">
					<div class="card">
						<img class="card-img-top" src="{{url('/mitra-images/gambar/'.$mitra->gambar) }}" alt="Gambar">
					</div>
				</div>
				@endforeach --}}
				
			</div><br><br>


			</div><br><br>
		</div>		
	</div>

@endsection