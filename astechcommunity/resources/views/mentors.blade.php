@extends('layouts.front')

@section('title', 'Mentors - AS-Tech Community')
@section('meta_description', 'Find experienced tech mentors and accelerate your career growth with personalized guidance.')

@section('content')
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">
                        <div>
                            <h1 class="page-header__title">Mentors</h1>
                        </div>
                        
                        <div>
                            <p class="page-header__text">Get personalized guidance from experienced tech professionals</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row y-gap-30">
                @for($i = 1; $i <= 8; $i++)
                <div class="col-lg-3 col-md-6">
                    <div class="teamCard -type-1 -teamCard-hover">
                        <div class="teamCard__image">
                            <img src="{{ asset('template/img/team/' . $i . '.png') }}" alt="Mentor {{ $i }}">
                        </div>
                        <div class="teamCard__content">
                            <h4 class="teamCard__title">
                                @switch($i)
                                    @case(1)
                                        Dr. Sarah Johnson
                                        @break
                                    @case(2)
                                        Michael Chen
                                        @break
                                    @case(3)
                                        Emily Rodriguez
                                        @break
                                    @case(4)
                                        David Kim
                                        @break
                                    @case(5)
                                        Lisa Thompson
                                        @break
                                    @case(6)
                                        Robert Davis
                                        @break
                                    @case(7)
                                        Jennifer Wilson
                                        @break
                                    @default
                                        Mark Anderson
                                @endswitch
                            </h4>
                            <p class="teamCard__text">
                                @switch($i)
                                    @case(1)
                                        Senior Full Stack Developer at Google
                                        @break
                                    @case(2)
                                        AI/ML Engineer at Microsoft
                                        @break
                                    @case(3)
                                        UX Design Lead at Apple
                                        @break
                                    @case(4)
                                        DevOps Architect at Amazon
                                        @break
                                    @case(5)
                                        Data Science Director at Netflix
                                        @break
                                    @case(6)
                                        Cybersecurity Expert at Tesla
                                        @break
                                    @case(7)
                                        Mobile Development Lead at Uber
                                        @break
                                    @default
                                        Cloud Solutions Architect at IBM
                                @endswitch
                            </p>
                            <div class="teamCard__social">
                                <a href="#" class="size-40 d-flex justify-center items-center text-purple-1">
                                    <i class="icon-linkedin text-16"></i>
                                </a>
                            </div>
                            <div class="teamCard__button">
                                <a href="#" class="button -sm -outline-purple-1 text-purple-1 col-12 mt-20">Book Mentor Session</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <div class="row justify-center pt-60">
                <div class="col-lg-8 text-center">
                    <h3 class="text-24 lh-1 fw-500">Become a Mentor</h3>
                    <p class="text-17 text-dark-1 mt-10">Share your expertise and help the next generation of tech professionals</p>
                    <a href="#" class="button -md -purple-1 text-white mt-30">Apply as Mentor</a>
                </div>
            </div>
        </div>
    </section>
@endsection
