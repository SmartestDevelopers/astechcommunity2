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
                @forelse($posts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="blogCard -type-1">
                        <div class="blogCard__image">
                            <img src="{{ $post->featured_image ? asset('storage/'.$post->featured_image) : asset('template/img/blog-list/1.png') }}" alt="{{ $post->title }}">
                        </div>
                        <div class="blogCard__content">
                            <div class="blogCard__category">{{ $post->category->name ?? 'General' }}</div>
                            <h4 class="blogCard__title">
                                <a href="#">{{ $post->title }}</a>
                            </h4>
                            <div class="blogCard__content">{{ Str::limit(strip_tags($post->excerpt ?? $post->content), 140) }}</div>
                            <div class="blogCard__date">{{ optional($post->published_at)->format('M d, Y') }}</div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center"><p>No blog posts yet.</p></div>
                @endforelse
            </div>

            <div class="row justify-center pt-60">
                <div class="col-auto">
                    {{ $posts->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </section>
@endsection
