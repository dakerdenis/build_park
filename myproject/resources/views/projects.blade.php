@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/projects.css') }}">
@endpush

@section('content')
    <div class="main__wrapper">
        <!-- Include the header component -->
        @include('layouts.partials.header')


        <section class="projects__main__section">
            <div class="projects__portfolio__paceholder"></div>
            <div class="projects__portfolio__navigation">
                <div class="projects__portfolio__name">
                    Portfolio
                </div>

                <div class="projects__portfolio__nav">
                    <a href="#" class="projects__portfolio__nav-element">All</a>
                    <a href="#" class="projects__portfolio__nav-element">Commercial</a>
                    <a href="#" class="projects__portfolio__nav-element">Residential</a>
                    <a href="#" class="projects__portfolio__nav-element">Test</a>
                    <a href="#" class="projects__portfolio__nav-element">Other</a>
                </div>
            </div>

            <div class="projects__portfolio__wrapper">
                <!--------->
                <div class="projects__element">

                </div>
                <!------>
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
