@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/single_projects.css') }}">
@endpush

@section('content')
    <div class="main__wrapper">
        <!-- Include the header component -->
        @include('layouts.partials.header')
        <section class="single__project" id="single__project">
            <div class="single__project__container">
        
                <div class="single__project__back-button">
                    <a href="{{ route('projects', ['lang' => app()->getLocale()]) }}">
                        ← {{ app()->getLocale() == 'en' ? 'Back to Projects' : (app()->getLocale() == 'ru' ? 'Назад к проектам' : 'Layihələrə qayıt') }}
                    </a>
                </div>
        
                <div class="single__project__main-image">
                    <a href="{{ asset('uploads/project_images/' . $project->main_image) }}" data-fancybox="gallery">
                        <img src="{{ asset('uploads/project_images/' . $project->main_image) }}" alt="Main Image">
                    </a>
                </div>
        
                <div class="single__project__details">
                    <h1 class="single__project__title">
                        @if (app()->getLocale() == 'en')
                            {{ $project->name_en }}
                        @elseif (app()->getLocale() == 'ru')
                            {{ $project->name_ru }}
                        @else
                            {{ $project->name_az }}
                        @endif
                    </h1>
        
                    <p class="single__project__address">
                        {{ $project->address }}
                    </p>
        
                    <p class="single__project__description">
                        @if (app()->getLocale() == 'en')
                            {{ $project->description_en }}
                        @elseif (app()->getLocale() == 'ru')
                            {{ $project->description_ru }}
                        @else
                            {{ $project->description_az }}
                        @endif
                    </p>
        
                    @if ($project->youtube_url)
                        <div class="single__project__youtube">
                            <a href="{{ $project->youtube_url }}" target="_blank">
                                {{ app()->getLocale() == 'en' ? 'Watch on YouTube' : (app()->getLocale() == 'ru' ? 'Смотреть на YouTube' : 'YouTube-da izləyin') }}
                            </a>
                        </div>
                    @endif
        
                    <div class="single__project__images">
                        @foreach ($project->images as $image)
                            <a href="{{ asset('uploads/project_images/' . $image) }}" data-fancybox="gallery">
                                <img src="{{ asset('uploads/project_images/' . $image) }}" alt="Project Image">
                            </a>
                        @endforeach
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
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />

@endsection
