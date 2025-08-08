
@extends('layouts.front')

@section('content')
    <section class="layout-pt-md layout-pb-lg">
        <div data-anim-wrap class="container">
            <div class="row y-gap-50 justify-between">
                <div class="col-lg-4">
                    <h3 class="text-24 fw-500">Keep In Touch With Us.</h3>
                    <p class="mt-25">Neque convallis a cras semper auctor. Libero id faucibus nisl tincidunt
                        egetnvallis.</p>

                    <div class="y-gap-30 pt-60 lg:pt-40">

                        <div class="d-flex items-center">
                            <div class="d-flex justify-center items-center size-60 rounded-full bg-light-7">
                                <img src="{{ asset('template/img/contact-1/1.svg') }}" alt="icon">
                            </div>
                            <div class="ml-20">328 Queensberry Street, North<br> Melbourne VIC 3051, Australia.</div>
                        </div>

                        <div class="d-flex items-center">
                            <div class="d-flex justify-center items-center size-60 rounded-full bg-light-7">
                                <img src="{{ asset('template/img/contact-1/2.svg') }}" alt="icon">
                            </div>
                            <div class="ml-20">+(1) 123 456 7890</div>
                        </div>

                        <div class="d-flex items-center">
                            <div class="d-flex justify-center items-center size-60 rounded-full bg-light-7">
                                <img src="{{ asset('template/img/contact-1/3.svg') }}" alt="icon">
                            </div>
                            <div class="ml-20">hi@educrat.com</div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-7">
                    <h3 class="text-24 fw-500">Send a Message.</h3>
                    <p class="mt-25">Neque convallis a cras semper auctor. Libero id faucibus nisl<br> tincidunt
                        egetnvallis.</p>

                    <form class="contact-form row y-gap-30 pt-60 lg:pt-40" action="#">
                        <div class="col-md-6">
                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Name</label>
                            <input type="text" name="title" placeholder="Name...">
                        </div>
                        <div class="col-md-6">
                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email Address</label>
                            <input type="text" name="title" placeholder="Email...">
                        </div>
                        <div class="col-12">
                            <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Message...</label>
                            <textarea name="comment" placeholder="Message" rows="8"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" id="submit"
                                class="button -md -purple-1 text-white">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


