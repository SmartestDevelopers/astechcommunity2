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
                @forelse($mentors as $mentor)
                <div class="col-lg-3 col-md-6">
                    <div class="teamCard -type-1 -teamCard-hover">
                        <div class="teamCard__image">
                            <img src="{{ $mentor->profile_image ? asset('storage/'.$mentor->profile_image) : asset('template/img/team/1.png') }}" alt="{{ $mentor->name }}">
                        </div>
                        <div class="teamCard__content">
                            <h4 class="teamCard__title">{{ $mentor->name }}</h4>
                            <p class="teamCard__text">{{ $mentor->expertise }}</p>
                            <div class="teamCard__social">
                                @if($mentor->linkedin_profile)
                                <a href="{{ $mentor->linkedin_profile }}" target="_blank" class="size-40 d-flex justify-center items-center text-purple-1">
                                    <i class="icon-linkedin text-16"></i>
                                </a>
                                @endif
                            </div>
                            <div class="teamCard__button">
                                <a href="#" class="button -sm -outline-purple-1 text-purple-1 col-12 mt-20">Book Mentor Session</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center"><p>No mentors available yet.</p></div>
                @endforelse
            </div>

            <div class="row justify-center pt-40">
                <div class="col-auto">
                    {{ $mentors->links('vendor.pagination.custom') }}
                </div>
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
