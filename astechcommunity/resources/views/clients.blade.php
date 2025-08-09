@extends('layouts.front')

@section('title', 'Clients - AS-Tech Community')
@section('meta_description', 'Connect with businesses and organizations looking for tech talent and services.')

@section('content')
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">
                        <div>
                            <h1 class="page-header__title">Clients</h1>
                        </div>
                        
                        <div>
                            <p class="page-header__text">Partner with AS-Tech Community to find top tech talent</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row justify-center text-center">
                <div class="col-lg-8">
                    <div class="sectionTitle">
                        <h2 class="sectionTitle__title">Trusted by Leading Companies</h2>
                        <p class="sectionTitle__text">Our community members work with industry-leading organizations</p>
                    </div>
                </div>
            </div>

            <div class="row y-gap-30 justify-center pt-60">
                @for($i = 1; $i <= 6; $i++)
                <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                    <div class="d-flex justify-center items-center px-4">
                        <img class="w-1/1" src="{{ asset('template/img/clients/' . $i . '.svg') }}" alt="Client {{ $i }}">
                    </div>
                </div>
                @endfor
            </div>

            <div class="row y-gap-50 pt-120">
                <div class="col-lg-6">
                    <div class="featureCard -type-2">
                        <div class="featureCard__icon">
                            <img src="{{ asset('template/img/featureCards/1.svg') }}" alt="icon">
                        </div>
                        <div class="featureCard__content">
                            <h4 class="featureCard__title">Hire Top Talent</h4>
                            <p class="featureCard__text">
                                Access our network of skilled developers, designers, and tech professionals who are ready to contribute to your projects.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="featureCard -type-2">
                        <div class="featureCard__icon">
                            <img src="{{ asset('template/img/featureCards/2.svg') }}" alt="icon">
                        </div>
                        <div class="featureCard__content">
                            <h4 class="featureCard__title">Custom Training Programs</h4>
                            <p class="featureCard__text">
                                Partner with us to create custom training programs for your team. Upskill your employees with the latest technologies.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="featureCard -type-2">
                        <div class="featureCard__icon">
                            <img src="{{ asset('template/img/featureCards/3.svg') }}" alt="icon">
                        </div>
                        <div class="featureCard__content">
                            <h4 class="featureCard__title">Tech Consulting</h4>
                            <p class="featureCard__text">
                                Get expert guidance on technology strategy, digital transformation, and implementation of cutting-edge solutions.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="featureCard -type-2">
                        <div class="featureCard__icon">
                            <img src="{{ asset('template/img/featureCards/4.svg') }}" alt="icon">
                        </div>
                        <div class="featureCard__content">
                            <h4 class="featureCard__title">Recruitment Partnership</h4>
                            <p class="featureCard__text">
                                Establish a long-term partnership for ongoing recruitment needs and access to our exclusive talent pool.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-center pt-60">
                <div class="col-lg-8">
                    <div class="contactForm bg-white rounded-16 px-40 py-40">
                        <h3 class="contactForm__title text-center">Partner with Us</h3>
                        <p class="text-center text-dark-1 mt-10 mb-40">Let's discuss how we can help your organization find the right tech talent</p>
                        <form class="contact-form row y-gap-30">
                            <div class="col-lg-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Company Name*</label>
                                <input required type="text" name="company" placeholder="Your Company Name">
                            </div>
                            <div class="col-lg-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Contact Email*</label>
                                <input required type="email" name="email" placeholder="your@email.com">
                            </div>
                            <div class="col-lg-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Phone Number</label>
                                <input type="text" name="phone" placeholder="+1 (555) 000-0000">
                            </div>
                            <div class="col-lg-6">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Industry*</label>
                                <select required name="industry">
                                    <option>Select Industry</option>
                                    <option>Technology</option>
                                    <option>Healthcare</option>
                                    <option>Finance</option>
                                    <option>E-commerce</option>
                                    <option>Education</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Tell us about your needs*</label>
                                <textarea required name="message" placeholder="Describe your requirements..." rows="6"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" name="submit" id="submit" class="button -md -purple-1 text-white col-12">Submit Partnership Request</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
