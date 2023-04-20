<!DOCTYPE html>
<html lang="en">

@include('web.inc.head')

<body class="preloader-visible" data-barba="wrapper">
    <!-- preloader start -->
    <div class="preloader js-preloader">
        <div class="preloader__bg"></div>
    </div>
    <!-- preloader end -->


    <main class="main-content  ">

        @include('web.inc.header')


        <div class="content-wrapper  js-content-wrapper">

            @yield('main-body')

            @include('web.inc.footer')


        </div>
    </main>

    @include('web.inc.script')
</body>

</html>
