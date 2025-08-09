@extends('layouts.front')

@section('title', 'FAQ - AS-Tech Community')
@section('meta_description', 'Find answers to frequently asked questions about our courses, membership, and services.')

@section('content')
    <section class="page-header -type-1">
        <div class="container">
            <div class="page-header__content">
                <div class="row">
                    <div class="col-auto">
                        <div>
                            <h1 class="page-header__title">Frequently Asked Questions</h1>
                        </div>
                        
                        <div>
                            <p class="page-header__text">Get answers to the most common questions about AS-Tech Community</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
        <div class="container">
            <div class="row justify-center">
                <div class="col-lg-8">
                    <div class="accordion js-accordion">
                        <div class="accordion__item">
                            <div class="accordion__button">
                                <span>What courses do you offer?</span>
                                <div class="accordion__icon">
                                    <div class="icon-plus"></div>
                                </div>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__body">
                                    We offer a wide range of technology courses including Web Development, Mobile Development, Data Science, Machine Learning, Cloud Computing, Cybersecurity, and more. Our courses are designed for all skill levels from beginner to advanced.
                                </div>
                            </div>
                        </div>

                        <div class="accordion__item">
                            <div class="accordion__button">
                                <span>How much do the courses cost?</span>
                                <div class="accordion__icon">
                                    <div class="icon-plus"></div>
                                </div>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__body">
                                    We have flexible pricing options. Basic membership is free with access to select courses. Pro membership is $29/month with access to all premium courses. Enterprise membership is $99/month with additional mentorship and career services.
                                </div>
                            </div>
                        </div>

                        <div class="accordion__item">
                            <div class="accordion__button">
                                <span>Do you offer certificates upon completion?</span>
                                <div class="accordion__icon">
                                    <div class="icon-plus"></div>
                                </div>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__body">
                                    Yes! Pro and Enterprise members receive industry-recognized certificates upon successful completion of courses. These certificates can be shared on LinkedIn and included in your resume.
                                </div>
                            </div>
                        </div>

                        <div class="accordion__item">
                            <div class="accordion__button">
                                <span>Can I cancel my membership anytime?</span>
                                <div class="accordion__icon">
                                    <div class="icon-plus"></div>
                                </div>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__body">
                                    Absolutely! You can cancel your membership at any time. There are no long-term contracts or cancellation fees. You'll continue to have access until the end of your current billing period.
                                </div>
                            </div>
                        </div>

                        <div class="accordion__item">
                            <div class="accordion__button">
                                <span>What is your refund policy?</span>
                                <div class="accordion__icon">
                                    <div class="icon-plus"></div>
                                </div>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__body">
                                    We offer a 30-day money-back guarantee for all paid memberships. If you're not satisfied with our courses or services within the first 30 days, we'll provide a full refund.
                                </div>
                            </div>
                        </div>

                        <div class="accordion__item">
                            <div class="accordion__button">
                                <span>Do you provide job placement assistance?</span>
                                <div class="accordion__icon">
                                    <div class="icon-plus"></div>
                                </div>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__body">
                                    Yes! Enterprise members get access to our comprehensive career services including resume reviews, interview preparation, job search assistance, and connections to our network of partner companies.
                                </div>
                            </div>
                        </div>

                        <div class="accordion__item">
                            <div class="accordion__button">
                                <span>How do I contact support?</span>
                                <div class="accordion__icon">
                                    <div class="icon-plus"></div>
                                </div>
                            </div>
                            <div class="accordion__content">
                                <div class="accordion__body">
                                    You can contact our support team through the contact form on our website, email us at support@astechcommunity.com, or use the live chat feature available to Pro and Enterprise members.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
