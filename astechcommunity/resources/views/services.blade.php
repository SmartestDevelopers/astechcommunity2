@extends('layouts.front')

@section('title', 'Our Services - AS-Tech Community')
@section('meta_description', 'Explore our comprehensive tech education services including courses, mentorship, career guidance, and more at AS-Tech Community.')

@section('content')
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">
                        <div>
                            <h1 class="page-header__title">Our Services</h1>
                        </div>
                        
                        <div>
                            <p class="page-header__text">Comprehensive tech education and career development services</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row y-gap-30">
                @forelse($services as $service)
                <div class="col-lg-4 col-md-6">
                    <div class="coursesCard -type-1 -hover-shadow border-light rounded-8">
                        <a href="{{ route('services.show', $service->slug) }}" class="coursesCard__image">
                            <img class="w-1/1" src="{{ $service->image ? asset('storage/'.$service->image) : asset('template/img/coursesCards/1.png') }}" alt="{{ $service->title }}">
                        </a>
                        <div class="h-100 pt-15 pb-10 px-20">
                            <div class="text-17 lh-15 fw-500 text-dark-1 mt-10">{{ $service->title }}</div>
                            <div class="text-14 text-dark-1 mt-5">{{ Str::limit($service->short_description, 120) }}</div>
                            <div class="d-flex items-center justify-between mt-10">
                                <div class="text-16 fw-600">${{ number_format($service->price ?? 0, 2) }}</div>
                                <a href="{{ route('checkout.service', ['service' => $service->slug]) }}" class="button -sm -green-1 text-white">Buy</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>No services found.</p>
                </div>
                @endforelse
            </div>

            <div class="row justify-center pt-60 lg:pt-40">
                <div class="col-auto">
                    {{ $services->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </section>
@endsection
