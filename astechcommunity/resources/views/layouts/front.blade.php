<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>@yield('title', config('app.name', 'AS-Tech Community - Learn Technology Skills Online'))</title>
    <meta name="description" content="@yield('meta_description', 'Join AS-Tech Community to learn cutting-edge technology skills through expert-led courses. Master programming, web development, digital marketing and more.')">
    <meta name="keywords" content="@yield('meta_keywords', 'online courses, programming, web development, digital marketing, technology training, coding bootcamp')">
    <meta name="author" content="AsTech Community">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', config('app.name', 'AsTech Community'))">
    <meta property="og:description" content="@yield('og_description', 'Join AS-Tech Community to learn cutting-edge technology skills through expert-led courses.')">
    <meta property="og:image" content="@yield('og_image', asset('template/img/general/logo.svg'))">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('twitter_title', config('app.name', 'AsTech Community'))">
    <meta property="twitter:description" content="@yield('twitter_description', 'Join AS-Tech Communityto learn cutting-edge technology skills through expert-led courses.')">
    <meta property="twitter:image" content="@yield('twitter_image', asset('template/img/general/logo.svg'))">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Robots -->
    <meta name="robots" content="@yield('robots', 'index, follow')">
    
    <!-- Schema.org markup -->
    @stack('schema')

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('template/cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css')}}" />
    <link rel="stylesheet" href="{{asset('template/cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css')}}" />

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css')}}" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('template/unpkg.com/leaflet%401.7.1/dist/leaflet.css')}}" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{asset('template/css/vendors.css')}}">
    <link rel="stylesheet" href="{{asset('template/css/main.css')}}">



</head>

