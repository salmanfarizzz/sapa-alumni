<!DOCTYPE html>
<html lang="id">

@include('includes.frontend.news.head_news')

<body>

    <!--====== Start Header ======-->
    @include('includes.frontend.navbar')
    <!--====== End Header ======-->

    @yield('content')

    <!--====== Start Footer ======-->
    @include('includes.frontend.footer')
    <!--====== End Footer ======-->

    @include('includes.frontend.script')
</body>

</html>