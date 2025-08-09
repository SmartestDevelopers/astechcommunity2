@extends('layouts.front')

@section('title', 'Our Services - AS-Tech Community')
@section('meta_description', 'Explore our comprehensive tech education services including courses, mentorship, career guidance, and more at AS-Tech Community.')

@section('content')
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">
                        <div>
                            <h1 class="page-header__title">Our Services</h1>
                        </div>
                        
                        <div>
                            <p class="page-header__text">Comprehensive tech education and career development services</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row y-gap-30">
                <div class="col-lg-4 col-md-6">
                    <div class="featureCard -type-1">
                        <div class="featureCard__icon">
                            <img src="{{ asset('template/img/featureCards/1.svg') }}" alt="icon">
                        </div>
                        <div class="featureCard__content">
                            <h4 class="featureCard__title">Online Courses</h4>
                            <p class="featureCard__text">
                                Expert-led courses in programming, web development, mobile development, and more.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="featureCard -type-1">
                        <div class="featureCard__icon">
                            <img src="{{ asset('template/img/featureCards/2.svg') }}" alt="icon">
                        </div>
                        <div class="featureCard__content">
                            <h4 class="featureCard__title">Mentorship Program</h4>
                            <p class="featureCard__text">
                                Get paired with experienced professionals for personalized career guidance.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="featureCard -type-1">
                        <div class="featureCard__icon">
                            <img src="{{ asset('template/img/featureCards/3.svg') }}" alt="icon">
                        </div>
                        <div class="featureCard__content">
                            <h4 class="featureCard__title">Career Services</h4>
                            <p class="featureCard__text">
                                Job placement assistance, resume reviews, and interview preparation.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="featureCard -type-1">
                        <div class="featureCard__icon">
                            <img src="{{ asset('template/img/featureCards/4.svg') }}" alt="icon">
                        </div>
                        <div class="featureCard__content">
                            <h4 class="featureCard__title">Community Support</h4>
                            <p class="featureCard__text">
                                Join our active community of learners and professionals for networking and support.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="featureCard -type-1">
                        <div class="featureCard__icon">
                            <img src="{{ asset('template/img/featureCards/5.svg') }}" alt="icon">
                        </div>
                        <div class="featureCard__content">
                            <h4 class="featureCard__title">Project-Based Learning</h4>
                            <p class="featureCard__text">
                                Hands-on projects and real-world applications to build your portfolio.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="featureCard -type-1">
                        <div class="featureCard__icon">
                            <img src="{{ asset('template/img/featureCards/6.svg') }}" alt="icon">
                        </div>
                        <div class="featureCard__content">
                            <h4 class="featureCard__title">Certification</h4>
                            <p class="featureCard__text">
                                Earn industry-recognized certificates upon successful course completion.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
