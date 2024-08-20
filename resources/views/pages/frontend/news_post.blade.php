@extends('layouts.frontend.ucicKarir.ucic_karir')

@section('title')
{{-- @php
    $id_kategori = array();

@endphp --}}
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
				
				<!-- News Post Column -->

				<div class="col-lg-8">
					
					<div class="news_post_container">
						<!-- News Post -->
						@foreach(array($artikel) as $a)  
							{{-- @if($aa->id!=$artikel->id && $aa->is_publish=='ya' && (in_array($aa->kategori, $id_kategori))) --}}
							{{-- @if($aa->id!=$artikel->id && $aa->is_publish=='ya' && (strpos($aa->kategori,(string)$id_kategori[0]['id']))) --}}
							{{-- @if($aa->id!=$artikel->id && $aa->is_publish=='ya' && (strpos($aa->kategori,(string)$id_kategori[0]['id']))) --}}
						<div class="news_post">
							<div class="news_post_image">
								@if($a->thumbnail != null)
                            		<div class="image"><img src="{{url('/article-images/thumbnail/'.$a->thumbnail) }}" alt="post"></div>
                            	@endif
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
										<a href="{{url($a->id)}}">
											{{ $a->judul }}
										</a>
									</div>
									<div class="news_post_meta">
										<span class="news_post_author"><a href="#">Oleh : {{ $penulis->nama }}</a></span>
										<span>|</span>
										<span class="news_post_comments"><a href="#">{{ date('d M Y', strtotime($a->tanggal)) }}</a></span>
										<span>|</span>
										@foreach (array($kategori) as $key => $k)
                                			@if((strpos($k->kategori,(string)$k->id)))
                                    	@php
                                        	$id_kategori[$key]['id'] = $k->id;
                                        	$id_kategori[$key]['slug'] = $k->slug;
                                    	@endphp
										<span class="news_post_comments"><a href="{{ url($k->slug)}}">{{ucfirst($k->nama)}}</a></span>
										@endif
                               			@endforeach
										{{-- @foreach($kategori as $category)
										<span class="news_post_comments"><a href="{{ url($category->slug) }}">{{ $category->nama }}</a></span>
										@endforeach --}}
									</div>
								</div>
							</div>
							<div class="news_post_text">
								{!!html_entity_decode($a->deskripsi)!!}
							</div>

							<p class="news_post_text" style="margin-top: 59px;">
							{!!html_entity_decode($a->subjek)!!}
							</p>
						</div>

					</div>

				</div>

				<!-- Sidebar Column -->
				<div class="col-lg-4">
					<div class="sidebar">

						<!-- Archives -->
						{{-- <div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Archives</h3>
							</div>
							<ul class="sidebar_list">
								<li class="sidebar_list_item"><a href="#">Lowongan Kerja</a></li>
								<li class="sidebar_list_item"><a href="#">Lowongan Magang</a></li>
								<li class="sidebar_list_item"><a href="#">Berita</a></li>
							</ul>
						</div> --}}

						<!-- Latest Posts -->

						<div class="sidebar_section">
                        <div class="sidebar_section_title">
                            <h3>Latest posts</h3>
                        </div>
                        <div class="latest_posts">
                            <!-- Latest Post -->
                            <div class="latest_post">
                                <div class="latest_post_image">
                                    <img src="{{url('/article-images/thumbnail/'.$a->thumbnail) }}" alt="post" width="100px">
                                </div>
                                <div class="latest_post_title">
                                    <a href="{{ isset($a->data_kategori[0]['slug_kategori']) ? $a->data_kategori[0]['slug_kategori'].'/'.$a->slug : '#' }}">{{ $a->judul }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
						
						<!-- Tags -->

						{{-- <div class="sidebar_section">
							<div class="sidebar_section_title">
								<h3>Tags</h3>
							</div>
							<div class="tags d-flex flex-row flex-wrap">
								<div class="tag"><a href="#">Kegiatan</a></div>
								<div class="tag"><a href="#">Prestasi</a></div>
								<div class="tag"><a href="#">Kerja sama</a></div>
								<div class="tag"><a href="#">Industri</a></div>
							</div>
						</div> --}}

					</div>
				</div>

				
			</div>
		</div>
	</div>

{{-- @endif --}}

@endforeach
@endsection