<!-- Header -->
<header class="header d-flex flex-row">
    <div class="header_content d-flex flex-row align-items-center">
        <!-- Logo -->
        <div class="logo_container">
            <div class="logo">
                <img src="{{url('frontend/assets/images/logo1.png')}}" alt="">
            </div>
        </div>

        <!-- Main Navigation -->
        <nav class="main_nav_container">
            <div class="main_nav">
                <ul class="main_nav_list">
                    <li class="main_nav_item"><a href="{{url('/')}}">Beranda</a></li>
                    <li class="main_nav_item"><a href="{{url('/tentang')}}">Tentang</a></li>
                    <li class="main_nav_item dropdown">
                        <a class="nav-link dropdown-toggle" href="{{url('/karir')}}" id="navbardrop" data-toggle="dropdown">
                            UCIC Karir
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url('/lowongan')}}">Lowongan kerja</a>
                            {{-- <a class="dropdown-item" href="{{url('/class')}}">Career Class & Sharing</a> --}}
                        </div>
                    </li>
                    <li class="main_nav_item"><a href="{{url('/news')}}">Berita</a></li>
                    <li class="main_nav_item"><a href="{{url('/partner')}}">Mitra</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="button header_side d-flex flex-row justify-content-center align-items-center">
        <a href="https://docs.google.com/forms/d/e/1FAIpQLSeRu2XotWgKWX1a1rKz3UpWmgun3LlJjFsrdcuYdEoixd1rKA/viewform?pli=1">Tracer Study</a>
    </div>

    <!-- Hamburger -->
    <div class="hamburger_container">
        <i class="fas fa-bars trans_200"></i>
    </div>
</header>

<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
                    <li class="menu_list menu_mm"><a href="{{url('/')}}">Beranda</a></li>
                    <li class="menu_list menu_mm"><a href="{{url('/tentang')}}">Tentang</a></li>
					<li class="menu_list menu_mm dropdown">
                        <a class="nav-link dropdown-toggle" href="{{url('/karir')}}" id="navbardrop" data-toggle="dropdown">
                            UCIC Karir
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{url('/lowongan')}}">Lowongan kerja</a>
                            {{-- <a class="dropdown-item" href="{{url('/class')}}">Career Class & Sharing</a> --}}
                        </div>
                    </li>
					<li class="menu_list menu_mm"><a href="{{url('/news')}}">Berita</a></li>
                    <li class="menu_list menu_mm"><a href="{{url('/partner')}}">Mitra</a></li>
				</ul>

				<!-- Menu Social -->
				
				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>

				<div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
			</div>

		</div>

	</div>

<!-- Menu -->
{{-- <div class="menu_container menu_mm">

    <!-- Menu Close Button -->
    <div class="menu_close_container">
        <div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    </div>

    <!-- Menu Items -->
    <div class="menu_inner menu_mm">
        <div class="menu menu_mm">
            <ul class="menu_list menu_mm">
                <li class="menu_list menu_mm"><a href="{{url('/')}}">Beranda</a></li>
                <li class="menu_list menu_mm"><a href="{{url('/tentang')}}">Tentang</a></li>
                <li class="menu_list menu_mm dropdown">
                    <a class="nav-link dropdown-toggle" href="{{url('/karir')}}" id="navbardrop" data-toggle="dropdown">
                        UCIC Karir
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{url('/lowongan')}}">Lowongan kerja</a>
                        <a class="dropdown-item" href="{{url('/tentang')}}">Tentang UCIC Karir</a>
                        <a class="dropdown-item" href="{{url('/class')}}">Career Class & Sharing</a>
                    </div>
                </li>
                <li class="menu_list menu_mm"><a href="{{url('/news')}}">Berita</a></li>
                <li class="menu_list menu_mm"><a href="{{url('/partner')}}">Mitra</a></li>
            </ul>

            <!-- Menu Social -->
            <div class="menu_social_container menu_mm">
                <ul class="menu_social menu_mm">
                    <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
                </ul>
            </div>

            <div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
        </div>
    </div>
</div> --}}
