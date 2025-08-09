@extends('layouts.front')

@section('title', 'Tech Events - AS-Tech Community')
@section('meta_description', 'Join our upcoming tech events, workshops, seminars, and networking sessions at AS-Tech Community.')

@section('content')
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">
                        <div>
                            <h1 class="page-header__title">Tech Events</h1>
                        </div>
                        
                        <div>
                            <p class="page-header__text">Join our upcoming workshops, seminars, and networking events</p>
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
                <div class="col-lg-6">
                    <div class="eventCard -type-1">
                        <div class="eventCard__img">
                            <img src="{{ asset('template/img/event-list/' . $i . '.png') }}" alt="Event {{ $i }}">
                        </div>
                        <div class="eventCard__bg bg-white">
                            <div class="eventCard__content y-gap-10">
                                <div class="eventCard__inner">
                                    <h4 class="eventCard__title">
                                        <a href="{{ route('pages.event-single') }}">Tech Workshop Series {{ $i }}</a>
                                    </h4>
                                    <div class="eventCard__text">
                                        Join us for an interactive workshop covering the latest trends in technology and software development.
                                    </div>
                                </div>
                                
                                <div class="eventCard__info">
                                    <div class="eventCard__date">
                                        <i class="icon-calendar mr-8"></i>
                                        {{ now()->addDays($i * 7)->format('M d, Y') }}
                                    </div>
                                    <div class="eventCard__time">
                                        <i class="icon-clock mr-8"></i>
                                        {{ sprintf('%d:00 PM', 2 + $i % 4) }}
                                    </div>
                                    <div class="eventCard__location">
                                        <i class="icon-location mr-8"></i>
                                        AS-Tech Community Center
                                    </div>
                                </div>

                                <div class="eventCard__button">
                                    <a href="{{ route('pages.event-single') }}" class="button -sm -purple-1 text-white">Join Event</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>

            <div class="row justify-center pt-60">
                <div class="col-auto">
                    <div class="pagination -buttons">
                        <button class="pagination__button -prev">
                            <i class="icon-chevron-left text-15"></i>
                        </button>
                        <div class="pagination__count">
                            <a href="#" class="pagination__button -is-active">1</a>
                            <a href="#" class="pagination__button">2</a>
                            <a href="#" class="pagination__button">3</a>
                        </div>
                        <button class="pagination__button -next">
                            <i class="icon-chevron-right text-15"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
