@extends('layouts.frontend.berita.news')

@section('title', 'Collegetivity — Aplikasi yang Membantu Dunia Perkuliahanmu!')
@section('content')

<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url({{url('frontend/assets/images/news_background.jpg')}})"></div>
		</div>
		<div class="home_content">
			<h1>Lowongan Kerja</h1>
		</div>
	</div>

	<!-- Lowongan -->

	<div class="news">
		<div class="container">
			<div class="row">
				
				<!-- Lowongan Column -->

				<div class="col-lg-12">
					
					<div class="news_posts">
						<!-- Lowongan Post -->
						<div class="news_post">
							@foreach ($lowongans as $l)
							<div class="news_post_top d-flex flex-column flex-sm-row">
								<div class="news_post_date_container">
									<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
										<div>{{ date('d', strtotime($l->tanggal)) }}</div>
										<div>{{ date('M', strtotime($l->tanggal)) }}</div>
									</div>
								</div>
								<div class="news_post_title_container">
									<div class="news_post_title">
										<a href="/loker_post/{{ $l->id }}">{{$l->judul}}</a>
									</div>
								</div>
							</div>
							<div class="news_post_button text-center trans_200">
								<a href="/loker_post/{{ $l->id }}">Lihat Lowongan</a>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection