@extends('layouts.frontend.master')
@section('title', 'Lowongan Kerja')
@section('content')

<!-- Home -->
<div class="home">
    <!-- Hero Slider -->
    <div class="hero_slider_container">
        <div class="hero_slider owl-carousel">
            <!-- Hero Slide -->
            <div class="hero_slide">
                <div class="hero_slide_background" style="background-image:url({{url('frontend/assets/images/slider_background3.png')}})"></div>
                <div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
                    <div class="hero_slide_content text-center">
                        <h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Selamat Datang di <span>Sapa Alumni</span></h1>
                    </div>
                </div>
            </div>
            

            <!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url({{url('frontend/assets/images/hero1.png')}})"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut"> Komunikasi <span>Alumni</span> Terjalin Apik Dengan Layanan Terbaik </h1>
						</div>
					</div>
				</div>
				
				<!-- Hero Slide -->
				<div class="hero_slide">
					<div class="hero_slide_background" style="background-image:url({{url('frontend/assets/images/hero.png')}})"></div>
					<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">
						<div class="hero_slide_content text-center">
							<h1 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">Jaga Silaturahmi dan Komunikasi Antar <span>Alumni</span></h1>
						</div>
					</div>
				</div>
        </div>
        <div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">prev</span></div>
        <div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">next</span></div>
    </div>
</div>

<!-- Popular -->
<div class="popular page_section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>Berita Terbaru</h1>
                </div>
            </div>
        </div>
        <div class="row course_boxes">
            @foreach ($all_artikel as $aa)
                <div class="col-lg-4 col-md-6 col-sm-12 course_box">
                    <div class="card">
                        <a class="image" href="{{ $aa->data_kategori[0]['slug_kategori'].'/'.$aa->slug}}"> 
                            <img src="{{url('/article-images/thumbnail/'.$aa->thumbnail) }}" alt="post" class="img-fluid">
                        </a>
                        <div class="card-body text-center">
                            <div class="card-title">
                                <a href="{{ $aa->data_kategori[0]['slug_kategori'].'/'.$aa->slug}}">{{ $aa->judul }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Register -->
<div class="register">
    <div class="container-fluid">
        <div class="row row-eq-height">
            <div class="col-lg-6 nopadding">
                <div class="register_section d-flex flex-column align-items-center justify-content-center">
                    <div class="register_content text-center">
                        <h1 class="register_title">Ayo Sukseskan <span>Tracer Study 2023</span> Universitas Catur Insan Cendekia</h1>
                        <p class="register_text">Tracer Study UCIC merupakan survei yang dilakukan untuk mengevaluasi dan menyempurnakan proses penyelenggaraan dan sistem pendidikan di UCIC. Hasil Tracer Study UCIC akan menjadi data yang berharga bagi UCIC dan diperlukan untuk berbagai kebutuhan pengembangan dan kemajuan UCIC.</p>
                        <div class="button button_1 register_button mx-auto trans_200"><a href="#">Isi Survei</a></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 nopadding">
                <div class="search_section d-flex flex-column align-items-center justify-content-center">
                    <div class="search_content">
                        <h1 class="search_title">Tujuan Tracer Study</h1>
                        <ul class='ul_item'>
                            <li><p class="register_text">Perbaikan kurikulum untuk menghasilkan lulusan yang berkarakter.</p></li>
                            <li><p class="register_text">Menggali informasi dari alumni mengenai perkembangan kompetensi yang dibutuhkan pasar kerja untuk bahan perbaikan sistem pembelajaran.</p></li>
                            <li><p class="register_text">Melakukan penelusuran tempat kerja, bidang kerja, waktu tunggu memperoleh pekerjaan dari alumni untuk membangun jejaring.</p></li>
                            <li><p class="register_text">Memperoleh informasi mengenai kesiapan kerja lulusan sesuai target Indikator Kinerja Utama (IKU) 1.</p></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials -->
<div class="testimonials page_section">
    <div class="testimonials_background_container prlx_parent">
        <div class="testimonials_background prlx" style="background-image:url({{url('frontend/assets/images/testimonials_background_3.png')}})"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>Apa Kata Para Alumni ?</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="testimonials_slider_container">
                    <div class="owl-carousel owl-theme testimonials_slider">
                        <!-- Testimonials Item -->
                        <div class="owl-item">
                            <div class="testimonials_item text-center">
                                <div class="quote">“</div>
                                <p class="testimonials_text">Kuliah diisi oleh akademisi dan profesional yang ahli dibidangnya. Ilmu yang diberikan applicable untuk pekerjaan saya, terutama secara manajerial. Sempat mendapat pendidikan secara offline, dimana bertemu dengan teman sekelas, menambah network dan pengalaman baru, hanya sayang, karena pandemi, sebagian kuliah dilakukan secara daring. secara keseluruhan, saya mendapat ilmu, pengalaman sekaligus network yang dibutuhkan dalam dunia kerja</p>
                                <div class="testimonial_user">
                                    <div class="testimonial_image mx-auto">
                                        <img src="{{url('frontend/assets/images/testi_user1.jpg')}}" alt="">
                                    </div>
                                    <div class="testimonial_name">Hastuti Romdhona, S.Kom.</div>
                                    <div class="testimonial_title">S1 Teknik Informatika</div>
                                </div>
                            </div>
                        </div>
                        <!-- Add more testimonials items as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Lowongan -->
<div class="events page_section">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section_title text-center">
                    <h1>Lowongan Kerja</h1>
                </div>
            </div>
        </div>
        <div class="event_items">
            @foreach ($lowongans as $l)
            <!-- Event Item -->
            <div class="row event_item">
                <div class="col">
                    <div class="row d-flex flex-row align-items-end">
                        <div class="col-lg-2 order-lg-1 order-2">
                            <div class="event_date d-flex flex-column align-items-center justify-content-center">
                                <div class="event_day">{{ date('d', strtotime($l->tanggal)) }}</div>
                                <div class="event_month">{{ date('M', strtotime($l->tanggal)) }}</div>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-3">
                            <div class="event_content">
                                <div class="event_name"><a class="trans_200" href="{{ route('lokerpost', $l->id) }}">{{ $l->judul }}</a></div>
                                <div class="event_location">{{ $l->perusahaan }}</div>
                                <p>Segera Apply!</p>
                            </div>
                        </div>
                        <div class="col-lg-4 order-lg-3 order-1">
                            <div class="event_image">
                                <img src="{{ url('/lowongan-images/logo/'.$l->logo) }}" alt="{{ $l->perusahaan }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
