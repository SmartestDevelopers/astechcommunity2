@extends('layouts.front')

@section('title', 'Membership Plans - AS-Tech Community')
@section('meta_description', 'Choose the perfect membership plan for your learning journey. Get access to premium courses, mentorship, and career services.')

@section('content')
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">
                        <div>
                            <h1 class="page-header__title">Membership Plans</h1>
                        </div>
                        
                        <div>
                            <p class="page-header__text">Choose the perfect plan for your learning journey</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-lg-8">
                    <div class="sectionTitle">
                        <h2 class="sectionTitle__title">Flexible Plans for Every Learner</h2>
                        <p class="sectionTitle__text">Start free, upgrade anytime. No hidden fees.</p>
                    </div>
                </div>
            </div>

            <div class="row y-gap-30 justify-center pt-60">
                <div class="col-lg-4 col-md-6">
                    <div class="priceCard -type-1 bg-white rounded-8">
                        <div class="priceCard__bg">
                            <img src="{{ asset('template/img/pricing/1.svg') }}" alt="Basic Plan">
                        </div>
                        <div class="priceCard__header">
                            <h5 class="priceCard__title">Basic</h5>
                            <div class="priceCard__price">
                                <span class="text-30 lh-1 fw-700">Free</span>
                            </div>
                        </div>
                        <div class="priceCard__list">
                            <div class="priceCard__item">
                                <i class="icon-check mr-10"></i>
                                Access to free courses
                            </div>
                            <div class="priceCard__item">
                                <i class="icon-check mr-10"></i>
                                Community forum access
                            </div>
                            <div class="priceCard__item">
                                <i class="icon-check mr-10"></i>
                                Basic support
                            </div>
                            <div class="priceCard__item text-light-1">
                                <i class="icon-close mr-10"></i>
                                Premium course library
                            </div>
                            <div class="priceCard__item text-light-1">
                                <i class="icon-close mr-10"></i>
                                1-on-1 mentorship
                            </div>
                        </div>
                        <div class="priceCard__button">
                            <a href="{{ route('register') }}" class="button -md -outline-purple-1 text-purple-1 col-12">Get Started</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="priceCard -type-1 bg-purple-1 -popular">
                        <div class="priceCard__popular">Most Popular</div>
                        <div class="priceCard__bg">
                            <img src="{{ asset('template/img/pricing/2.svg') }}" alt="Pro Plan">
                        </div>
                        <div class="priceCard__header">
                            <h5 class="priceCard__title text-white">Pro</h5>
                            <div class="priceCard__price">
                                <span class="text-30 lh-1 fw-700 text-white">$29</span>
                                <span class="text-white"> / month</span>
                            </div>
                        </div>
                        <div class="priceCard__list">
                            <div class="priceCard__item text-white">
                                <i class="icon-check mr-10"></i>
                                All Basic features
                            </div>
                            <div class="priceCard__item text-white">
                                <i class="icon-check mr-10"></i>
                                Premium course library
                            </div>
                            <div class="priceCard__item text-white">
                                <i class="icon-check mr-10"></i>
                                Downloadable resources
                            </div>
                            <div class="priceCard__item text-white">
                                <i class="icon-check mr-10"></i>
                                Priority support
                            </div>
                            <div class="priceCard__item text-white">
                                <i class="icon-check mr-10"></i>
                                Course certificates
                            </div>
                        </div>
                        <div class="priceCard__button">
                            <a href="{{ route('register') }}" class="button -md -white text-purple-1 col-12">Start Pro Plan</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="priceCard -type-1 bg-white rounded-8">
                        <div class="priceCard__bg">
                            <img src="{{ asset('template/img/pricing/3.svg') }}" alt="Enterprise Plan">
                        </div>
                        <div class="priceCard__header">
                            <h5 class="priceCard__title">Enterprise</h5>
                            <div class="priceCard__price">
                                <span class="text-30 lh-1 fw-700">$99</span>
                                <span> / month</span>
                            </div>
                        </div>
                        <div class="priceCard__list">
                            <div class="priceCard__item">
                                <i class="icon-check mr-10"></i>
                                All Pro features
                            </div>
                            <div class="priceCard__item">
                                <i class="icon-check mr-10"></i>
                                1-on-1 mentorship
                            </div>
                            <div class="priceCard__item">
                                <i class="icon-check mr-10"></i>
                                Career placement support
                            </div>
                            <div class="priceCard__item">
                                <i class="icon-check mr-10"></i>
                                Custom learning path
                            </div>
                            <div class="priceCard__item">
                                <i class="icon-check mr-10"></i>
                                Direct instructor access
                            </div>
                        </div>
                        <div class="priceCard__button">
                            <a href="{{ route('register') }}" class="button -md -outline-purple-1 text-purple-1 col-12">Start Enterprise</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
