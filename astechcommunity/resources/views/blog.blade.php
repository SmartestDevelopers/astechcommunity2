@extends('layouts.front')

@section('title', 'Tech Blog - AS-Tech Community')
@section('meta_description', 'Read the latest articles, tutorials, and insights about technology, programming, and career development.')

@section('content')
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">
                        <div>
                            <h1 class="page-header__title">Tech Blog</h1>
                        </div>
                        
                        <div>
                            <p class="page-header__text">Latest articles, tutorials, and tech insights from our community</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row y-gap-30">
                @for($i = 1; $i <= 9; $i++)
                <div class="col-lg-4 col-md-6">
                    <div class="blogCard -type-1">
                        <div class="blogCard__image">
                            <img src="{{ asset('template/img/blog-list/' . $i . '.png') }}" alt="Blog Post {{ $i }}">
                        </div>
                        <div class="blogCard__content">
                            <div class="blogCard__category">Technology</div>
                            <h4 class="blogCard__title">
                                <a href="{{ route('pages.blog-single') }}">
                                    @switch($i)
                                        @case(1)
                                            The Complete Guide to Modern Web Development
                                            @break
                                        @case(2)
                                            Machine Learning Fundamentals for Beginners
                                            @break
                                        @case(3)
                                            Building Scalable Applications with Cloud Computing
                                            @break
                                        @case(4)
                                            Mobile App Development: Native vs Cross-platform
                                            @break
                                        @case(5)
                                            Cybersecurity Best Practices for Developers
                                            @break
                                        @case(6)
                                            The Future of Artificial Intelligence in Tech
                                            @break
                                        @case(7)
                                            Database Design Principles and Optimization
                                            @break
                                        @case(8)
                                            DevOps Culture and Continuous Integration
                                            @break
                                        @default
                                            Emerging Technologies and Career Opportunities
                                    @endswitch
                                </a>
                            </h4>
                            <div class="blogCard__content">
                                Explore the latest trends and best practices in technology development with our comprehensive guides and tutorials.
                            </div>
                            <div class="blogCard__date">
                                {{ now()->subDays(rand(1, 30))->format('M d, Y') }}
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
