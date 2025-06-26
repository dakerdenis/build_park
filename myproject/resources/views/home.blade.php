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
                        <button>{{ __('hero_contact') }}</button>
                    </div>
                </div>

                <!-- Statistics Section -->
                <div class="hero__statistics">
                    <div class="hero__statistics__element">
                        <div class="hero__statistics__element-number">
                            300<span>+</span>
                        </div>
                        <div class="hero__statstics__element_desc">
                            <p>{{ __('hero_statistics1') }}</p>
                        </div>
                    </div>
                    <div class="hero__statistics__element">
                        <div class="hero__statistics__element-number">
                            900<span>+</span>
                        </div>
                        <div class="hero__statstics__element_desc">
                            <p>{{ __('hero_statistics2') }}</p>
                        </div>
                    </div>
                    <div class="hero__statistics__element">
                        <div class="hero__statistics__element-number">
                            20<span>+</span>
                        </div>
                        <div class="hero__statstics__element_desc">
                            <p>{{ __('hero_statistics3') }}</p>
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
                        <p>{{ __('hero_logo__desc') }}</p>
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
                        <p>{{ __('services__name') }}</p>
                    </div>
                    <div class="services__desc">
                        <p>
                            {{ __('services__desc') }}
                        </p>
                    </div>
                </div>
                <!---SERVICES--->
                <div class="services__wrapper">
                    <div class="services__element">
                        <div class="services__image">
                            <img src="{{ asset('images/services/services1.jpg') }}" alt="Build">
                        </div>
                        <div class="services__name">
                            <p>{{ __('services_excellent1_name') }}</p>
                        </div>
                        <div class="servies__desc">
                            <p>
                                {{ __('services_excellent1_desc') }}
                            </p>
                        </div>
                    </div>
                    <div class="services__element">
                        <div class="services__image">
                            <img src="{{ asset('images/services/services2.jpg') }}" alt="Build">
                        </div>
                        <div class="services__name">
                            <p>{{ __('services_excellent2_name') }}</p>
                        </div>
                        <div class="servies__desc">
                            <p>
                                {{ __('services_excellent2_desc') }}
                            </p>
                        </div>
                    </div>
                    <div class="services__element">
                        <div class="services__image">
                            <img src="{{ asset('images/services/services2.jpg') }}" alt="Build">
                        </div>
                        <div class="services__name">
                            <p>{{ __('services_excellent3_name') }}</p>
                        </div>
                        <div class="servies__desc">
                            <p>
                                {{ __('services_excellent3_desc') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!--- HOw we work---->
            <div class="how__work__container">
                <div class="how__work__name">
                    {{ __('how__wework__') }}
                </div>
                <div class="how__work__desc">
                    {{ __('how__wework__desc') }}
                </div>

                <div class="how__work__wrapper">
                    <div class="how__work__element left">

                        <div class="how__work__blur">

                        </div>

                        <div class="how__work__element-image">
                            <img class="" src="{{ asset('images\how_work\1.png') }}" alt="Story Our main photo">
                        </div>

                        <div class="how__work__element__desc">
                            <div class="how__work__element__desc__name">
                                {{ __('services1__name') }}
                            </div>
                            <div class="how__work__element__desc__text ">
                                <p>{{ __('services1__desc') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="how__work__element center">
                        <div class="how__work__blur">

                        </div>
                        <div class="how__work__element-image">
                            <img class="" src="{{ asset('images\how_work\2.png') }}" alt="Story Our main photo">
                        </div>

                        <div class="how__work__element__desc">
                            <div class="how__work__element__desc__name">
                                {{ __('services2__name') }}
                            </div>
                            <div class="how__work__element__desc__text ">
                                <p>
                                    {{ __('services2__desc') }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="how__work__element right">
                        <div class="how__work__blur">

                        </div>

                        <div class="how__work__element-image">
                            <img class="" src="{{ asset('images\how_work\3.png') }}" alt="Story Our main photo">
                        </div>

                        <div class="how__work__element__desc">
                            <div class="how__work__element__desc__name">
                                {{ __('services3__name') }}
                            </div>
                            <div class="how__work__element__desc__text">
                                <p>
                                    {{ __('services3__desc') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>



        <!----what makes us different--->
        <section class="different" id="different">
            <!----absolute left image-->
            <img class="different__absolute__image" src="{{ asset('images/different/different_left.svg') }}"
                data-dark-src="{{ asset('images/different/different_left.svg') }}"
                data-light-src="{{ asset('images/different/different_left_white.svg') }}" alt="Different left svg">


            <div class="different__container">
                <!---different name & DESC---->
                <div class="different__name__desc">
                    <!---different name---->
                    <div class="different__name">
                        <div class="different__line"></div>
                        <div class="different__name__text">
                            <p>{{ __('different__name__text') }}</p>
                        </div>
                    </div>
                    <!---Different desc-->
                    <div class="different__desc">
                        {{ __('different__desc') }}
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
                                        data-light-src="{{ asset('images/different/different_placeholder_white.svg') }}"
                                        alt="Different placeholder image">

                                    <img class="different_placeholder-img"
                                        src="{{ asset('images/different/different1.svg') }}" alt="We are experienced">
                                </div>
                            </div>
                            <div class="different__element__name">
                                <p>{{ __('different1__name') }}</p>
                            </div>
                            <div class="different__element__desc">
                                {{ __('different1__desc') }}
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
                                        src="{{ asset('images/different/different2.svg') }}" alt="We are experienced">
                                </div>
                            </div>
                            <div class="different__element__name">
                                <p>{{ __('differrent2__name') }}</p>
                            </div>
                            <div class="different__element__desc">
                                {{ __('differrent2__desc') }}
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
                                        src="{{ asset('images/different/different3.svg') }}" alt="We are experienced">
                                </div>
                            </div>
                            <div class="different__element__name">
                                <p>{{ __('different3__name') }}</p>
                            </div>
                            <div class="different__element__desc">
                                {{ __('different3__desc') }}
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
                                        src="{{ asset('images/different/different4.svg') }}" alt="We are experienced">
                                </div>
                            </div>
                            <div class="different__element__name">
                                <p>{{ __('differrent4__name') }}</p>
                            </div>
                            <div class="different__element__desc">
                                {{ __('differrent4__desc') }}
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
                        {{ __('story__desc__name') }}
                    </div>
                    <div class="story__desc__text">
                        <p>{{ __('story__desc__text') }}</p>
                    </div>



                    <div class="story__desc__button">
                        <button id="openStoryPopup">{{ __('story__desc__button') }}</button>
                    </div>
                </div>
                <!-----STORY IMAGE------>
                <div class="story__image">
                    <img class="" src="{{ asset('images\story\back.jpg') }}" alt="Story Our main photo">
                </div>
            </div>
            <!----absolute left image-->
            <img class="story__absolute__image" src="{{ asset('images/story/placeholder_bottom.svg') }}"
                data-dark-src="{{ asset('images/story/placeholder_bottom.svg') }}"
                data-light-src="{{ asset('images/story/placeholder_bottom_white.svg') }}" alt="Story bottom svg">


        </section>

        <!-- Story Popup -->
        <div class="story-popup" id="storyPopup">
            <div class="story-popup__content">
                <div class="story-popup__image">
                    <img class="" src="{{ asset('images\story\popup.jpg') }}" alt="Story Our main photo">
                </div>
                <button class="story-popup__close-btn" id="closeStoryPopupBtn">&times;</button>
                <h2>{{ __('story__popup__name') }}</h2>

                <div class="popup__content__text">
                    <p>
                        {{ __('popup__content__text1') }}
                    </p>
                    <p>
                        {{ __('popup__content__text2') }}
                    </p>
                    <p>
                        {{ __('popup__content__text3') }}
                    </p>
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
                            <p>{{ __('projects__name') }}</p>
                        </div>
                        <div class="projects__slider__navigation__elements">
                            @foreach($categories as $category)
                                <button class="category-button" data-category="{{ $category->id }}">
                                    @php
                                        $locale = app()->getLocale();
                                        $name = $category->{'name_' . $locale};
                                    @endphp
                                    {{ $name }}
                                </button>
                            @endforeach
                        </div>
                        
                        

                        <!-------->
                        <div class="projects__all-projects">
                            <a href="{{ route('projects', ['lang' => app()->getLocale()]) }}">
                                {{ __('projects__all_button') }}
                            </a>
                        </div>

                    </div>


                    <!----slider content--->
                    <div class="project__slider__content" id="projects-container">
                        <!-- ТУТ БУДЕМ ГЕНЕРИРОВАТЬ СОДЕРЖИМОЕ ЧЕРЕЗ JS -->
                    </div>
                    
                </div>

                <div class="mobile__all_projects">
                    <a href="{{ route('projects', ['lang' => app()->getLocale()]) }}">
                        {{ __('projects__all_button') }}
                    </a>
                </div>

            </div>

            <div class="projects__svg projects__svg1">
                <img class="" src="{{ asset('images\projects\vector1.svg') }}" alt="">
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
                    <img class="" src="{{ asset('images\offers\background1.jpeg') }}" alt="Offers background">
                </div>


                <!-----offers background2--->
                <div class="offers__background offers__background2">
                    <img class="" src="{{ asset('images\offers\background2.jpeg') }}" alt="Offers background">
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
                                {{ __('offers1__desc') }}
                            </div>
                        </div>


                        <!----offers button---->
                        <div class="offers__element__button">
                            <button>{{ __('offers__element__button') }}</button>
                        </div>


                        <!-----Offers logo------->
                        <div class="offers__red-logo">
                            <!---Offers red image---->
                            <img class="offers__red-image" src="{{ asset('images\offers\red_icon.svg') }}"
                                alt="Offers background">

                            <!----Offers red image text------>
                            <p>
                                {{ __('offers1__name') }}
                            </p>
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
                                {{ __('offers2__desc') }}
                            </div>
                        </div>


                        <!----offers button---->
                        <div class="offers__element__button">
                            <button>
                                {{ __('offers__element__button') }}
                            </button>
                        </div>


                        <!-----Offers logo------->
                        <div class="offers__red-logo">
                            <!---Offers red image---->
                            <img class="offers__red-image" src="{{ asset('images\offers\red_icon.svg') }}"
                                alt="Offers background">

                            <!----Offers red image text------>
                            <p>
                                {{ __('offers2__name') }}
                            </p>
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
                            {{ __('contact__form__name') }}
                        </div>
                        <div class="contact__form__desc">
                            {{ __('contact__form__desc') }}
                        </div>
                        <div class="contact__form__wrapper">
                            <div class="contact__form__inputs">
                                <input type="text" id="name" name="name"
                                    placeholder="{{ __('contact__form__inputs_name') }}">
                                <input type="email" id="email" name="email"
                                    placeholder="{{ __('contact__form__inputs_email') }}">
                            </div>
                            <div class="contact__form__inputs">
                                <div class="custom-select" id="customSelect">
                                    <div class="selected-option">{{ __('contact__form__option') }}</div>
                                    <span class="select-arrow">&#9662;</span> <!-- Arrow Icon -->
                                    <ul class="dropdown-options">
                                        <li data-value="1">{{ __('contact__form__option1') }}</li>
                                        <li data-value="2">{{ __('contact__form__option2') }}</li>
                                        <li data-value="3">{{ __('contact__form__option3') }}</li>
                                    </ul>
                                </div>


                                <input type="number" name="phone" id="phone"
                                    placeholder="{{ __('contact__form__inputs_phone') }}">
                            </div>

                            <div class="contact__form__message">
                                <textarea placeholder="{{ __('contact__form__inputs_message') }}" name="message" id="message"></textarea>
                            </div>
                            <div class="contact__form__indicates">
                                <span>*</span>{{ __('contact__form__indicates') }}
                            </div>

                            <div class="contact__form__submit">
                                <button type="submit">{{ __('contact__form__submit') }}</button>
                            </div>
                        </div>
                    </form>

                </div>
                <!-----contact form svg----->
                <div class="form__icon">
                    <img class="" src="{{ asset('images\contact\form_icon.svg') }}" alt="Contact icon logo">
                </div>

                <!----contact information & navigation---->
                <div class="contact__information">
                    <div class="contact__information__wrapper">
                        <!----contact information------>
                        <div class="contact__information__data">
                            <!----->
                            <div class="contact__information_container">
                                <div class="contact__information__desc">
                                    {{ __('contact__information__desc-adress') }}
                                </div>
                                <div class="contact__information__value">
                                    <p>91 Safarli St. Baku, Azerbaijan AZ1111</p>
                                </div>
                            </div>
                            <!----->
                            <div class="contact__information_container">
                                <div class="contact__information__desc">
                                    {{ __('contact__information__desc-phone') }}
                                </div>
                                <div class="contact__information__value">
                                    <p>+994 50 444 44 44</p>
                                </div>
                            </div>
                            <!----->
                            <div class="contact__information_container">
                                <div class="contact__information__desc">
                                    {{ __('contact__information__desc-email') }}
                                </div>
                                <div class="contact__information__value">
                                    <p>hello@buildpark.az</p>
                                </div>
                            </div>

                            <!----->
                            <div class="contact__information_container-social">
                                <div class="contact__information__desc">
                                    {{ __('contact__information__desc-social') }}
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
                                <button>{{ __('header_home') }}</button>
                                <button>{{ __('header_services') }}</button>
                                <button>{{ __('header_different') }}</button>
                                <button>{{ __('header_our__team') }}</button>
                                <button>{{ __('header_projects') }}</button>
                                <button>{{ __('header_offers') }}</button>
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
<script>
    const currentLocale = '{{ app()->getLocale() }}';
</script>

@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}"> <!-- Adding styles specific to the homepage -->
@endpush
