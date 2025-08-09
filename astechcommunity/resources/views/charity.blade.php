@extends('layouts.front')

@section('title', 'Charity Initiative - AS-Tech Community')
@section('meta_description', 'Join our charitable efforts to provide technology education to underserved communities and make a positive impact.')

@section('content')
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">
                        <div>
                            <h1 class="page-header__title">Tech for Good Initiative</h1>
                        </div>
                        
                        <div>
                            <p class="page-header__text">Empowering underserved communities through technology education</p>
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
                        <h2 class="sectionTitle__title">Making Technology Accessible for All</h2>
                        <p class="sectionTitle__text">Our charity initiative focuses on providing free tech education to underserved communities, bridging the digital divide, and creating opportunities for everyone to succeed in the digital economy.</p>
                    </div>
                </div>
            </div>

            <div class="row y-gap-50 pt-60">
                <div class="col-lg-4">
                    <div class="featureCard -type-1 text-center">
                        <div class="featureCard__icon">
                            <img src="{{ asset('template/img/featureCards/1.svg') }}" alt="Free Education">
                        </div>
                        <div class="featureCard__content">
                            <h4 class="featureCard__title">Free Tech Education</h4>
                            <p class="featureCard__text">
                                Providing completely free access to our courses for students from low-income families and underserved communities.
                            </p>
                            <div class="featureCard__stats mt-20">
                                <div class="text-24 lh-1 fw-700 text-purple-1">2,500+</div>
                                <div class="text-15 lh-1 mt-5">Students Helped</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="featureCard -type-1 text-center">
                        <div class="featureCard__icon">
                            <img src="{{ asset('template/img/featureCards/2.svg') }}" alt="Community Centers">
                        </div>
                        <div class="featureCard__content">
                            <h4 class="featureCard__title">Community Learning Centers</h4>
                            <p class="featureCard__text">
                                Establishing physical learning centers in underserved areas with computers and internet access for hands-on learning.
                            </p>
                            <div class="featureCard__stats mt-20">
                                <div class="text-24 lh-1 fw-700 text-purple-1">15</div>
                                <div class="text-15 lh-1 mt-5">Centers Established</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="featureCard -type-1 text-center">
                        <div class="featureCard__icon">
                            <img src="{{ asset('template/img/featureCards/3.svg') }}" alt="Mentorship">
                        </div>
                        <div class="featureCard__content">
                            <h4 class="featureCard__title">Volunteer Mentorship</h4>
                            <p class="featureCard__text">
                                Connecting beneficiaries with volunteer mentors from our community to provide guidance and career support.
                            </p>
                            <div class="featureCard__stats mt-20">
                                <div class="text-24 lh-1 fw-700 text-purple-1">200+</div>
                                <div class="text-15 lh-1 mt-5">Volunteer Mentors</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-center pt-80">
                <div class="col-lg-10">
                    <div class="bg-purple-1 rounded-16 px-60 py-60">
                        <div class="row items-center">
                            <div class="col-lg-8">
                                <h3 class="text-30 lh-15 text-white">Success Story</h3>
                                <p class="text-white mt-15">
                                    "Thanks to the AS-Tech Community charity program, I learned web development from scratch and now work as a full-stack developer at a tech startup. This program changed my life completely!"
                                </p>
                                <div class="d-flex items-center mt-30">
                                    <img src="{{ asset('template/img/avatars/1.png') }}" alt="testimonial" class="size-60 rounded-full mr-20">
                                    <div>
                                        <div class="text-17 lh-1 fw-500 text-white">Maria Rodriguez</div>
                                        <div class="text-15 lh-1 text-white mt-5">Program Graduate, Now Full-Stack Developer</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 text-right">
                                <div class="text-60 lh-1 fw-700 text-white">98%</div>
                                <div class="text-white mt-10">Job Placement Rate</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-center pt-80">
                <div class="col-lg-10">
                    <div class="tabs -pills js-tabs">
                        <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 justify-center">
                            <div class="col-auto">
                                <button class="tabs__button js-tabs-button is-active" data-tab-target=".-tab-item-1">Donate</button>
                            </div>
                            <div class="col-auto">
                                <button class="tabs__button js-tabs-button" data-tab-target=".-tab-item-2">Volunteer</button>
                            </div>
                            <div class="col-auto">
                                <button class="tabs__button js-tabs-button" data-tab-target=".-tab-item-3">Apply for Help</button>
                            </div>
                        </div>

                        <div class="tabs__content pt-60">
                            <div class="tabs__pane -tab-item-1 is-active">
                                <div class="row justify-center">
                                    <div class="col-lg-8">
                                        <div class="text-center">
                                            <h3 class="text-24 lh-1 fw-500">Support Our Mission</h3>
                                            <p class="text-17 text-dark-1 mt-10 mb-40">Your donation helps us provide free technology education to those who need it most</p>
                                        </div>
                                        <div class="row y-gap-20">
                                            <div class="col-lg-4 col-md-6">
                                                <div class="bg-light-4 rounded-8 px-30 py-30 text-center">
                                                    <div class="text-24 lh-1 fw-700 text-purple-1">$25</div>
                                                    <div class="text-15 lh-1 mt-10">Sponsors 1 student for 1 month</div>
                                                    <button class="button -sm -purple-1 text-white mt-20">Donate $25</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="bg-light-4 rounded-8 px-30 py-30 text-center">
                                                    <div class="text-24 lh-1 fw-700 text-purple-1">$100</div>
                                                    <div class="text-15 lh-1 mt-10">Funds complete course access</div>
                                                    <button class="button -sm -purple-1 text-white mt-20">Donate $100</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="bg-light-4 rounded-8 px-30 py-30 text-center">
                                                    <div class="text-24 lh-1 fw-700 text-purple-1">$500</div>
                                                    <div class="text-15 lh-1 mt-10">Equips a learning center</div>
                                                    <button class="button -sm -purple-1 text-white mt-20">Donate $500</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tabs__pane -tab-item-2">
                                <div class="row justify-center">
                                    <div class="col-lg-8">
                                        <div class="text-center mb-40">
                                            <h3 class="text-24 lh-1 fw-500">Become a Volunteer</h3>
                                            <p class="text-17 text-dark-1 mt-10">Share your expertise and make a difference in someone's life</p>
                                        </div>
                                        <form class="contact-form row y-gap-30">
                                            <div class="col-lg-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Full Name*</label>
                                                <input required type="text" name="name" placeholder="Your Full Name">
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email*</label>
                                                <input required type="email" name="email" placeholder="your@email.com">
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Expertise Area*</label>
                                                <select required name="expertise">
                                                    <option>Select Your Expertise</option>
                                                    <option>Web Development</option>
                                                    <option>Mobile Development</option>
                                                    <option>Data Science</option>
                                                    <option>UI/UX Design</option>
                                                    <option>DevOps</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Available Hours/Week*</label>
                                                <select required name="hours">
                                                    <option>Select Hours</option>
                                                    <option>1-2 hours</option>
                                                    <option>3-5 hours</option>
                                                    <option>6-10 hours</option>
                                                    <option>10+ hours</option>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Why do you want to volunteer?*</label>
                                                <textarea required name="message" placeholder="Tell us your motivation..." rows="4"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" name="submit" id="submit" class="button -md -purple-1 text-white col-12">Apply to Volunteer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tabs__pane -tab-item-3">
                                <div class="row justify-center">
                                    <div class="col-lg-8">
                                        <div class="text-center mb-40">
                                            <h3 class="text-24 lh-1 fw-500">Apply for Free Education</h3>
                                            <p class="text-17 text-dark-1 mt-10">If you're from an underserved community, apply for our free education program</p>
                                        </div>
                                        <form class="contact-form row y-gap-30">
                                            <div class="col-lg-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Full Name*</label>
                                                <input required type="text" name="name" placeholder="Your Full Name">
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email*</label>
                                                <input required type="email" name="email" placeholder="your@email.com">
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Age*</label>
                                                <input required type="number" name="age" placeholder="Your Age" min="13" max="99">
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Location*</label>
                                                <input required type="text" name="location" placeholder="City, Country">
                                            </div>
                                            <div class="col-12">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Why do you need this program?*</label>
                                                <textarea required name="need" placeholder="Explain your situation and how this program would help you..." rows="4"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">What do you want to learn?*</label>
                                                <textarea required name="goals" placeholder="Describe your learning goals and career aspirations..." rows="4"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" name="submit" id="submit" class="button -md -purple-1 text-white col-12">Submit Application</button>
                                            </div>
                                        </form>
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
