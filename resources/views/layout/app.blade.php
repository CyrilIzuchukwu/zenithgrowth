<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/finto/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Oct 2024 12:12:33 GMT -->

<head>
    <base href="/public">
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Essential CSS Files -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/flaticon_finto.css">
    <link rel="stylesheet" href="assets/css/scrollCue.css">
    <link rel="stylesheet" href="assets/css/remixicon.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <!-- Title & Favicon -->
i commented
    <!-- <title>Finto - Fintech, Banking, & Finance HTML Template</title> -->

    <link rel="icon" type="image/png" href="assets/images/favicon.png">
</head>

<body>
    <!-- Start Preloader Area -->
    <div class="preloader-area text-center position-fixed top-0 bottom-0 start-0 end-0" id="preloader">
        <div class="loader position-absolute start-0 end-0">
            <div class="wavy position-relative fw-light">
                <span class="d-inline-block"><img src="assets/images/favicon.png" alt="favicon"></span>
                <span class="d-inline-block">U</span>
                <span class="d-inline-block">N</span>
                <span class="d-inline-block">I</span>
                <span class="d-inline-block">O</span>
                <span class="d-inline-block">N</span> 
                <span class="d-inline-block">T</span>
                <span class="d-inline-block">R</span>
                <span class="d-inline-block">A</span>
                <span class="d-inline-block">D</span>
                <span class="d-inline-block">E</span>
                <span class="d-inline-block">S</span>
            </div>
        </div>
    </div>
    <!-- End Preloader Area -->


    @include('snippets.header')


    @include('snippets.mobile-header')

    <!-- Search Modal -->
    <div class="search-modal modal fade" id="exampleModal" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header position-relative">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <form class="popup-form">
                        <input type="text" class="form-control" placeholder="Search here">
                        <button type="submit" class="popup-btn">
                            <i class="ri-search-line"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Modal End -->


    @yield('content')


    @include('snippets.footer')


    <!-- Go top Btn -->
    <div class="go-top">
        <i class="ri-arrow-up-fill"></i>
    </div>
    <!-- Go top Btn End -->

    <!-- JS Files -->
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/fslightbox.min.js"></script>
    <script src="assets/js/smooth-scroll.js"></script>
    <script src="assets/js/scrollCue.min.js"></script>
    <script src="assets/js/script.js"></script>


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('message'))
    <script>
        swal("Successful!", "{{ session('message') }}!", "success");
    </script>
    @endif
    @if (session('error'))
    <script>
        swal("Error!", "{{ session('error') }}!", "warning");
    </script>
    @endif
    @if (Session::has('success'))
    <script>
        swal("Successful!", "{{ Session::get('success') }}!", "success");
    </script>
    @endif

    @if (Session::has('error'))
    <script>
        swal("Error!", "{{ Session::get('error') }}!", "warning");
    </script>
    @endif
</body>

<!-- Mirrored from templates.hibootstrap.com/finto/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Oct 2024 12:12:56 GMT -->

</html>
