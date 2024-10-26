@extends('layouts.app')

@section('content')
    <div class="main__wrapper">
        <!-- Include the header component -->
        @include('layouts.partials.header')



        <section class="hero" id="hero">
            <div class="hero__wrapper">
                <!---main goal and contact button---->
                <div class="hero__name">
                    <div class="hero__name__big">
                        <p>From renovation to design</p>
                        <p>- everything in one place:</p>
                        <p> Offices, Houses, Villas.</p>
                    </div>

                    <div class="hero__name__small">
                        <p>Order a renovation and receive a design as a gift!</p>
                    </div>

                    <div class="hero__button">
                        <button>Contact For Consultation</button>
                    </div>
                </div>

                <!--------->
                <div class="hero__statistics">
                    <div class="hero__statistics__element">
                        <div class="hero__statistics__element-number">
                            300<span>+</span>
                        </div>
                        <div class="hero__statstics__element_desc">
                            <p>Amazing people</p>
                        </div>
                    </div>
                    <div class="hero__statistics__element">
                        <div class="hero__statistics__element-number">
                            900<span>+</span>
                        </div>
                        <div class="hero__statstics__element_desc">
                            <p>Amazing people</p>
                        </div>
                    </div>
                    <div class="hero__statistics__element">
                        <div class="hero__statistics__element-number">
                            20<span>+</span>
                        </div>
                        <div class="hero__statstics__element_desc">
                            <p>Amazing people</p>
                        </div>
                    </div>
                </div>

                <!------->
                <div class="hero__backgroud">
                    <img src="{{ Vite::asset('resources/images/hero_back.png') }}" alt="Build park example of future !">
                </div>


                <!----Build Park---->
                <div class="hero__logo">
                    <div class="hero__logo__name">
                        <p>Build Park</p>
                        <img src="{{ Vite::asset('resources/images/logo_white.svg') }}" alt="Build Park Company Small Logo">
                    </div>

                    <div class="hero__logo__desc">
                        <p>As a trusted general project that has been
                            operating for 25 years, our commitment is
                            always to prioritize our client satisfaction</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="clients"></section>




        <!--! SERVICESs----------->
        <section class="services" id="services">
            <div class="services__container">
                <!--SERVIVRS NAME--->
                <div class="services__name__desc">
                    <div class="services__main-name">
                        <p>Our Excellent
                            Services</p>
                    </div>
                    <div class="services__desc">
                        <p>Check out our best service you can possibly orders in building
                            your company and don't forget to ask via our email or our
                            customer service if you are interested in using our services</p>
                    </div>
                </div>
                <!---SERVICES--->
                <div class="services__wrapper">
                    <div class="services__element">
                        <div class="services__image">
                            <img src="{{ Vite::asset('resources/images/services/services1.jpg') }}" alt="Build">
                        </div>
                        <div class="services__name">
                            <p>Project Management</p>
                        </div>
                        <div class="servies__desc">
                            <p>Residential development is the
                                beginning that has shaped us to this
                                day. Our development includes
                                Houses & Apartments</p>
                        </div>
                    </div>
                    <div class="services__element">
                        <div class="services__image">
                            <img src="{{ Vite::asset('resources/images/services/services2.jpg') }}" alt="Build">
                        </div>
                        <div class="services__name">
                            <p>Project Management</p>
                        </div>
                        <div class="servies__desc">
                            <p>Residential development is the
                                beginning that has shaped us to this
                                day. Our development includes
                                Houses & Apartments</p>
                        </div>
                    </div>
                    <div class="services__element">
                        <div class="services__image">
                            <img src="{{ Vite::asset('resources/images/services/services2.jpg') }}" alt="Build">
                        </div>
                        <div class="services__name">
                            <p>Project Management</p>
                        </div>
                        <div class="servies__desc">
                            <p>Residential development is the
                                beginning that has shaped us to this
                                day. Our development includes
                                Houses & Apartments</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!----what makes us different--->
        <section class="different" id="different">
            <!----absolute left image-->
            <img class="different__absolute__image" src="{{ Vite::asset('resources\images\different\different_left.svg') }}"
                alt="Different left svg">

            <div class="different__container">
                <!---different name & DESC---->
                <div class="different__name__desc">
                    <!---different name---->
                    <div class="different__name">
                        <div class="different__line"></div>
                        <div class="different__name__text">
                            <p>What makes us Different ?</p>
                        </div>
                    </div>
                    <!---Different desc-->
                    <div class="different__desc">
                        Check out our best service you can possibly orders in building
                        your company and don't forget to ask via our email or our
                        customer service if you are interested in using our services
                    </div>
                </div>


                <!-----Different elements -->
                <div class="different__wrapper">
                    <!---different__element---->
                    <div class="different__element">
                        <div class="different__element__wrapper">
                            <div class="different__element__image">
                                <div class="different__image__container">
                                    <img class="different_placeholder"
                                        src="{{ Vite::asset('resources\images\different\different_placeholder.svg') }}"
                                        alt="Different placeholder image">
                                    <img class="different_placeholder-img"
                                        src="{{ Vite::asset('resources\images\different\different1.svg') }}"
                                        alt="We are experienced">
                                </div>
                            </div>
                            <div class="different__element__name">
                                <p>Competitive Price</p>
                            </div>
                            <div class="different__element__desc">
                                The prices we offer you are
                                very competitive without
                                reducing the quality of the
                                company's work in the
                                slightest
                            </div>
                        </div>
                    </div>
                    <!---different__element---->
                    <div class="different__element">
                        <div class="different__element__wrapper">
                            <div class="different__element__image">
                                <div class="different__image__container">
                                    <img class="different_placeholder"
                                        src="{{ Vite::asset('resources\images\different\different_placeholder.svg') }}"
                                        alt="Different placeholder image">
                                    <img class="different_placeholder-img"
                                        src="{{ Vite::asset('resources\images\different\different2.svg') }}"
                                        alt="We are experienced">
                                </div>
                            </div>
                            <div class="different__element__name">
                                <p>Competitive Price</p>
                            </div>
                            <div class="different__element__desc">
                                The prices we offer you are
                                very competitive without
                                reducing the quality of the
                                company's work in the
                                slightest
                            </div>
                        </div>
                    </div>
                    <!---different__element---->
                    <div class="different__element">
                        <div class="different__element__wrapper">
                            <div class="different__element__image">
                                <div class="different__image__container">
                                    <img class="different_placeholder"
                                        src="{{ Vite::asset('resources\images\different\different_placeholder.svg') }}"
                                        alt="Different placeholder image">
                                    <img class="different_placeholder-img"
                                        src="{{ Vite::asset('resources\images\different\different3.svg') }}"
                                        alt="We are experienced">
                                </div>
                            </div>
                            <div class="different__element__name">
                                <p>Competitive Price</p>
                            </div>
                            <div class="different__element__desc">
                                The prices we offer you are
                                very competitive without
                                reducing the quality of the
                                company's work in the
                                slightest
                            </div>
                        </div>
                    </div>
                    <!---different__element---->
                    <div class="different__element">
                        <div class="different__element__wrapper">
                            <div class="different__element__image">
                                <div class="different__image__container">
                                    <img class="different_placeholder"
                                        src="{{ Vite::asset('resources\images\different\different_placeholder.svg') }}"
                                        alt="Different placeholder image">
                                    <img class="different_placeholder-img"
                                        src="{{ Vite::asset('resources\images\different\different4.svg') }}"
                                        alt="We are experienced">
                                </div>
                            </div>
                            <div class="different__element__name">
                                <p>Competitive Price</p>
                            </div>
                            <div class="different__element__desc">
                                The prices we offer you are
                                very competitive without
                                reducing the quality of the
                                company's work in the
                                slightest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!----OUR team------>
        <section class="our__team" id="our__team">
            <div class="our__team__container">

            </div>
        </section>




        <!---OUR Story   634px---->
        <section class="story" id="story">
            <div class="story__container">
                <!----- STORY DESC--->
                <div class="story__desc">
                    <div class="story__desc__name">
                        Our Story &
                        Who we are
                    </div>
                    <div class="story__desc__text">
                        <p>Established in 1992, PT. Wahana Cipta operates as a General
                            Contracting company with a footprint that we have planted
                            throughout Indonesia. Initially, we focused on construction in
                            the field of residential housing development in Jakarta.
                            As the company grows, now we are present as a reliable...</p>
                    </div>



                    <div class="story__desc__button">
                        <button>See More</button>
                    </div>
                </div>
                <!-----STORY IMAGE------>
                <div class="story__image">
                    <img class=""
                    src="{{ Vite::asset('resources\images\story\back.jpg') }}" alt="Story Our main photo">
                </div>
            </div>
            <!----absolute left image-->
            <img class="story__absolute__image"
                src="{{ Vite::asset('resources\images\story\placeholder_bottom.svg') }}" alt="Story bottom svg">

        </section>




        <!-- Optional footer -->
        @include('layouts.partials.footer')
    </div>
@endsection
@push('styles')
    @vite(['resources/css/home.css']) <!-- Adding styles specific to the homepage -->
@endpush
