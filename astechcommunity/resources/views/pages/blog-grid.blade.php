@extends('layouts.front')

@section('title', 'Blog Grid - AS-Tech Community')

@section('content')
<section class="page-header -type-1">
    <div class="container">
        <div class="page-header__content">
            <div class="row justify-center text-center">
                <div class="col-auto">
                    <div>
                        <h1 class="page-header__title">Blog Grid</h1>
                    </div>
                    <div>
                        <p class="page-header__text">Grid view of our latest blog posts</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="layout-pt-md layout-pb-lg">
    <div class="container">
        <div class="row y-gap-30 justify-center">
            <div class="col-12">
                <div class="text-center">
                    <h2>Blog Grid View</h2>
                    <p class="mt-10">This is a placeholder for the blog grid layout.</p>
                    <div class="mt-30">
                        <a href="{{ route('pages.blog-list-1') }}" class="button -md -purple-1 text-white">View Blog List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
