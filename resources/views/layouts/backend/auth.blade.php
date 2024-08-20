<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
        name="viewport">
    <title>@yield('title') &mdash; Sapa Alumni</title>

    <!-- General CSS Files -->
    <link rel="stylesheet"
        href="{{ asset('backend/assets/library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    @stack('style')

    <!-- Template CSS -->
    <link rel="stylesheet"
        href="{{ asset('backend/assets/css/style.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/assets/css/components.css') }}">
    <!-- Start GA -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                         <div class="login-brand">
                            <img src="{{url('frontend/assets/images/logo2.png')}}" alt="logo" width="300">
                        </div>
                         @if(session()->has('info'))
                         <div class="alert alert-primary">
                            {{ session()->get('info') }}
                        </div>
                        @endif
                        @if(session()->has('status'))
                        <div class="alert alert-info">
                            {{ session()->get('status') }}
                        </div>
                        @endif

                        <!-- Content -->
                        @yield('main')

                        <!-- Footer -->
                        @include('includes.backend.auth-footer')
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('backend/assets/library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('backend/assets/library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('backend/assets/library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('backend/assets/library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/stisla.js') }}"></script>

    @stack('scripts')

    <!-- Template JS File -->
    <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
</body>

</html>