<body class="preloader-visible" data-barba="wrapper">
  <!-- preloader start -->
  <div class="preloader js-preloader">
    <div class="preloader__bg"></div>
  </div>
  <!-- preloader end -->

    <div id="app">

    
  <main class="main-content  ">

    <header data-anim="fade" data-add-bg="bg-dark-1" class="header -type-5 js-header">

      <div class="d-flex items-center bg-purple-1 py-10">
        <div class="container">
          <div class="row y-gap-5 justify-between items-center">
            <div class="col-auto">
              <div class="d-flex x-gap-40 y-gap-10 items-center">
                <div class="d-flex items-center text-white md:d-none">
                  <div class="icon-email mr-10"></div>
                  <div class="text13 lh-1">(00) 242 844 39 88</div>
                </div>
                <div class="d-flex items-center text-white">
                  <div class="icon-email mr-10"></div>
                  <div class="text13 lh-1">hello@educrat.com</div>
                </div>
              </div>
            </div>

            <div class="col-auto">
              <div class="d-flex x-gap-30 y-gap-10">
                <div>
                  <div class="d-flex x-gap-20 items-center text-white">
                    <a href="#"><i class="icon-facebook text-11"></i></a>
                    <a href="#"><i class="icon-twitter text-11"></i></a>
                    <a href="#"><i class="icon-instagram text-11"></i></a>
                    <a href="#"><i class="icon-linkedin text-11"></i></a>
                  </div>
                </div>

                <div class="d-flex items-center text-white text-13 sm:d-none">
                  English <i class="icon-chevron-down text-9 ml-10"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="container py-10">
        <div class="row justify-between items-center">

          <div class="col-auto">
            <div class="header- left">

              <div class="header__logo ">
                <a href="{{ url('/') }}">
                  <img style="width:150px;" src="{{asset('Techbold.png')}}" alt="logo">
                </a>
              </div>

            </div>
          </div>


          <div class="col-auto">
            <div class="header-right d-flex items-center">

              <div class="header-menu js-mobile-menu-toggle ">
                <div class="header-menu__content">
                  <div class="mobile-bg js-mobile-bg"></div>

                  <div class="d-none xl:d-flex items-center px-20 py-20 border-bottom-light">
                    <a href="{{ route('login') }}" class="text-dark-1">Log in</a>
                    <a href="{{ route('register') }}" class="text-dark-1 ml-30">Sign Up</a>
                  </div>

                  <div class="menu js-navList">
                    <ul class="menu__nav text-white -is-active">
                      <li class="menu-item-has-children">
                        <a data-barba href="#">
                          Home <i class="icon-chevron-right text-13 ml-10"></i>
                        </a>

                        <ul class="subnav">
                          <li class="menu__backButton js-nav-list-back">
                            <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> Home</a>
                          </li>

                          <li><a href="{{ url('/') }}">Home 1</a></li>
                          <li><a href="{{ route('pages.home-2') }}">Home 2</a></li>
                          <li><a href="{{ route('pages.home-3') }}">Home 3</a></li>
                          <li><a href="{{ route('pages.home-4') }}">Home 4</a></li>
                          <li><a href="{{ route('pages.home-5') }}">Home 5</a></li>
                          <li><a href="{{ route('pages.home-6') }}">Home 6</a></li>
                          <li><a href="{{ route('pages.home-7') }}">Home 7</a></li>
                          <li><a href="{{ route('pages.home-8') }}">Home 8</a></li>
                          <li><a href="{{ route('pages.home-9') }}">Home 9</a></li>
                          <li><a href="{{ route('pages.home-10') }}">Home 10</a></li>
                        </ul>
                      </li>

                      <li class="menu-item-has-children -has-mega-menu">
                        <a data-barba href="#">Courses <i class="icon-chevron-right text-13 ml-10"></i></a>


                        <div class="mega xl:d-none">
                          <div class="mega__menu">
                            <div class="row x-gap-40">
                              <div class="col">
                                <h4 class="text-17 fw-500 mb-20">Course List Layouts</h4>

                                <ul class="mega__list">

                                  <li><a data-barba href="{{ route('courses.list-1') }}">Course List v1</a></li>

                                  <li><a data-barba href="{{ route('courses.list-2') }}">Course List v2</a></li>

                                  <li><a data-barba href="{{ route('courses.list-3') }}">Course List v3</a></li>

                                  <li><a data-barba href="{{ route('courses.list-4') }}">Course List v4</a></li>

                                  <li><a data-barba href="{{ route('courses.list-5') }}">Course List v5</a></li>

                                  <li><a data-barba href="{{ route('courses.list-6') }}">Course List v6</a></li>

                                  <li><a data-barba href="{{ route('courses.list-7') }}">Course List v7</a></li>

                                  <li><a data-barba href="{{ route('courses.list-8') }}">Course List v8</a></li>

                                  <li><a data-barba href="{{ route('courses.list-9') }}">Course List v9</a></li>

                                </ul>

                              </div>

                              <div class="col">
                                <h4 class="text-17 fw-500 mb-20">Course Single Layouts</h4>

                                <ul class="mega__list">

                                  <li><a data-barba href="{{ route('courses.single-1') }}">Course Single v1</a></li>

                                  <li><a data-barba href="{{ route('courses.single-2') }}">Course Single v2</a></li>

                                  <li><a data-barba href="{{ route('courses.single-3') }}">Course Single v3</a></li>

                                  <li><a data-barba href="{{ route('courses.single-4') }}">Course Single v4</a></li>

                                  <li><a data-barba href="{{ route('courses.single-5') }}">Course Single v5</a></li>

                                  <li><a data-barba href="{{ route('courses.single-6') }}">Course Single v6</a></li>

                                </ul>

                              </div>

                              <div class="col">
                                <h4 class="text-17 fw-500 mb-20">About Courses</h4>

                                <ul class="mega__list">

                                                                  <li><a data-barba href="{{ route('pages.lesson-single-1') }}">Lesson Page v1</a></li>
                                                                  <li><a data-barba href="{{ route('pages.lesson-single-2') }}">Lesson Page v2</a></li>
                                                                  <li><a data-barba href="{{ route('pages.instructors-list-1') }}">Instructors List v1</a></li>
                                                                  <li><a data-barba href="{{ route('pages.instructors-list-2') }}">Instructors List v2</a></li>
                                                                  <li><a data-barba href="{{ route('pages.instructors-single') }}">Instructors Single</a></li>
                                                                  <li><a data-barba href="{{ route('pages.instructors-become') }}">Become an Instructor</a></li>
                                                                </ul>

                              </div>

                              <div class="col">
                                <h4 class="text-17 fw-500 mb-20">Dashboard Pages</h4>

                                <ul class="mega__list">

                                  <li><a data-barba href="{{ route('dashboard.index') }}">Dashboard</a></li>

                                  <li><a data-barba href="{{ route('dashboard.courses') }}">My Courses</a></li>

                                  <li><a data-barba href="{{ route('dashboard.bookmarks') }}">Bookmarks</a></li>

                                  <li><a data-barba href="{{ route('dashboard.listing') }}">Add Listing</a></li>

                                  <li><a data-barba href="{{ route('dashboard.reviews') }}">Reviews</a></li>

                                  <li><a data-barba href="{{ route('dashboard.settings') }}">Settings</a></li>

                                  <li><a data-barba href="{{ route('dashboard.administration') }}">Administration</a></li>

                                  <li><a data-barba href="{{ route('dashboard.assignment') }}">Assignment</a></li>

                                  <li><a data-barba href="{{ route('dashboard.calendar') }}">Calendar</a></li>

                                  <li><a data-barba href="{{ route('dashboard.main') }}">Single Dashboard</a></li>

                                  <li><a data-barba href="{{ route('dashboard.dictionary') }}">Dictionary</a></li>

                                  <li><a data-barba href="{{ route('dashboard.forums') }}">Forums</a></li>

                                  <li><a data-barba href="{{ route('dashboard.grades') }}">Grades</a></li>

                                  <li><a data-barba href="{{ route('dashboard.messages') }}">Messages</a></li>

                                  <li><a data-barba href="{{ route('dashboard.participants') }}">Participants</a></li>

                                  <li><a data-barba href="{{ route('dashboard.quiz') }}">Quiz</a></li>

                                  <li><a data-barba href="{{ route('dashboard.survey') }}">Survey</a></li>

                                </ul>

                              </div>

                              <div class="col">
                                <h4 class="text-17 fw-500 mb-20">Popular Courses</h4>

                                <ul class="mega__list">

                                  <li><a data-barba href="#">Web Developer</a></li>

                                  <li><a data-barba href="#">Mobile Developer</a></li>

                                  <li><a data-barba href="#">Digital Marketing</a></li>

                                  <li><a data-barba href="#">Development</a></li>

                                  <li><a data-barba href="#">Finance &amp; Accounting</a></li>

                                  <li><a data-barba href="#">Design</a></li>

                                  <li><a data-barba href="{{ route('courses.list-1') }}">View All Courses</a></li>

                                </ul>

                              </div>
                            </div>

                            <div class="mega-banner bg-purple-1 ml-40">
                              <div class="text-24 lh-15 text-white fw-700">
                                Join more than<br>
                                <span class="text-green-1">8 million learners</span>
                                worldwide
                              </div>
                              <a href="#" class="button -md -green-1 text-dark-1 fw-500 col-12">Start Learning For Free</a>
                            </div>
                          </div>
                        </div>


                        <ul class="subnav d-none xl:d-block">
                          <li class="menu__backButton js-nav-list-back">
                            <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> Courses</a>
                          </li>

                          <li class="menu-item-has-children">
                            <a href="#">Course List Layouts<div class="icon-chevron-right text-11"></div></a>

                            <ul class="subnav">
                              <li class="menu__backButton js-nav-list-back">
                                <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> Course List Layouts</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.list-1') }}">Course List v1</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.list-2') }}">Course List v2</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.list-3') }}">Course List v3</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.list-4') }}">Course List v4</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.list-5') }}">Course List v5</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.list-6') }}">Course List v6</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.list-7') }}">Course List v7</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.list-8') }}">Course List v8</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.list-all') }}">Course List All</a>
                              </li>

                            </ul>
                          </li>

                          <li class="menu-item-has-children">
                            <a href="#">Course Single Layouts<div class="icon-chevron-right text-11"></div></a>

                            <ul class="subnav">
                              <li class="menu__backButton js-nav-list-back">
                                <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> Course Single Layouts</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.single-1') }}">Course Single v1</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.single-2') }}">Course Single v2</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.single-3') }}">Course Single v3</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.single-4') }}">Course Single v4</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.single-5') }}">Course Single v5</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.single-6') }}">Course Single v6</a>
                              </li>

                            </ul>
                          </li>

                          <li class="menu-item-has-children">
                            <a href="#">About Courses<div class="icon-chevron-right text-11"></div></a>

                            <ul class="subnav">
                              <li class="menu__backButton js-nav-list-back">
                                <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> About Courses</a>
                              </li>

                              <li>
                                <a href="{{ route('pages.lesson-single-1') }}">Lesson Page v1</a>
                              </li>

                              <li>
                                <a href="{{ route('pages.lesson-single-2') }}">Lesson Page v2</a>
                              </li>

                              <li>
                                <a href="{{ route('pages.instructors-list-1') }}">Instructors List v1</a>
                              </li>

                              <li>
                                <a href="{{ route('pages.instructors-list-2') }}">Instructors List v2</a>
                              </li>

                              <li>
                                <a href="{{ route('pages.instructors-single') }}">Instructors Single</a>
                              </li>

                              <li>
                                <a href="{{ route('pages.instructors-become') }}">Become an Instructor</a>
                              </li>

                            </ul>
                          </li>

                          <li class="menu-item-has-children">
                            <a href="#">Dashboard Pages<div class="icon-chevron-right text-11"></div></a>

                            <ul class="subnav">
                              <li class="menu__backButton js-nav-list-back">
                                <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> Dashboard Pages</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.courses') }}">My Courses</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.bookmarks') }}">Bookmarks</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.listing') }}">Add Listing</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.reviews') }}">Reviews</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.settings') }}">Settings</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.administration') }}">Administration</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.assignment') }}">Assignment</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.calendar') }}">Calendar</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.main') }}">Single Dashboard</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.dictionary') }}">Dictionary</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.forums') }}">Forums</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.grades') }}">Grades</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.messages') }}">Messages</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.participants') }}">Participants</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.quiz') }}">Quiz</a>
                              </li>

                              <li>
                                <a href="{{ route('dashboard.survey') }}">Survey</a>
                              </li>

                            </ul>
                          </li>

                          <li class="menu-item-has-children">
                            <a href="#">Popular Courses<div class="icon-chevron-right text-11"></div></a>

                            <ul class="subnav">
                              <li class="menu__backButton js-nav-list-back">
                                <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> Popular Courses</a>
                              </li>

                              <li>
                                <a href="#">Web Developer</a>
                              </li>

                              <li>
                                <a href="#">Mobile Developer</a>
                              </li>

                              <li>
                                <a href="#">Digital Marketing</a>
                              </li>

                              <li>
                                <a href="#">Development</a>
                              </li>

                              <li>
                                <a href="#">Finance &amp; Accounting</a>
                              </li>

                              <li>
                                <a href="#">Design</a>
                              </li>

                              <li>
                                <a href="{{ route('courses.list-1') }}">View All Courses</a>
                              </li>

                            </ul>
                          </li>
                        </ul>
                      </li>

                      <li class="menu-item-has-children">
                        <a data-barba href="#">Events <i class="icon-chevron-right text-13 ml-10"></i></a>
                        <ul class="subnav">
                          <li class="menu__backButton js-nav-list-back">
                            <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> Events</a>
                          </li>

                          <li><a href="{{ route('pages.event-list-1') }}">Event List 1</a></li>
                          <li><a href="{{ route('pages.event-list-2') }}">Event List 2</a></li>
                          <li><a href="{{ route('pages.event-single') }}">Event Single</a></li>

                        </ul>
                      </li>

                      <li class="menu-item-has-children">
                        <a data-barba href="#">Blog <i class="icon-chevron-right text-13 ml-10"></i></a>
                        <ul class="subnav">
                          <li class="menu__backButton js-nav-list-back">
                            <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> Blog</a>
                          </li>

                          <li><a href="{{ route('pages.blog-list-1') }}">Blog List 1</a></li>
                          <li><a href="{{ route('pages.blog-list-2') }}">Blog List 2</a></li>
                          <li><a href="{{ route('pages.blog-single') }}">Blog Single</a></li>
                          <li><a href="{{ route('pages.blog-grid') }}">Blog Grid</a></li>
                          <li><a href="{{ route('pages.blog-archive') }}">Blog Archive</a></li>
                          <li><a href="{{ route('pages.blog-category') }}">Blog Category</a></li>
                          <li><a href="{{ route('pages.blog-tag') }}">Blog Tag</a></li>
                          <li><a href="{{ route('pages.blog-author') }}">Blog Author</a></li>
                        </ul>
                      </li>

                      <li class="menu-item-has-children">
                        <a data-barba href="#">
                          Pages <i class="icon-chevron-right text-13 ml-10"></i>
                        </a>

                        <ul class="subnav">
                          <li class="menu__backButton js-nav-list-back">
                            <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> Pages</a>
                          </li>
                          <li class="menu-item-has-children">
                            <a href="#">About Us<div class="icon-chevron-right text-11"></div></a>

                            <ul class="subnav">
                              <li class="menu__backButton js-nav-list-back">
                                <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> About Us</a>
                              </li>

                              <li>
                                <a href="{{ url('/about') }}">About Us</a>
                              </li>

                            </ul>
                          </li>

                          <li class="menu-item-has-children">
                            <a href="#">Contact<div class="icon-chevron-right text-11"></div></a>
                            <ul class="subnav">
                              <li class="menu__backButton js-nav-list-back">
                                <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> Contact</a>
                              </li>

                              <li>
                                <a href="{{ route('pages.contact-1') }}">Contact 1</a>
                              </li>

                              <li>
                                <a href="{{ route('pages.contact-2') }}">Contact 2</a>
                              </li>

                            </ul>
                          </li>

                          <li class="menu-item-has-children">
                            <a href="#">Shop<div class="icon-chevron-right text-11"></div></a>
                            <ul class="subnav">
                              <li class="menu__backButton js-nav-list-back">
                                <a href="#"><i class="icon-chevron-left text-13 mr-10"></i> Shop</a>
                              </li>

                              <li>
                                <a href="{{ route('pages.shop-cart') }}">Shop Cart</a>
                              </li>

                              <li>
                                <a href="{{ route('pages.shop-checkout') }}">Shop Checkout</a>
                              </li>

                              <li>
                                <a href="{{ route('pages.shop-list') }}">Shop List</a>
                              </li>

                              <li>
                                <a href="{{ route('pages.shop-order') }}">Shop Order</a>
                              </li>

                              <li>
                                <a href="{{ route('pages.shop-single') }}">Shop Single</a>
                              </li>

                            </ul>
                          </li>


                          <li>
                            <a href="{{ route('pages.pricing') }}">Membership plans</a>
                          </li>

                          <li>
                            <a href="{{ route('pages.404') }}">404 Page</a>
                          </li>

                          <li>
                            <a href="{{ route('pages.terms') }}">FAQs</a>
                          </li>

                          <li>
                            <a href="{{ route('pages.help-center') }}">Help Center</a>
                          </li>

                          <li>
                            <a href="{{ route('login') }}">Login</a>
                          </li>

                          <li>
                            <a href="{{ route('register') }}">Register</a>
                          </li>

                          <li>
                            <a href="{{ route('pages.ui-elements') }}">UI Elements</a>
                          </li>

                        </ul>
                      </li>

                      <li>
                        <a data-barba href="{{url('/contact')  }}">Contact</a>
                      </li>
                    </ul>
                  </div>

                  <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                    <div class="mobile-footer__number">
                      <div class="text-17 fw-500 text-dark-1">Call us</div>
                      <div class="text-17 fw-500 text-purple-1">800 388 80 90</div>
                    </div>

                    <div class="lh-2 mt-10">
                      <div>329 Queensberry Street,<br> North Melbourne VIC 3051, Australia.</div>
                      <div>hi@educrat.com</div>
                    </div>

                    <div class="mobile-socials mt-10">

                      <a href="#" class="d-flex items-center justify-center rounded-full size-40">
                        <i class="fa fa-facebook"></i>
                      </a>

                      <a href="#" class="d-flex items-center justify-center rounded-full size-40">
                        <i class="fa fa-twitter"></i>
                      </a>

                      <a href="#" class="d-flex items-center justify-center rounded-full size-40">
                        <i class="fa fa-instagram"></i>
                      </a>

                      <a href="#" class="d-flex items-center justify-center rounded-full size-40">
                        <i class="fa fa-linkedin"></i>
                      </a>

                    </div>
                  </div>
                </div>

                <div class="header-menu-close" data-el-toggle=".js-mobile-menu-toggle">
                  <div class="size-40 d-flex items-center justify-center rounded-full bg-white">
                    <div class="icon-close text-dark-1 text-16"></div>
                  </div>
                </div>

                <div class="header-menu-bg"></div>
              </div>


              <div class="header-right__icons text-white d-flex items-center ml-30">

                <div class="">
                  <button class="d-flex items-center text-white" data-el-toggle=".js-search-toggle">
                    <i class="text-20 icon icon-search"></i>
                  </button>

                  <div class="toggle-element js-search-toggle">
                    <div class="header-search pt-90 bg-white shadow-4">
                      <div class="container">
                        <div class="header-search__field">
                          <div class="icon icon-search text-dark-1"></div>
                          <input type="text" class="col-12 text-18 lh-12 text-dark-1 fw-500" placeholder="What do you want to learn?">

                          <button class="d-flex items-center justify-center size-40 rounded-full bg-purple-3" data-el-toggle=".js-search-toggle">
                            <img src="{{ asset('template/img/menus/close.svg') }}" alt="icon">
                          </button>
                        </div>

                        <div class="header-search__content mt-30">
                          <div class="text-17 text-dark-1 fw-500">Popular Right Now</div>

                          <div class="d-flex y-gap-5 flex-column mt-20">
                            <a href="{{ route('courses.single-1') }}" class="text-dark-1">The Ultimate Drawing Course - Beginner to Advanced</a>
                            <a href="{{ route('courses.single-2') }}" class="text-dark-1">Character Art School: Complete Character Drawing Course</a>
                            <a href="{{ route('courses.single-3') }}" class="text-dark-1">Complete Blender Creator: Learn 3D Modelling for Beginners</a>
                            <a href="{{ route('courses.single-4') }}" class="text-dark-1">User Experience Design Essentials - Adobe XD UI UX Design</a>
                            <a href="{{ route('courses.single-5') }}" class="text-dark-1">Graphic Design Masterclass - Learn GREAT Design</a>
                            <a href="{{ route('courses.single-6') }}" class="text-dark-1">Adobe Photoshop CC � Essentials Training Course</a>
                          </div>

                          <div class="mt-30">
                            <button class="uppercase underline">PRESS ENTER TO SEE ALL SEARCH RESULTS</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="header-search__bg" data-el-toggle=".js-search-toggle"></div>
                  </div>
                </div>


                <div class="relative ml-30 xl:ml-20">
                  <button class="d-flex items-center text-white" data-el-toggle=".js-cart-toggle">
                    <i class="text-20 icon icon-basket"></i>
                  </button>

                  <div class="toggle-element js-cart-toggle">
                    <div class="header-cart bg-white -dark-bg-dark-1 rounded-8">
                      <div class="px-30 pt-30 pb-10">

                        <div class="row justify-between x-gap-40 pb-20">
                          <div class="col">
                            <div class="row x-gap-10 y-gap-10">
                              <div class="col-auto">
                                <img src="{{ asset('template/img/menus/cart/1.png') }}" alt="image">
                              </div>

                              <div class="col">
                                <div class="text-dark-1 lh-15">The Ultimate Drawing Course Beginner to Advanced...</div>

                                <div class="d-flex items-center mt-10">
                                  <div class="lh-12 fw-500 line-through text-light-1 mr-10">$179</div>
                                  <div class="text-18 lh-12 fw-500 text-dark-1">$79</div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-auto">
                            <button><img src="{{ asset('template/img/menus/close.svg') }}" alt="icon"></button>
                          </div>
                        </div>

                        <div class="row justify-between x-gap-40 pb-20">
                          <div class="col">
                            <div class="row x-gap-10 y-gap-10">
                              <div class="col-auto">
                                <img src="{{ asset('template/img/menus/cart/2.png') }}" alt="image">
                              </div>

                              <div class="col">
                                <div class="text-dark-1 lh-15">User Experience Design Essentials - Adobe XD UI UX...</div>

                                <div class="d-flex items-center mt-10">
                                  <div class="lh-12 fw-500 line-through text-light-1 mr-10">$179</div>
                                  <div class="text-18 lh-12 fw-500 text-dark-1">$79</div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-auto">
                            <button><img src="{{ asset('template/img/menus/close.svg') }}" alt="icon"></button>
                          </div>
                        </div>

                      </div>

                      <div class="px-30 pt-20 pb-30 border-top-light">
                        <div class="d-flex justify-between">
                          <div class="text-18 lh-12 text-dark-1 fw-500">Total:</div>
                          <div class="text-18 lh-12 text-dark-1 fw-500">$659</div>
                        </div>

                        <div class="row x-gap-20 y-gap-10 pt-30">
                          <div class="col-sm-6">
                            <button class="button py-20 -dark-1 text-white -dark-button-white col-12">View Cart</button>
                          </div>
                          <div class="col-sm-6">
                            <button class="button py-20 -purple-1 text-white col-12">Checkout</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="d-none xl:d-block ml-20">
                  <button class="text-white items-center" data-el-toggle=".js-mobile-menu-toggle">
                    <i class="text-11 icon icon-mobile-menu"></i>
                  </button>
                </div>

              </div>

              <div class="header-right__buttons d-flex items-center ml-30 xl:ml-20 md:d-none">
                @guest
                  <a href="{{ route('login') }}" class="button -underline text-white">Log in</a>
                  <a href="{{ route('register') }}" class="button px-25 h-50 -white text-dark-1 -rounded ml-30 xl:ml-20">Sign up</a>
                @else
                  <a href="{{ route('admin.dashboard') }}" class="button -underline text-white mr-20">Admin Panel</a>
                  <div class="relative">
                    <button class="d-flex items-center text-white" onclick="toggleUserMenu()">
                      <i class="icon-person text-16 mr-10"></i>
                      {{ Auth::user()->name }}
                      <i class="icon-chevron-down text-9 ml-10"></i>
                    </button>
                    <div id="user-menu" class="toggle-element" style="display: none; position: absolute; top: 100%; right: 0; background: white; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); min-width: 200px; z-index: 1000;">
                      <div class="py-10">
                        <a href="{{ route('admin.dashboard') }}" class="d-flex items-center px-20 py-10 text-dark-1 hover:bg-light-1">
                          <i class="icon-settings text-16 mr-10"></i>
                          Admin Dashboard
                        </a>
                        <a href="{{ route('logout') }}" class="d-flex items-center px-20 py-10 text-dark-1 hover:bg-light-1"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          <i class="icon-log-out text-16 mr-10"></i>
                          Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                      </div>
                    </div>
                  </div>
                @endguest
              </div>
            </div>
          </div>

        </div>
      </div>
    </header>
    <div class="content-wrapper  js-content-wrapper">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

       
            @yield('content')
       

        <footer class="footer -type-4 bg-dark-2">
        <div class="container">
          <div class="row y-gap-30 justify-between pt-60">
            <div class="col-lg-7 col-md-6">
              <div class="text-17 fw-500 text-white uppercase mb-25">
                GET IN TOUCH
              </div>
              <form action="https://creativelayers.net/themes/educrat-html/post" class="form-single-field -base mt-15">
                <input class="py-20 px-30 bg-dark-6 rounded-200 text-white" type="text" placeholder="Your Email">
                <button class="button -white rounded-full" type="submit">
                  <i class="icon-arrow-right text-24 text-dark-1"></i>
                </button>
              </form>
            </div>

            <div class="col-xl-4 col-lg-5 col-md-6">
              <div class="footer-header__logo">
                <img src="{{ asset('template/img/footer/footer-logo.svg') }}" alt="logo">
              </div>

              <div class="d-flex justify-between mt-30">
                <div class="">
                  <div class="text-white opac-70">Toll Free Customer Care</div>
                  <div class="text-18 lh-1 fw-500 text-white mt-5">+(1) 123 456 7890</div>
                </div>
                <div class="">
                  <div class="text-white opac-70">Need live support?</div>
                  <div class="text-18 lh-1 fw-500 text-white mt-5">hi@educrat.comv</div>
                </div>
              </div>
            </div>
          </div>

          <div class="row y-gap-30 justify-between pt-60 pb-60">
            <div class="col-lg-7 col-md-6">
              <div class="row y-gap-30">
                <div class="col-lg-4 col-md-4">
                  <div class="text-17 fw-500 text-white uppercase mb-25">ABOUT</div>
                  <div class="d-flex y-gap-10 flex-column text-white">
                    <a href="{{ route('pages.about-1') }}">About Us</a>
                    <a href="{{ route('pages.blog-list-1') }}">Learner Stories</a>
                    <a href="{{ route('pages.instructor-become') }}">Careers</a>
                    <a href="{{ route('pages.blog-list-1') }}">Press</a>
                    <a href="#">Leadership</a>
                    <a href="{{ route('pages.contact-1') }}">Contact Us</a>
                  </div>
                </div>

                <div class="col-lg-8 col-md-8">
                  <div class="text-17 fw-500 text-white uppercase mb-25">CATEGORIES</div>
                  <div class="row justify-between y-gap-20">
                    <div class="col-md-6">
                      <div class="d-flex y-gap-10 flex-column text-white">
                        <a href="{{ route('courses.single-1') }}">Development</a>
                        <a href="{{ route('courses.single-2') }}">Business</a>
                        <a href="{{ route('courses.single-3') }}">Finance & Accounting</a>
                        <a href="{{ route('courses.single-4') }}">IT & Software</a>
                        <a href="{{ route('courses.single-5') }}">Office Productivity</a>
                        <a href="{{ route('courses.single-6') }}">Design</a>
                        <a href="{{ route('courses.single-1') }}">Marketing</a>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="d-flex y-gap-10 flex-column text-white">
                        <a href="{{ route('courses.single-1') }}">Lifiestyle</a>
                        <a href="{{ route('courses.single-2') }}">Photography & Video</a>
                        <a href="{{ route('courses.single-3') }}">Health & Fitness</a>
                        <a href="{{ route('courses.single-4') }}">Music</a>
                        <a href="{{ route('courses.single-5') }}">UX Design</a>
                        <a href="{{ route('courses.single-6') }}">Seo</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-lg-5 col-md-6">
              <div class="">
                <div class="text-17 uppercase text-white fw-500">Take your learning with you</div>

                <div class="d-flex mt-15">
                  <div class="d-flex items-center rounded-8 px-25 py-10 footer-bg-color">
                    <div class="icon-apple text-white text-24"></div>
                    <div class="text-white ml-20">
                      <div class="text-13 lh-12">Download on the</div>
                      <div class="text-15 fw-500 lh-12 mt-3">Apple Store</div>
                    </div>
                  </div>

                  <div class="d-flex items-center rounded-8 px-25 py-10 footer-bg-color ml-10">
                    <div class="icon-play-market text-white text-24"></div>
                    <div class="text-white ml-20">
                      <div class="text-13 lh-12">Get in on</div>
                      <div class="text-15 fw-500 lh-12 mt-3">Google Play</div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="footer-header-socials mt-60">
                <div class="text-17 uppercase text-white fw-500">Follow us on social media</div>
                <div class="footer-header-socials__list d-flex items-center mt-15">
                  <a href="#" class="size-40 d-flex justify-center items-center text-white"><i class="icon-facebook"></i></a>
                  <a href="#" class="size-40 d-flex justify-center items-center text-white"><i class="icon-twitter"></i></a>
                  <a href="#" class="size-40 d-flex justify-center items-center text-white"><i class="icon-instagram"></i></a>
                  <a href="#" class="size-40 d-flex justify-center items-center text-white"><i class="icon-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="py-30 border-top-light-15">
            <div class="row justify-between items-center y-gap-20">
              <div class="col-auto">
                <div class="d-flex items-center h-100 text-white">
                  � 2022 Educrat. All Right Reserved.
                </div>
              </div>

              <div class="col-auto">
                <div class="d-flex x-gap-20 y-gap-20 items-center flex-wrap">
                  <div>
                    <div class="d-flex x-gap-15 text-white">
                      <a href="{{ route('pages.help-center') }}">Help</a>
                      <a href="{{ route('pages.terms') }}">Privacy Policy</a>
                      <a href="{{ route('pages.terms') }}">Cookie Notice</a>
                      <a href="{{ route('pages.terms') }}">Security</a>
                      <a href="{{ route('pages.terms') }}">Terms of Use</a>
                    </div>
                  </div>

                  <div>
                    <a href="#" class="button px-30 h-50 -dark-6 rounded-200 text-white">
                      <i class="icon-worldwide text-20 mr-15"></i><span class="text-15">English</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>

    </div>
    </div>
  </main>

  <!-- JavaScript -->
  <script src="{{asset('template/unpkg.com/leaflet%401.7.1/dist/leaflet.js')}}" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
  <script src="{{asset('template/js/vendors.js')}}"></script>
  <script src="{{asset('template/js/main.js')}}"></script>
  
  <script>
    function toggleUserMenu() {
      const menu = document.getElementById('user-menu');
      if (menu.style.display === 'none' || menu.style.display === '') {
        menu.style.display = 'block';
      } else {
        menu.style.display = 'none';
      }
    }
    
    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
      const menu = document.getElementById('user-menu');
      const button = event.target.closest('button');
      if (menu && !menu.contains(event.target) && (!button || button.getAttribute('onclick') !== 'toggleUserMenu()')) {
        menu.style.display = 'none';
      }
    });
  </script>
</body>
</html>

