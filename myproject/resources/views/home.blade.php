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
                            300+
                        </div>
                        <div class="hero__statstics__element_desc">
                            <p>Amazing people</p>
                        </div>
                    </div>
                    <div class="hero__statistics__element">
                        <div class="hero__statistics__element-number">
                            300+
                        </div>
                        <div class="hero__statstics__element_desc">
                            <p>Amazing people</p>
                        </div>
                    </div>
                    <div class="hero__statistics__element">
                        <div class="hero__statistics__element-number">
                            300+
                        </div>
                        <div class="hero__statstics__element_desc">
                            <p>Amazing people</p>
                        </div>
                    </div>
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


        <!-- Optional footer -->
        @include('layouts.partials.footer')
    </div>
@endsection
@push('styles')
    @vite(['resources/css/home.css']) <!-- Adding styles specific to the homepage -->
@endpush
