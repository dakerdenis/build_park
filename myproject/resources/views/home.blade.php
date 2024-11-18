@extends('layouts.app')

@section('content')
    <div class="main__wrapper">
        <!-- Include the header component -->
        @include('layouts.partials.header')



        <section class="hero" id="hero">
            <div class="hero__wrapper">
                <!-- Main goal and contact button -->
                <div class="hero__name">
                    <div class="hero__name__big">
                        <p>{{ __('hero_title') }}</p>
                        <p>{{ __('hero_subtitle') }}</p>
                        <p>{{ __('hero_subtitle2') }}</p>
                    </div>
        
                    <div class="hero__name__small">
                        <p>{{ __('hero_offer') }}</p>
                    </div>
        
                    <div class="hero__button">
                        <button>{{ __('Contact For Consultation') }}</button>
                    </div>
                </div>
        
                <!-- Statistics Section -->
                <div class="hero__statistics">
                    <div class="hero__statistics__element">
                        <div class="hero__statistics__element-number">
                            300<span>+</span>
                        </div>
                        <div class="hero__statstics__element_desc">
                            <p>{{ __('statistics_amazing_people') }}</p>
                        </div>
                    </div>
                    <div class="hero__statistics__element">
                        <div class="hero__statistics__element-number">
                            900<span>+</span>
                        </div>
                        <div class="hero__statstics__element_desc">
                            <p>{{ __('statistics_amazing_people') }}</p>
                        </div>
                    </div>
                    <div class="hero__statistics__element">
                        <div class="hero__statistics__element-number">
                            20<span>+</span>
                        </div>
                        <div class="hero__statstics__element_desc">
                            <p>{{ __('statistics_amazing_people') }}</p>
                        </div>
                    </div>
                </div>
        
                <!-- Background -->
                <div class="hero__backgroud">
                    <img src="{{ asset('images/hero_back.png') }}" alt="Build park example of future!">
                </div>
        
                <!-- Build Park Section -->
                <div class="hero__logo">
                    <div class="hero__logo__name">
                        <p>Build Park</p>
                        <img src="{{ asset('images/logo_white.svg') }}" alt="Build Park Company Small Logo">
                    </div>
        
                    <div class="hero__logo__desc">
                        <p>{{ __('As a trusted general project that has been operating for 25 years, our commitment is always to prioritize our client satisfaction') }}</p>
                    </div>
                </div>
            </div>
        </section>
        
        

        <!----Our clients---->
        <section class="clients">
            <div class="swiper clientsSwiper">
                <div class="swiper-wrapper">
                    <!-- Dynamically display client images -->
                    @foreach ($clients as $client)
                        <div class="swiper-slide">
                            <div class="swiper__slider__customer">
                                <img src="{{ asset('uploads/client_images/' . $client->image_name) }}" alt="Client Logo">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        




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
                            <img src="{{ asset('images/services/services1.jpg') }}" alt="Build">
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
                            <img src="{{ asset('images/services/services2.jpg') }}" alt="Build">
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
                            <img src="{{ asset('images/services/services2.jpg') }}" alt="Build">
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

            <!--- HOw we work---->
            <div class="how__work__container">
                <div class="how__work__name">
                    How we work
                </div>
                <div class="how__work__desc">
                    Check out our best service you can possibly orders in building your company and don't forget to ask via
                    our email or our customer service if you are interested in using our services
                </div>

                <div class="how__work__wrapper">
                    <div class="how__work__element left">

                        <div class="how__work__blur">

                        </div>

                        <div class="how__work__element-image">
                            <img class="" src="{{ asset('images\how_work\1.png') }}"
                                alt="Story Our main photo">
                        </div>

                        <div class="how__work__element__desc">
                            <div class="how__work__element__desc__name">
                                Name of Stage of Work
                            </div>
                            <div class="how__work__element__desc__text ">
                                <p>Our experience of 25 years of
                                    building and making
                                    achievements in the world
                                    of development</p>
                            </div>
                        </div>
                    </div>
                    <div class="how__work__element center">
                        <div class="how__work__blur">

                        </div>
                        <div class="how__work__element-image">
                            <img class="" src="{{ asset('images\how_work\2.png') }}"
                                alt="Story Our main photo">
                        </div>

                        <div class="how__work__element__desc">
                            <div class="how__work__element__desc__name">
                                Name of Stage of Work
                            </div>
                            <div class="how__work__element__desc__text ">
                                <p>Our experience of 25 years of
                                    building and making
                                    achievements in the world
                                    of development</p>
                            </div>
                        </div>
                    </div>
                    <div class="how__work__element right">
                        <div class="how__work__blur">

                        </div>

                        <div class="how__work__element-image">
                            <img class="" src="{{ asset('images\how_work\3.png') }}"
                                alt="Story Our main photo">
                        </div>

                        <div class="how__work__element__desc">
                            <div class="how__work__element__desc__name">
                                Name of Stage of Work
                            </div>
                            <div class="how__work__element__desc__text">
                                <p>Our experience of 25 years of
                                    building and making
                                    achievements in the world
                                    of development</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>



        <!----what makes us different--->
        <section class="different" id="different">
            <!----absolute left image-->
            <img class="different__absolute__image"
                src="{{ asset('images/different/different_left.svg') }}"
                data-dark-src="{{asset('images/different/different_left.svg') }}"
                data-light-src="{{ asset('images/different/different_left_white.svg') }}"
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
                                        src="{{ asset('images/different/different_placeholder.svg') }}"
                                        data-dark-src="{{ asset('images/different/different_placeholder.svg') }}"
                                        data-light-src="{{asset('images/different/different_placeholder_white.svg') }}"
                                        alt="Different placeholder image">

                                    <img class="different_placeholder-img"
                                        src="{{asset('images/different/different1.svg') }}"
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
                                        src="{{ asset('images/different/different_placeholder.svg') }}"
                                        data-dark-src="{{ asset('images/different/different_placeholder.svg') }}"
                                        data-light-src="{{ asset('images/different/different_placeholder_white.svg') }}"
                                        alt="Different placeholder image">

                                        <img class="different_placeholder-img"
                                        src="{{asset('images/different/different2.svg') }}"
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
                                        src="{{ asset('images/different/different_placeholder.svg') }}"
                                        data-dark-src="{{ asset('images/different/different_placeholder.svg') }}"
                                        data-light-src="{{ asset('images/different/different_placeholder_white.svg') }}"
                                        alt="Different placeholder image">

                                        <img class="different_placeholder-img"
                                        src="{{asset('images/different/different3.svg') }}"
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
                                        src="{{ asset('images/different/different_placeholder.svg') }}"
                                        data-dark-src="{{ asset('images/different/different_placeholder.svg') }}"
                                        data-light-src="{{ asset('images/different/different_placeholder_white.svg') }}"
                                        alt="Different placeholder image">

                                        <img class="different_placeholder-img"
                                        src="{{asset('images/different/different4.svg') }}"
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
                        <button id="openStoryPopup">See More</button>
                    </div>
                </div>
                <!-----STORY IMAGE------>
                <div class="story__image">
                    <img class="" src="{{ asset('images\story\back.jpg') }}"
                        alt="Story Our main photo">
                </div>
            </div>
            <!----absolute left image-->
            <img class="story__absolute__image" src="{{ asset('images/story/placeholder_bottom.svg') }}"
                data-dark-src="{{ asset('images/story/placeholder_bottom.svg') }}"
                data-light-src="{{ asset('images/story/placeholder_bottom_white.svg') }}"
                alt="Story bottom svg">


        </section>

        <!-- Story Popup -->
        <div class="story-popup" id="storyPopup">
            <div class="story-popup__content">
                <div class="story-popup__image">
                    <img class="" src="{{ asset('images\story\popup.jpg') }}"
                        alt="Story Our main photo">
                </div>
                <button class="story-popup__close-btn" id="closeStoryPopupBtn">&times;</button>
                <h2>Our Story & Who We Are</h2>

                <div class="popup__content__text">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis accumsan justo in luctus.
                        Fusce ut rutrum ligula, quis dictum augue. Vestibulum pulvinar nunc ut iaculis imperdiet. Donec at
                        feugiat lacus. Aliquam erat volutpat. Aenean ut massa vitae sem facilisis commodo. Vestibulum a
                        accumsan quam. </p>
                    <p>Vivamus placerat cursus lacus, et egestas nunc elementum et. Praesent id sollicitudin odio. Interdum
                        et malesuada fames ac ante ipsum primis in faucibus. Duis imperdiet erat id orci sollicitudin, id
                        convallis turpis dignissim. Donec efficitur consequat augue nec laoreet. </p>
                    <p>Sed vulputate erat eget justo commodo congue. Nunc nisl arcu, sodales et dolor convallis, eleifend
                        pellentesque nibh. </p>
                </div>
            </div>
        </div>





        <!---Our projects --->
        <section class="projects" id="projects">
            <div class="projects__container">
                <!---Projects slider----->
                <div class="projects__slider">
                    <!---slider navigation--->
                    <div class="projects__slider__navigation">
                        <div class="projects__slider__name">
                            <p>Projects</p>
                        </div>
                        <div class="projects__slider__navigation__elements">
                            <button>All</button>
                            <button>Commercial</button>
                            <button>Residential</button>
                            <button>Commercial</button>
                            <button>Residential</button>
                            <button>Other</button>
                        </div>

                        <!-------->
                        <div class="projects__all-projects">
                            <a href="{{ route('projects') }}">
                                View all projects
                            </a>
                        </div>

                    </div>


                    <!----slider content--->
                    <div class="project__slider__content">

                        <div class="project__slider__wrapper">
                            <!-- Swiper -->
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="swiper__projects__container">
                                            <div class="swiper__projects__element">
                                                <!---swiper element iamge--->
                                                <div class="swiper__projects__element__image">
                                                    <img class=""
                                                        src="{{ asset('images\projects\placeholder.jpeg') }}">

                                                </div>

                                                <!-----swiper element desc-->
                                                <div class="swiper__projects__element__desc">
                                                    <div class="swiper__projects__element__name">
                                                        Wildstone Infra Hotel
                                                    </div>
                                                    <div class="swiper__projects__element__adress">
                                                        Address
                                                    </div>
                                                    <div class="swiper__projects__element__more">
                                                        <button>See more...</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper__projects__element">
                                                <!---swiper element iamge--->
                                                <div class="swiper__projects__element__image">
                                                    <img class=""
                                                        src="{{ asset('images\projects\placeholder.jpeg') }}">

                                                </div>

                                                <!-----swiper element desc-->
                                                <div class="swiper__projects__element__desc">
                                                    <div class="swiper__projects__element__name">
                                                        Wildstone Infra Hotel
                                                    </div>
                                                    <div class="swiper__projects__element__adress">
                                                        Address
                                                    </div>
                                                    <div class="swiper__projects__element__more">
                                                        <button>See more...</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper__projects__element">
                                                <!---swiper element iamge--->
                                                <div class="swiper__projects__element__image">
                                                    <img class=""
                                                        src="{{ asset('images\projects\placeholder.jpeg') }}">

                                                </div>

                                                <!-----swiper element desc-->
                                                <div class="swiper__projects__element__desc">
                                                    <div class="swiper__projects__element__name">
                                                        Wildstone Infra Hotel
                                                    </div>
                                                    <div class="swiper__projects__element__adress">
                                                        Address
                                                    </div>
                                                    <div class="swiper__projects__element__more">
                                                        <button>See more...</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper__projects__element">
                                                <!---swiper element iamge--->
                                                <div class="swiper__projects__element__image">
                                                    <img class=""
                                                        src="{{ asset('images\projects\placeholder.jpeg') }}">

                                                </div>

                                                <!-----swiper element desc-->
                                                <div class="swiper__projects__element__desc">
                                                    <div class="swiper__projects__element__name">
                                                        Wildstone Infra Hotel
                                                    </div>
                                                    <div class="swiper__projects__element__adress">
                                                        Address
                                                    </div>
                                                    <div class="swiper__projects__element__more">
                                                        <button>See more...</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">Slide 2</div>
                                </div>
                                <!-- Navigation buttons -->
                                <div class="swiper-button-next">
                                    <img class="swiper-button-img"
                                        src="{{ asset('images\projects\arrow.svg') }}">
                                </div>
                                <div class="swiper-button-prev">
                                    <img class="swiper-button-img"
                                        src="{{ asset('images\projects\arrow.svg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mobile__all_projects">
                    <a href="{{ route('projects') }}">
                        View all projects
                    </a>
                </div>
                <!----projects map--->
                <div class="projects__map">
                    <div class="projects__map__container">
                        <img class="" src="{{ asset('images\projects\map.png') }}"
                            alt="Story Our main photo">
                    </div>
                </div>
            </div>

            <div class="projects__svg projects__svg1">
                <img class="" src="{{asset('images\projects\vector1.svg') }}" alt="">
            </div>
            <div class="projects__svg projects__svg2">
                <img class="" src="{{ asset('images\projects\vector2.svg') }}" alt="">
            </div>
        </section>

        <!---Our best offer--->
        <section class="offers" id="offers">
            <div class="offers__svg">
                <img class="" src="{{ asset('images\offers\svg1.svg') }}" alt="">
            </div>

            <div class="offers__container">
                <!-----offers background1--->
                <div class="offers__background offers__background1">
                    <img class="" src="{{ asset('images\offers\background1.jpeg') }}"
                        alt="Offers background">
                </div>


                <!-----offers background2--->
                <div class="offers__background offers__background2">
                    <img class="" src="{{ asset('images\offers\background2.jpeg') }}"
                        alt="Offers background">
                </div>


                <!---offers wrapper----->
                <div class="offers__wrapper">
                    <!---offers element----->
                    <div class="offers__element">
                        <!--offers element background-->
                        <div class="offers__element__image">
                            <img class="" src="{{ asset('images\offers\background1.jpeg') }}"
                                alt="Offers background">
                        </div>


                        <!----offers desc text------>
                        <div class="offers__element__desc">
                            <div class="offers__element__desc_text">
                                Epoxy paint and epoxy floor contractor. Have you heard the two terms? And what does that
                                have to do with the construction of existing buildings? Epoxy itself is included in the type
                                of resin...
                            </div>
                        </div>


                        <!----offers button---->
                        <div class="offers__element__button">
                            <button>Contact for Order</button>
                        </div>


                        <!-----Offers logo------->
                        <div class="offers__red-logo">
                            <!---Offers red image---->
                            <img class="offers__red-image"
                                src="{{ asset('images\offers\red_icon.svg') }}" alt="Offers background">

                            <!----Offers red image text------>
                            <p>Build with us and
                                get free design!</p>
                        </div>

                    </div>

                    <!---offers element----->
                    <div class="offers__element">
                        <!--offers element background-->
                        <div class="offers__element__image">
                            <img class="" src="{{ asset('images\offers\background1.jpeg') }}"
                                alt="Offers background">
                        </div>


                        <!----offers desc text------>
                        <div class="offers__element__desc">
                            <div class="offers__element__desc_text">
                                Epoxy paint and epoxy floor contractor. Have you heard the two terms? And what does that
                                have to do with the construction of existing buildings? Epoxy itself is included in the type
                                of resin...
                            </div>
                        </div>


                        <!----offers button---->
                        <div class="offers__element__button">
                            <button>Contact for Order</button>
                        </div>


                        <!-----Offers logo------->
                        <div class="offers__red-logo">
                            <!---Offers red image---->
                            <img class="offers__red-image"
                                src="{{ asset('images\offers\red_icon.svg') }}" alt="Offers background">

                            <!----Offers red image text------>
                            <p>Build with us and
                                get free design!</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!---COntact with us --->
        <section class="contact" id="contact">
            <div class="contact__container">
                <!-----contact form------>
                <div class="contact__form">

                    <form action="" method="POST">
                        @csrf
                        <div class="contact__form__name">
                            What can we do for you?
                        </div>
                        <div class="contact__form__desc">
                            We are ready to work on a project of any complexity, whether it’s commercial or residential.
                        </div>
                        <div class="contact__form__wrapper">
                            <div class="contact__form__inputs">
                                <input type="text" id="name" name="name" placeholder="Your Name">
                                <input type="email" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="contact__form__inputs">
                                <div class="custom-select" id="customSelect">
                                    <div class="selected-option">How can we turn-back?</div>
                                    <span class="select-arrow">&#9662;</span> <!-- Arrow Icon -->
                                    <ul class="dropdown-options">
                                        <li data-value="1">Option 1</li>
                                        <li data-value="2">Option 2</li>
                                        <li data-value="3">Option 3</li>
                                    </ul>
                                </div>


                                <input type="number" name="phone" id="phone" placeholder="Phone">
                            </div>

                            <div class="contact__form__message">
                                <textarea placeholder="Your message" name="message" id="message"></textarea>
                            </div>
                            <div class="contact__form__indicates">
                                <span>*</span> indicates a required field
                            </div>

                            <div class="contact__form__submit">
                                <button type="submit">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
                <!-----contact form svg----->
                <div class="form__icon">
                    <img class="" src="{{ asset('images\contact\form_icon.svg') }}"
                        alt="Contact icon logo">
                </div>

                <!----contact information & navigation---->
                <div class="contact__information">
                    <div class="contact__information__wrapper">
                        <!----contact information------>
                        <div class="contact__information__data">
                            <!----->
                            <div class="contact__information_container">
                                <div class="contact__information__desc">
                                    Adress:
                                </div>
                                <div class="contact__information__value">
                                    <p>91 Safarli St. Baku, Azerbaijan AZ1111</p>
                                </div>
                            </div>
                            <!----->
                            <div class="contact__information_container">
                                <div class="contact__information__desc">
                                    Phone:
                                </div>
                                <div class="contact__information__value">
                                    <p>+994 50 444 44 44</p>
                                </div>
                            </div>
                            <!----->
                            <div class="contact__information_container">
                                <div class="contact__information__desc">
                                    Email:
                                </div>
                                <div class="contact__information__value">
                                    <p>hello@buildpark.az</p>
                                </div>
                            </div>

                            <!----->
                            <div class="contact__information_container-social">
                                <div class="contact__information__desc">
                                    Social:
                                </div>
                                <div class="contact__information__social">
                                    <a href="#">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>

                                    <a href="#">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>

                                    <a href="#">
                                        <i class="fa fa-telegram" aria-hidden="true"></i>

                                    </a>

                                    <a href="#">
                                        <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                    </a>

                                    <a href="#">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-----contact  navigation------>
                        <div class="contact__navigation">
                            <div class="contact_navigation-icon">
                                <img class="" src="{{ asset('images\contact\contact_icon.png') }}"
                                    alt="Contact icon logo">
                                <div class="contact_navigation-icon-line">

                                </div>
                            </div>

                            <div class="contact__navigation-values">
                                <button>Home</button>
                                <button>Services</button>
                                <button>Our Team</button>
                                <button>About US</button>
                                <button>Portfolio</button>
                                <button>Offers</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Optional footer -->
        @include('layouts.partials.footer')
    </div>
@endsection


@push('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize first Swiper -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        new Swiper(".mySwiper", {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            loop: true,
        });

        // Initialize second Swiper for clients section with breakpoints
        new Swiper(".clientsSwiper", {
            slidesPerView: 3,
            loop: true,
            autoplay: {
                delay: 1900, // Adjust delay as needed for auto sliding
                disableOnInteraction: false,
            },
            breakpoints: {
                // When window width is <= 768px (tablet/mobile)
                768: {
                    slidesPerView: 4
                },
                // When window width is <= 480px (smaller mobile devices)
                480: {
                    slidesPerView: 3
                }
            }
        });
    });
</script>

@endpush

@push('styles')
    @vite(['resources/css/home.css']) <!-- Adding styles specific to the homepage -->
@endpush
