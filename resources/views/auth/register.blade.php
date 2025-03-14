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
            <div class="col-lg-10 col-md-12" data-cues="slideInLeft" data-duration="800">
                <form action="{{ route('user.create') }}" method="POST" class="login-form bg-color-fffaeb radius-30">
                    @csrf
                    <h3>Create An Account</h3>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="">Name</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Name">
                            <span class="text-danger">@error('name') {{ $message }} @enderror</span>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="">Username</label>
                            </fieldset>
                            <input type="text" class="form-control" value="{{ old('username') }}" name="username" placeholder="Username">
                            <span class="text-danger">@error('username') {{ $message }} @enderror</span>
                        </div>


                        <div class="mb-3 col-md-6">
                            <label for="">Email</label>
                            <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Email">
                            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                        </div>


                        <div class="mb-3 col-md-6">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" placeholder="Phone Number">
                            <span class="text-danger">@error('phone') {{ $message }} @enderror</span>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="">Password</label>
                            <input type="text" class="form-control" value="{{ old('password') }}" name="password" placeholder="Password">
                            <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                        </div>


                        <div class="mb-3 col-md-6">
                            <label for="">Confirm Password</label>
                            <input type="text" class="form-control" value="{{ old('confirm_password') }}" name="confirm_password" placeholder="Confirm Password">
                            <span class="text-danger">@error('confirm_password') {{ $message }} @enderror</span>
                        </div>

                    </div>


                    <button type="submit" class="default-btn w-100 text-center mt-3 mb-4">Register Now</button>


                    <p>Already Have An Account? <a href="{{ route('login') }}">Login</a></p>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- End My Account Page -->

@endsection
