@extends('layouts.front')

@section('title', 'Shop - AS-Tech Community')
@section('meta_description', 'Browse our collection of tech books, merchandise, and educational resources.')

@section('content')
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">
                        <div>
                            <h1 class="page-header__title">Shop</h1>
                        </div>
                        
                        <div>
                            <p class="page-header__text">Books, merchandise, and educational resources</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h5 class="sidebar__title">Categories</h5>
                            <div class="sidebar__content">
                                <div class="navList">
                                    <div class="navList__item">
                                        <a class="-is-active" href="#">All Products</a>
                                    </div>
                                    <div class="navList__item">
                                        <a href="#">Tech Books</a>
                                    </div>
                                    <div class="navList__item">
                                        <a href="#">Merchandise</a>
                                    </div>
                                    <div class="navList__item">
                                        <a href="#">Digital Resources</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar__item">
                            <h5 class="sidebar__title">Price Range</h5>
                            <div class="sidebar__content">
                                <div class="navList">
                                    <div class="navList__item">
                                        <a href="#">Under $20</a>
                                    </div>
                                    <div class="navList__item">
                                        <a href="#">$20 - $50</a>
                                    </div>
                                    <div class="navList__item">
                                        <a href="#">$50 - $100</a>
                                    </div>
                                    <div class="navList__item">
                                        <a href="#">$100+</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="row y-gap-30">
                        @for($i = 1; $i <= 9; $i++)
                        <div class="col-lg-4 col-md-6">
                            <div class="shopCard -type-1">
                                <div class="shopCard__image">
                                    <img src="{{ asset('template/img/shop/products/' . $i . '.png') }}" alt="Product {{ $i }}">
                                    <div class="shopCard__sale">Sale</div>
                                </div>
                                <div class="shopCard__content">
                                    <h4 class="shopCard__title">
                                        <a href="{{ route('pages.shop-single') }}">
                                            @switch($i)
                                                @case(1)
                                                    JavaScript: The Definitive Guide
                                                    @break
                                                @case(2)
                                                    Python Programming Handbook
                                                    @break
                                                @case(3)
                                                    AS-Tech Community T-Shirt
                                                    @break
                                                @case(4)
                                                    Web Development Cheat Sheet
                                                    @break
                                                @case(5)
                                                    Data Science with Python
                                                    @break
                                                @case(6)
                                                    AS-Tech Branded Mug
                                                    @break
                                                @case(7)
                                                    Machine Learning Guide
                                                    @break
                                                @case(8)
                                                    Programming Sticker Pack
                                                    @break
                                                @default
                                                    Cloud Computing Essentials
                                            @endswitch
                                        </a>
                                    </h4>
                                    <div class="shopCard__price">
                                        <span class="text-purple-1">${{ rand(15, 99) }}</span>
                                        <span class="text-light-1 line-through ml-10">${{ rand(100, 150) }}</span>
                                    </div>
                                    <div class="shopCard__rating">
                                        <div class="stars">
                                            @for($j = 1; $j <= 5; $j++)
                                                <div class="icon-star {{ $j <= 4 ? 'text-yellow-1' : '' }}"></div>
                                            @endfor
                                        </div>
                                        <div class="text-13 lh-1 ml-10">({{ rand(10, 100) }} reviews)</div>
                                    </div>
                                </div>
                                <div class="shopCard__button">
                                    <a href="{{ route('pages.shop-single') }}" class="button -sm -outline-purple-1 text-purple-1">Add to Cart</a>
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
            </div>
        </div>
    </section>
@endsection
