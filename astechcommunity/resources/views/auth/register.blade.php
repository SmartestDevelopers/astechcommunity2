@extends('layouts.front')

@section('title', 'Register - Educrat')

@section('content')
<section class="form-page">
            <div class="form-page__img bg-dark-1">
                <div class="form-page-composition">
                    <div class="-bg"><img data-move="30" class="js-mouse-move" src="{{ asset('template/img/login/bg.png') }}" alt="bg"></div>
                    <div class="-el-1"><img data-move="20" class="js-mouse-move" src="{{ asset('template/img/home-9/hero/bg.png') }}" alt="image"></div>
                    <div class="-el-2"><img data-move="40" class="js-mouse-move" src="{{ asset('template/img/home-9/hero/1.png') }}" alt="icon"></div>
                    <div class="-el-3"><img data-move="40" class="js-mouse-move" src="{{ asset('template/img/home-9/hero/2.png') }}" alt="icon"></div>
                    <div class="-el-4"><img data-move="40" class="js-mouse-move" src="{{ asset('template/img/home-9/hero/3.png') }}" alt="icon"></div>
                </div>
            </div>

            <div class="form-page__content lg:py-50">
                <div class="container">
                    <div class="row justify-center items-center">
                        <div class="col-xl-8 col-lg-9">
                            <div class="px-50 py-50 md:px-25 md:py-25 bg-white shadow-1 rounded-16">
                                <h3 class="text-30 lh-13">Sign Up</h3>
                                <p class="mt-10">Already have an account? <a href="{{ route('login') }}" class="text-purple-1">Log in</a></p>

                                <form method="POST" action="{{ route('register') }}" class="contact-form respondForm__form row y-gap-20 pt-30">
                                    @csrf
                                    <div class="col-lg-6">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Name *</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email address *</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Password *</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Confirm Password *</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="button -md -green-1 text-dark-1 fw-500 w-1/1">
                                            Register
                                        </button>
                                    </div>
                                </form>

                                <div class="lh-12 text-dark-1 fw-500 text-center mt-20">Or sign in using</div>

                                <div class="d-flex x-gap-20 items-center justify-between pt-20">
                                    <div><button class="button -sm px-24 py-20 -outline-blue-3 text-blue-3 text-14">Log In via Facebook</button></div>
                                    <div><button class="button -sm px-24 py-20 -outline-red-3 text-red-3 text-14">Log In via Google+</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>
@endsection
