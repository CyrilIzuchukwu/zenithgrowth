@extends('layout.app')

@section('content')

<!-- Start Page Banner Area -->
<div
    class="page-banner-area position-relative overflow-hidden"
    style="background-image: url(assets/images/hero/hero-image-2.svg)">
    <div class="container">
        <div class="page-banner-content">
            <h1>My Account</h1>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li>My Account</li>
            </ul>
        </div>
    </div>

    <div class="shape-image">
        <img class="page-banner-shape-1 moveHorizontal_reverse" src="assets/images/shape/page-banner-shape-1.png" alt="shape">
        <img class="page-banner-shape-2 moveVertical" src="assets/images/shape/page-banner-shape-2.png" alt="shape">
    </div>
</div>
<!-- End Page Banner Area -->

<!-- Start My Account Page -->
<div class="my-account-page ptb-120 overflow-hidden">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-8 col-md-12" data-cues="slideInRight" data-duration="800">
                <form action="{{ route('login') }}" method="POST" class="login-form bg-color-fffaeb radius-30">
                    @csrf
                    <h3>Log In To Your Account</h3>

                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
                            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                        </div>

                        <div class=" mb-3 col-md-12">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                        </div>
                    </div>

                    <div class="d-flex login-warp gap-4 align-items-center justify-content-between">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Keep Me Logged In
                            </label>
                        </div>
                        <div>
                            <a href="password.html" class="password">Forgot Your Password?</a>
                        </div>
                    </div>

                    <button type="submit" class="default-btn w-100 text-center">Log In</button>

                    <div class="underline position-relative"><span>OR</span></div>

                    <a href="https://www.facebook.com/" target="_blank" class="default-btn facebook w-100 text-center mb-4">Log In With Facebook</a>
                    <a href="https://www.google.com/" target="_blank" class="default-btn facebook google w-100 text-center mb-4">Log In With Google</a>

                    <p>Don’t Have An Account? <a href="my-account.html">Create</a></p>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- End My Account Page -->

@endsection
