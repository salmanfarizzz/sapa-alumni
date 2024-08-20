@extends('layouts.frontend.ucicKarir.ucic_karir')

@section('title')
@section('content')


<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url({{url('frontend/assets/images/news_background.jpg')}})"></div>
		</div>
		
		<div class="home_content">
			<h1>Lowongan Pekerjaan</h1>
		</div>
	</div>

	<!-- News -->
	<!-- Update the foreach loop to a single instance -->
<div class="news">
    <div class="container">
        <div class="row">
            <!-- News Post Column -->
            <div class="col-lg-8">
                <div class="news_post_container">
                    <!-- News Post -->
                    <div class="news_post">
                        <div class="news_title">
                            <h1>{{ $lowongan->judul }}</h1>
                        </div>
                        <br>
                        <div class="news_post_image">
                            <img src="{{url('/lowongan-images/gambar/'.$lowongan->banner) }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection