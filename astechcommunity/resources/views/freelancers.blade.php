@extends('layouts.front')

@section('title', 'Freelancers - AS-Tech Community')
@section('meta_description', 'Connect with talented freelancers and find opportunities in the AS-Tech Community network.')

@section('content')
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">
                        <div>
                            <h1 class="page-header__title">Freelancers</h1>
                        </div>
                        
                        <div>
                            <p class="page-header__text">Connect with skilled tech freelancers and find exciting opportunities</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="tabs -pills js-tabs">
                <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20">
                    <div class="col-auto">
                        <button class="tabs__button js-tabs-button is-active" data-tab-target=".-tab-item-1">Find Freelancers</button>
                    </div>
                    <div class="col-auto">
                        <button class="tabs__button js-tabs-button" data-tab-target=".-tab-item-2">Post a Job</button>
                    </div>
                    <div class="col-auto">
                        <button class="tabs__button js-tabs-button" data-tab-target=".-tab-item-3">Freelancer Resources</button>
                    </div>
                </div>

                <div class="tabs__content pt-60">
                    <div class="tabs__pane -tab-item-1 is-active">
                        <form method="GET" class="row y-gap-20 mb-20">
                            <div class="col-lg-6">
                                <input type="text" name="search" class="form-control" value="{{ request('search') }}" placeholder="Search name, title, skills">
                            </div>
                            <div class="col-lg-3">
                                <select name="location" class="form-control">
                                    <option value="">All Locations</option>
                                    @foreach($locations as $loc)
                                        <option value="{{ $loc }}" @selected(request('location')==$loc)>{{ $loc }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <button class="button -md -purple-1 text-white w-1/1">Filter</button>
                            </div>
                        </form>

                        <div class="row y-gap-30">
                            @forelse($freelancers as $freelancer)
                            <div class="col-lg-6">
                                <div class="eventCard -type-1">
                                    <div class="eventCard__img">
                                        <img src="{{ $freelancer->profile_image ? asset('storage/'.$freelancer->profile_image) : asset('template/img/team/1.png') }}" alt="{{ $freelancer->name }}">
                                    </div>
                                    <div class="eventCard__bg bg-white">
                                        <div class="eventCard__content y-gap-10">
                                            <div class="eventCard__inner">
                                                <h4 class="eventCard__title">{{ $freelancer->name }} - {{ $freelancer->title }}</h4>
                                                <div class="eventCard__text">{{ Str::limit($freelancer->bio, 160) }}</div>
                                                <div class="mt-10">
                                                    @foreach(array_slice((array)$freelancer->skills,0,5) as $skill)
                                                        <span class="badge bg-light text-dark mr-5">{{ $skill }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="eventCard__info">
                                                <div class="eventCard__date"><i class="icon-star mr-8"></i>{{ number_format($freelancer->rating,1) }} Rating</div>
                                                <div class="eventCard__time"><i class="icon-dollar mr-8"></i>${{ number_format($freelancer->hourly_rate,2) }}/hour</div>
                                                <div class="eventCard__location"><i class="icon-location mr-8"></i>{{ $freelancer->location }}</div>
                                            </div>
                                            <div class="eventCard__button d-flex x-gap-10">
                                                <a href="{{ route('freelancers.show', $freelancer->id) }}" class="button -sm -outline-purple-1 text-purple-1">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <div class="col-12 text-center"><p>No freelancers found.</p></div>
                            @endforelse
                        </div>

                        <div class="row justify-center pt-40">
                            <div class="col-auto">
                                {{ $freelancers->appends(request()->query())->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>

                    <div class="tabs__pane -tab-item-2">
                        <div class="row justify-center">
                            <div class="col-lg-8">
                                <div class="contactForm">
                                    <h3 class="contactForm__title">Post a Freelance Job</h3>
                                    <form class="contact-form row y-gap-30">
                                        <div class="col-lg-6">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Job Title*</label>
                                            <input required type="text" name="title" placeholder="e.g. Full Stack Developer">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Budget*</label>
                                            <input required type="text" name="budget" placeholder="e.g. $1000 - $5000">
                                        </div>
                                        <div class="col-12">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Job Description*</label>
                                            <textarea required name="message" placeholder="Describe your project requirements..." rows="8"></textarea>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Skills Required*</label>
                                            <input required type="text" name="skills" placeholder="e.g. React, Node.js, MongoDB">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Project Duration*</label>
                                            <select required name="duration">
                                                <option>Select Duration</option>
                                                <option>1 week</option>
                                                <option>2-4 weeks</option>
                                                <option>1-3 months</option>
                                                <option>3-6 months</option>
                                                <option>6+ months</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" name="submit" id="submit" class="button -md -purple-1 text-white">Post Job</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tabs__pane -tab-item-3">
                        <div class="row y-gap-30">
                            <div class="col-lg-4 col-md-6">
                                <div class="featureCard -type-1">
                                    <div class="featureCard__icon">
                                        <img src="{{ asset('template/img/featureCards/1.svg') }}" alt="icon">
                                    </div>
                                    <div class="featureCard__content">
                                        <h4 class="featureCard__title">Freelancer Training</h4>
                                        <p class="featureCard__text">
                                            Learn essential freelancing skills including client management, pricing, and business development.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="featureCard -type-1">
                                    <div class="featureCard__icon">
                                        <img src="{{ asset('template/img/featureCards/2.svg') }}" alt="icon">
                                    </div>
                                    <div class="featureCard__content">
                                        <h4 class="featureCard__title">Portfolio Building</h4>
                                        <p class="featureCard__text">
                                            Create a professional portfolio that showcases your skills and attracts high-quality clients.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="featureCard -type-1">
                                    <div class="featureCard__icon">
                                        <img src="{{ asset('template/img/featureCards/3.svg') }}" alt="icon">
                                    </div>
                                    <div class="featureCard__content">
                                        <h4 class="featureCard__title">Freelancer Community</h4>
                                        <p class="featureCard__text">
                                            Connect with other freelancers, share experiences, and collaborate on projects.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
