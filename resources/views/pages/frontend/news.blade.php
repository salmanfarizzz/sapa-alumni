@extends('layouts.frontend.berita.news')

@section('title', 'Berita')
@section('content')

<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url({{url('frontend/assets/images/news_background2.png')}})"></div>
		</div>
		<div class="home_content">
			<h1>Berita</h1>
		</div>
	</div>

	<!-- News -->

	<div class="news">
		<div class="container">
			<div class="row">
			
				<div class="col-lg-8">
					
					<div class="news_posts">
						@foreach ($records as $a)
						<!-- News Post -->
						<div class="news_post">
							<div class="news_post_image">
								<a href="{{ url('/news_post', $a->id) }}">
								<a class="image" href="{{ $a->data_kategori[0]['slug_kategori'].'/'.$a->slug}}"> 
									{{-- {{ dd($a->penulis, $a->thumbnail) }} --}}
									{{-- <img src="{{ asset('article-images/' . $a->penulis . '/article-images/thumbnail'.$a->thumbnail) }}" alt="post"> --}}
									{{-- <img src="{{ asset('article-images/' . $a->penulis . '/thumbnail' . pathinfo($a->thumbnail, PATHINFO_FILENAME) . '.jpg') }}" alt="post"> --}}
									<img src="{{url('/article-images/thumbnail/'.$a->thumbnail) }}" alt="post" width="100px">
								</a>
							</div>
							<div class="news_post_top d-flex flex-column flex-sm-row">
								<div class="news_post_date_container">
									<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
										<div>{{ date('d', strtotime($a->tanggal)) }}</div>
										<div>{{ date('M', strtotime($a->tanggal)) }}</div>
									</div>
								</div>
								<div class="news_post_title_container">
									<div class="news_post_title">
										<a href="{{ $a->data_kategori[0]['slug_kategori'].'/'.$a->slug}}">{{ $a->judul }}</a>
									</div>
									<div class="news_post_meta">
										<span class="news_post_author">
											<a href="#" class="meta-item author"><i class="fa fa-user"></i></a> : {{ $a->nama }}
										</span>
										<span>|</span>
										<span class="news_post_comments"><a href="#">{{ date('d M Y', strtotime($a->tanggal)) }}</a></span>
									</div>
								</div>
							</div>
							<div class="news_post_text">
								 <p style="font-size: 13px">
								 @php
								 echo (strlen($a->deskripsi) > 150) ? substr($a->deskripsi, 0, 150) . '...' : $a->deskripsi;
								@endphp
								</p>
							</div>
							{{-- <div class="news_post_button text-center trans_200">
								<a href="{{ url('/news_post', $a->id) }}">Selengkapnya</a>
							</div> --}}
							
						</div>
						@endforeach
					</div>

					<!-- Page Nav -->

					<div class="news_page_nav">
						{{ $main_artikel->links() }}
					</div>

				</div>
				

				<!-- Sidebar Column -->

				<div class="col-lg-4">
					<div class="sidebar">

						<!-- Archives -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Archives</h3>
							</div>
							<ul class="sidebar_list">
								@foreach($kategori as $category)
								<li class="sidebar_list_item"><a href="{{ url($category->slug) }}">{{ $category->nama }}</a></li>
								@endforeach
							</ul>
						</div>

						<!-- Latest Posts -->

						<div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Latest posts</h3>
							</div>
							
							<div class="latest_posts">
								@foreach ($records as $a)
								<!-- Latest Post -->
								<div class="latest_post">
									<div class="latest_post_image">
										<img src="{{url('/article-images/thumbnail/'.$a->thumbnail) }}" alt="#">
									</div>
									<div class="latest_post_title">
										<a href="{{ $a->data_kategori[0]['slug_kategori'].'/'.$a->slug}}">
											{{ $a->judul }}
										</a>
									</div>
									<div class="latest_post_meta">
										<span class="latest_post_author"><a href="#">{{ $a->nama }}</a></span>
										<span>|</span>
										<span class="latest_post_comments"><a href="#">{{ date('d M Y', strtotime($a->tanggal)) }}</a></span>
									</div>
								</div>
								@endforeach
							</div>
								
						</div>

						<!-- Tags -->

						<div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Tags</h3>
							</div>
							<div class="tags d-flex flex-row flex-wrap">
								@foreach($kategori as $category)
								<div class="tag"><a href="{{ url($category->slug) }}">{{ $category->nama }}</a></div>
								@endforeach
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection



{{-- @extends('layouts.frontend.berita.news')

@section('title', 'Berita')
@section('content')

<!-- Home -->

	<div class="home">
		<div class="home_background_container prlx_parent">
			<div class="home_background prlx" style="background-image:url({{url('frontend/assets/images/news_background.jpg')}})"></div>
		</div>
		<div class="home_content">
			<h1>Berita</h1>
		</div>
	</div>

	<!-- News -->

	<div class="news">
		<div class="container">
			<div class="row">
			
				<div class="col-lg-8">
					
					<div class="news_posts">
						<!-- News Post -->
						<div class="news_post">
							<div class="news_post_image">
								<a href="">
								<img src="{{url('frontend/assets/images/wisuda.jpg')}}">
								</a>
							</div>
							<div class="news_post_top d-flex flex-column flex-sm-row">
								<div class="news_post_date_container">
									<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
										<div>18</div>
										<div>dec</div>
									</div>
								</div>
								<div class="news_post_title_container">
									<div class="news_post_title">
										<a href="#">WISUDA V Universitas CIC 2023 Siap Cetak Lulusan Unggul untuk Masa Depan</a>
									</div>
									<div class="news_post_meta">
										<span class="news_post_author">
											<a href="#" class="meta-item author"><i class="fa fa-user"></i>Admin</a>
										</span>
										<span>|</span>
										<span class="news_post_comments"><a href="#"> 18 Desember 2023</a></span>
									</div>
								</div>
							</div>
							<div class="news_post_text">
								<p>
									Universitas CIC dengan bangga mengumumkan pelaksanaan Wisuda V pada tahun 2023.
								</p>
							</div>
							<div class="news_post_button text-center trans_200">
								<a href="/news_post">Read More</a>
							</div>
							
						</div>

						<!-- News Post -->
						<div class="news_post">
							<div class="news_post_image">
								<img src="{{url('frontend/assets/images/pelatihan.jpg')}}" alt="https://unsplash.com/@dsmacinnes">
							</div>
							<div class="news_post_top d-flex flex-column flex-sm-row">
								<div class="news_post_date_container">
									<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
										<div>27</div>
										<div>Jan</div>
									</div>
								</div>
								<div class="news_post_title_container">
									<div class="news_post_title">
										<a href="news_post.html">Pelatihan Foto Produk Bersama Dosen & Mahasiswa UCIC</a>
									</div>
									<div class="news_post_meta">
										<span class="news_post_author"><a href="#">Admin</a></span>
										<span>|</span>
										<span class="news_post_comments"><a href="#">27 Januari 2024</a></span>
									</div>
								</div>
							</div>
							<div class="news_post_text">
								<p>Pelatihan ini bertujuan untuk memperdalam keterampilan mahasiswa dalam fotografi produk.
								</p>
							</div>
							<div class="news_post_button text-center trans_200">
								<a href="news_post.html">Read More</a>
							</div>
						</div>

						<!-- News Post -->
						<div class="news_post">
							<div class="news_post_image">
								<img src="{{url('frontend/assets/images/prestasi.jpg')}}" alt="https://unsplash.com/@dsmacinnes">
							</div>
							<div class="news_post_top d-flex flex-column flex-sm-row">
								<div class="news_post_date_container">
									<div class="news_post_date d-flex flex-column align-items-center justify-content-center">
										<div>20</div>
										<div>dec</div>
									</div>
								</div>
								<div class="news_post_title_container">
									<div class="news_post_title">
										<a href="news_post.html">BANGGA! Dua Mahasiswa Teknik Informatika UCIC, Berhasil Meraih Juara 2 Web Design IT Competition Festival 2023</a>
									</div>
									<div class="news_post_meta">
										<span class="news_post_author"><a href="#">Admin</a></span>
										<span>|</span>
										<span class="news_post_comments"><a href="#">20 Desember</a></span>
									</div>
								</div>
							</div>
							<div class="news_post_text">
								<p>
									Prestasi membanggakan kembali diraih oleh mahasiswa Teknik Informatika dari Universitas CIC
								</p>
							</div>
							<div class="news_post_button text-center trans_200">
								<a href="/news_post">Read More</a>
							</div>
						</div>
					</div>

					<!-- Page Nav -->

					<div class="news_page_nav">
						<ul>
							<li class="active text-center trans_200"><a href="#">01</a></li>
							<li class="text-center trans_200"><a href="#">02</a></li>
							<li class="text-center trans_200"><a href="#">03</a></li>
						</ul>
					</div>

				</div>
				

				<!-- Sidebar Column -->

				<div class="col-lg-4">
					<div class="sidebar">

						<!-- Archives -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Archives</h3>
							</div>
							<ul class="sidebar_list">
								<li class="sidebar_list_item"><a href="#">Design Courses</a></li>
								<li class="sidebar_list_item"><a href="#">All you need to know</a></li>
								<li class="sidebar_list_item"><a href="#">Uncategorized</a></li>
								<li class="sidebar_list_item"><a href="#">About Our Departments</a></li>
								<li class="sidebar_list_item"><a href="#">Choose the right course</a></li>
							</ul>
						</div>

						<!-- Latest Posts -->

						<div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Latest posts</h3>
							</div>
							
							<div class="latest_posts">
								
								<!-- Latest Post -->
								<div class="latest_post">
									<div class="latest_post_image">
										<img src="{{url('frontend/assets/images/latest_1.jpg')}}" alt="https://unsplash.com/@dsmacinnes">
									</div>
									<div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
									<div class="latest_post_meta">
										<span class="latest_post_author"><a href="#">By Christian Smith</a></span>
										<span>|</span>
										<span class="latest_post_comments"><a href="#">3 Comments</a></span>
									</div>
								</div>

								<!-- Latest Post -->
								<div class="latest_post">
									<div class="latest_post_image">
										<img src="{{url('frontend/assets/images/latest_2.jpg')}}" alt="https://unsplash.com/@erothermel">
									</div>
									<div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
									<div class="latest_post_meta">
										<span class="latest_post_author"><a href="#">By Christian Smith</a></span>
										<span>|</span>
										<span class="latest_post_comments"><a href="#">3 Comments</a></span>
									</div>
								</div>

								<!-- Latest Post -->
								<div class="latest_post">
									<div class="latest_post_image">
										<img src="{{url('frontend/assets/images/latest_3.jpg')}}" alt="https://unsplash.com/@element5digital">
									</div>
									<div class="latest_post_title"><a href="news_post.html">Why do you need a qualification?</a></div>
									<div class="latest_post_meta">
										<span class="latest_post_author"><a href="#">By Christian Smith</a></span>
										<span>|</span>
										<span class="latest_post_comments"><a href="#">3 Comments</a></span>
									</div>
								</div>
								
							</div>
								
						</div>

						<!-- Tags -->

						<div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Tags</h3>
							</div>
							<div class="tags d-flex flex-row flex-wrap">
								<div class="tag"><a href="#">Course</a></div>
								<div class="tag"><a href="#">Design</a></div>
								<div class="tag"><a href="#">FAQ</a></div>
								<div class="tag"><a href="#">Teachers</a></div>
								<div class="tag"><a href="#">School</a></div>
								<div class="tag"><a href="#">Graduate</a></div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection --}}