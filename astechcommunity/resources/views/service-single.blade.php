@extends('layouts.front')

@section('title', $service->title)

@section('content')
<section class="page-header -type-1">
  <div class="container">
    <div class="page-header__content">
      <h1 class="page-header__title">{{ $service->title }}</h1>
      <p class="page-header__text">{{ $service->short_description }}</p>
    </div>
  </div>
  </section>

  <section class="layout-pt-md layout-pb-lg">
    <div class="container">
      <div class="row y-gap-30">
        <div class="col-lg-8">
          <div class="bg-white rounded-8 p-20 shadow-4">
            <img class="rounded-8 w-1/1 mb-20" src="{{ $service->image ? asset('storage/'.$service->image) : asset('template/img/coursesCards/2.png') }}" alt="{{ $service->title }}">
            <div class="text-16 text-dark-1 leading-7">{!! nl2br(e($service->description)) !!}</div>
            @if($service->features)
              <div class="mt-20">
                <h4 class="text-18 fw-600 mb-10">Features</h4>
                <ul class="list-disc pl-20">
                  @foreach((array)$service->features as $feature)
                    <li>{{ $feature }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
          </div>
        </div>
        <div class="col-lg-4">
          <div class="bg-white rounded-8 p-20 shadow-4">
            <div class="text-24 fw-700">${{ number_format($service->price ?? 0, 2) }}</div>
            <div class="mt-15">
              <a href="{{ route('checkout.service', ['service' => $service->slug]) }}" class="button -md -green-1 text-white w-1/1">Buy Service</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection


