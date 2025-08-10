@extends('layouts.front')

@section('title', $freelancer->name . ' - ' . $freelancer->title)

@section('content')
<section class="page-header -type-1">
  <div class="container">
    <div class="page-header__content">
      <h1 class="page-header__title">{{ $freelancer->name }}</h1>
      <p class="page-header__text">{{ $freelancer->title }} · {{ $freelancer->location }}</p>
    </div>
  </div>
  </section>

  <section class="layout-pt-md layout-pb-lg">
    <div class="container">
      <div class="row y-gap-30">
        <div class="col-lg-8">
          <div class="bg-white rounded-8 p-20 shadow-4">
            <img class="rounded-8 w-1/1 mb-20" src="{{ $freelancer->profile_image ? asset('storage/'.$freelancer->profile_image) : asset('template/img/team/2.png') }}" alt="{{ $freelancer->name }}">
            <div class="text-16 text-dark-1 leading-7">{!! nl2br(e($freelancer->bio)) !!}</div>
            <div class="mt-20">
              <h4 class="text-18 fw-600 mb-10">Skills</h4>
              @foreach((array)$freelancer->skills as $skill)
                <span class="badge bg-light text-dark mr-5 mb-5">{{ $skill }}</span>
              @endforeach
            </div>
            @if($freelancer->portfolio_links)
              <div class="mt-20">
                <h4 class="text-18 fw-600 mb-10">Portfolio</h4>
                <ul class="list-disc pl-20">
                  @foreach((array)$freelancer->portfolio_links as $link)
                    <li><a class="text-purple-1" href="{{ $link }}" target="_blank" rel="noopener">{{ $link }}</a></li>
                  @endforeach
                </ul>
              </div>
            @endif
          </div>
        </div>
        <div class="col-lg-4">
          <div class="bg-white rounded-8 p-20 shadow-4">
            <div class="text-24 fw-700">${{ number_format($freelancer->hourly_rate, 2) }} / hour</div>
            <div class="text-14 mt-5">Rating: {{ number_format($freelancer->rating,1) }} ({{ $freelancer->reviews_count }} reviews)</div>
            <div class="text-14 mt-5">Projects completed: {{ $freelancer->projects_completed }}</div>
            <hr class="my-15">
            <form method="POST" action="{{ route('freelancers.hire') }}" class="space-y-3">
              @csrf
              <input type="hidden" name="freelancer_id" value="{{ $freelancer->id }}">
              <div>
                <label class="text-12">Your Name</label>
                <input class="form-control" name="client_name" required>
              </div>
              <div>
                <label class="text-12">Your Email</label>
                <input class="form-control" type="email" name="client_email" required>
              </div>
              <div>
                <label class="text-12">Project Brief</label>
                <textarea class="form-control" rows="4" name="project_brief" required></textarea>
              </div>
              <button class="button -md -purple-1 text-white w-1/1">Send Hire Request</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection


