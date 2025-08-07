
@extends('layouts.front')

@section('content')
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">
                        <div data-anim="slide-up delay-1">

                            <h1 class="page-header__title">User Interface Courses</h1>

                        </div>

                        <div data-anim="slide-up delay-2">

                            <p class="page-header__text">Write an introductory description of the category.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row y-gap-50">
                <div class="col-xl-3 col-lg-4">
                    <div class="pr-30 lg:pr-0">

                        <div data-anim-child="slide-up delay-2" class="sidebar -courses">
                            <div class="sidebar__item">
                                <div class="accordion js-accordion">
                                    <div class="accordion__item js-accordion-item-active">
                                        <div class="accordion__button items-center">
                                            <h5 class="sidebar__title">Category</h5>

                                            <div class="accordion__icon">
                                                <div class="icon icon-chevron-down"></div>
                                                <div class="icon icon-chevron-up"></div>
                                            </div>
                                        </div>

                                        <div class="accordion__content">
                                            <div class="accordion__content__inner">
                                                <div class="sidebar-checkbox">
                                                    @foreach($categories as $category)
                                                    <div class="sidebar-checkbox__item">
                                                        <a href="{{ route('courses', ['category' => $category->slug]) }}">
                                                            <div class="form-checkbox">
                                                                <input type="radio" name="category" @if(request('category') == $category->slug) checked @endif>
                                                                <div class="form-checkbox__mark">
                                                                    <div class="form-checkbox__icon icon-check"></div>
                                                                </div>
                                                            </div>

                                                            <div class="sidebar-checkbox__title">{{ $category->name }}</div>
                                                            <div class="sidebar-checkbox__count">({{ $category->courses_count }})</div>
                                                        </a>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="sidebar__item">
                                <div class="accordion js-accordion">
                                    <div class="accordion__item js-accordion-item-active">
                                        <div class="accordion__button items-center">
                                            <h5 class="sidebar__title">Level</h5>

                                            <div class="accordion__icon">
                                                <div class="icon icon-chevron-down"></div>
                                                <div class="icon icon-chevron-up"></div>
                                            </div>
                                        </div>

                                        <div class="accordion__content">
                                            <div class="accordion__content__inner">
                                                <div class="sidebar-checkbox">
                                                    @foreach($levels as $level)
                                                    <div class="sidebar-checkbox__item">
                                                        <a href="{{ route('courses', ['level' => $level]) }}">
                                                            <div class="form-checkbox">
                                                                <input type="radio" name="level" @if(request('level') == $level) checked @endif>
                                                                <div class="form-checkbox__mark">
                                                                    <div class="form-checkbox__icon icon-check"></div>
                                                                </div>
                                                            </div>
                                                            <div class="sidebar-checkbox__title">{{ ucfirst($level) }}</div>
                                                        </a>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-9 col-lg-8">
                    <div class="row y-gap-20 items-center justify-between pb-30">
                        <div class="col-auto">
                            @if($courses->total() > 0)
                            <div class="text-14">Showing <span class="text-dark-1 fw-500">{{ $courses->firstItem() }}-{{ $courses->lastItem() }}</span> of {{ $courses->total() }} results</div>
                            @endif
                        </div>

                        <div class="col-auto">
                            <div class="d-flex items-center">
                                <div class="text-14 lh-12">Sort by:</div>

                                <div class="dropdown js-dropdown js-drop1-active ml-15">
                                    <div class="dropdown__button d-flex items-center text-14 lh-12" data-el-toggle=".js-drop1-toggle" data-el-toggle-active=".js-drop1-active">
                                        <span class="js-dropdown-title">
                                            @if(request('sort') == 'rating')
                                                Highest Rated
                                            @elseif(request('sort') == 'popular')
                                                Most Popular
                                            @else
                                                Newest
                                            @endif
                                        </span>
                                        <i class="icon icon-chevron-down text-7 ml-15"></i>
                                    </div>

                                    <div class="toggle-element -dropdown -dark-bg-dark-2 -dark-border-white-10 js-click-dropdown js-drop1-toggle">
                                        <div class="text-14 y-gap-15 js-dropdown-list">
                                            <div><a href="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}" class="d-block js-dropdown-link">Newest</a></div>
                                            <div><a href="{{ request()->fullUrlWithQuery(['sort' => 'popular']) }}" class="d-block js-dropdown-link">Most Popular</a></div>
                                            <div><a href="{{ request()->fullUrlWithQuery(['sort' => 'rating']) }}" class="d-block js-dropdown-link">Highest Rated</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row y-gap-30">
                        @forelse($courses as $course)
                        <div class="col-lg-4 col-md-6">
                            <div data-anim-child="slide-up delay-{{ $loop->iteration }}">

                                <a href="{{ route('courses.show', $course->slug) }}" class="coursesCard -type-1 -hover-shadow border-light rounded-8">
                                    <div class="relative">
                                        <div class="coursesCard__image overflow-hidden rounded-top-8">
                                            <img class="w-1/1" src="{{ $course->image ? asset('storage/' . $course->image) : asset('template/img/coursesCards/'.($loop->iteration).'.png') }}" alt="{{ $course->title }}">
                                            <div class="coursesCard__image_overlay rounded-top-8"></div>
                                        </div>
                                        <div class="d-flex justify-between py-10 px-10 absolute-full-center z-3">
                                            @if($course->is_featured)
                                            <div>
                                                <div class="px-15 rounded-200 bg-purple-1">
                                                    <span class="text-11 lh-1 uppercase fw-500 text-white">Featured</span>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="h-100 pt-15 pb-10 px-20">
                                        <div class="d-flex items-center">
                                            <div class="text-14 lh-1 text-yellow-1 mr-10">{{ $course->rating }}</div>
                                            <div class="d-flex x-gap-5 items-center">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <div class="icon-star {{ $i <= $course->rating ? 'text-yellow-1' : 'text-gray-3' }} text-9"></div>
                                                @endfor
                                            </div>
                                            <div class="text-13 lh-1 ml-10">({{ number_format($course->total_reviews) }})</div>
                                        </div>

                                        <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">{{ $course->title }}</div>

                                        <div class="d-flex x-gap-10 items-center pt-10">
                                            <div class="d-flex items-center">
                                                <div class="mr-8">
                                                    <img src="{{ asset('template/img/coursesCards/icons/1.svg') }}" alt="icon">
                                                </div>
                                                <div class="text-14 lh-1">{{ $course->total_lessons }} lessons</div>
                                            </div>

                                            <div class="d-flex items-center">
                                                <div class="mr-8">
                                                    <img src="{{ asset('template/img/coursesCards/icons/2.svg') }}" alt="icon">
                                                </div>
                                                <div class="text-14 lh-1">{{ $course->duration_hours }}h {{ $course->duration_minutes }}m</div>
                                            </div>

                                            <div class="d-flex items-center">
                                                <div class="mr-8">
                                                    <img src="{{ asset('template/img/coursesCards/icons/3.svg') }}" alt="icon">
                                                </div>
                                                <div class="text-14 lh-1">{{ $course->level }}</div>
                                            </div>
                                        </div>

                                        <div class="coursesCard-footer">
                                            <div class="coursesCard-footer__author">
                                                <img src="{{ $course->instructor->image ? asset('storage/' . $course->instructor->image) : asset('template/img/general/avatar-1.png') }}" alt="{{ $course->instructor->name }}">
                                                <div>{{ $course->instructor->name }}</div>
                                            </div>

                                            <div class="coursesCard-footer__price">
                                                @if($course->discount_price)
                                                    <div>${{ $course->price }}</div>
                                                    <div>${{ $course->discount_price }}</div>
                                                @else
                                                    <div>${{ $course->price }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center">
                          <div class="py-80">
                            <div class="mb-30">
                              <i class="icon-search text-80 text-purple-1"></i>
                            </div>
                            <h3 class="text-40 text-dark-1 mb-20">No Courses Found</h3>
                            <p class="text-17 text-dark-1 mb-30">
                              @if(request('search'))
                                Sorry, we couldn't find any courses matching "{{ request('search') }}".
                              @elseif(request('category'))
                                No courses available in this category at the moment.
                              @else
                                We're working hard to bring you amazing courses. Check back soon!
                              @endif
                            </p>
                            <div class="d-flex justify-center x-gap-20">
                              <a href="{{ route('courses') }}" class="button -md -purple-1 text-white">View All Courses</a>
                              @if(request()->hasAny(['search', 'category', 'level', 'sort']))
                                <a href="{{ route('courses') }}" class="button -md -outline-purple-1 text-purple-1">Clear Filters</a>
                              @endif
                            </div>
                          </div>
                        </div>
                        @endforelse
                    </div>

                    <div class="row justify-center pt-60 lg:pt-40">
                        <div class="col-auto">
                            {{ $courses->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

