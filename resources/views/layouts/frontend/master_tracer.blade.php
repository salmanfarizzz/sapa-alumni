<!DOCTYPE html>
<html lang="id">

@include('includes.frontend.head_tracer')

<body>

    <!--====== Start Header ======-->
    @include('includes.frontend.navbar_tracer')
    <!--====== End Header ======-->

    @yield('content')

    <!--====== Start Footer ======-->
    @include('includes.frontend.footer_tracer')
    <!--====== End Footer ======-->

    @include('includes.frontend.script')
</body>

</html>