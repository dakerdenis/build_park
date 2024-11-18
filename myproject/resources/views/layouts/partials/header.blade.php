<header>
    <div class="header__wrapper">
        <!-- Header Logo -->
        <div class="header__logo">
            <a href="{{ route('home', ['lang' => app()->getLocale()]) }}">
                <img src="{{ asset('images/logo.png') }}" alt="Build Park Company Logo">
            </a>
            
        </div>

        <!-- Header Navigation -->
        <nav class="haeder__navigation">
            <div class="header__navigation__element">
                <button data-section="hero">{{ __('header_home') }}</button>
            </div>
            <div class="header__navigation__element">
                <button data-section="services">{{ __('header_services') }}</button>
            </div>
            <div class="header__navigation__element">
                <button data-section="different">{{ __('header_different') }}</button>
            </div>
            <div class="header__navigation__element">
                <button data-section="our__team">{{ __('header_our__team') }}</button>
            </div>
            <div class="header__navigation__element">
                <button data-section="projects">{{ __('header_projects') }}</button>
            </div>

            <div class="header__navigation__element">
                <button data-section="offers">{{ __('header_offers') }}</button>
            </div>
            <div class="header__navigation__element">
                <button data-section="contact">{{ __('header_contact') }}</button>
            </div>
        </nav>

        <!-- Language Change -->
        <div class="header__language">
            <!-- Button to show active language -->
            <button class="active_language">
                <p>{{ strtoupper(app()->getLocale()) }}</p> <!-- Display the current active language -->
                <img src="{{ asset('images/lang_arrow.svg') }}" alt="Language arrow">
            </button>
        
            <!-- Dropdown for language selection -->
            <div class="language-dropdown">
                @foreach (['az', 'ru', 'en'] as $lang)
                    @if ($lang !== app()->getLocale()) <!-- Exclude the active language from the dropdown -->
                        <a href="{{ url($lang . substr(request()->getPathInfo(), 3)) }}">{{ strtoupper($lang) }}</a>
                    @endif
                @endforeach
            </div>
        </div>
        

        <!-- Theme Changer -->
        <div class="header__theme">
            <div class="theme_surface">
                <img src="{{ asset('images/theme_changer/sun.svg') }}" alt="Sun theme changer">
                <img src="{{ asset('images/theme_changer/mun.svg') }}" alt="Moon theme changer">
            </div>
            <div class="circle__changer"></div>
        </div>


        <!-- Burger Menu Icon -->
        <div class="burger__menu" id="burgerMenuButton">
            <div class="burger-line top"></div>
            <div class="burger-line middle"></div>
            <div class="burger-line bottom"></div>
        </div>

<!-- Full-Screen Burger Menu Overlay -->
<div class="burger-menu-overlay" id="burgerMenuOverlay">
    <button class="burger-menu-close" id="closeBurgerMenuButton">&times;</button>
    <div class="burger-menu-content">

            <div class="burger__menu__languages">
                <a href="{{ route('home', ['lang' => 'az']) }}">AZ</a>
                <a href="{{ route('home', ['lang' => 'ru']) }}">RU</a>
                <a href="{{ route('home', ['lang' => 'en']) }}">EN</a>
            </div>



            <div class="burdger__menu__navigation">
                <button data-section="hero">{{ __('header_home') }}</button>
                <button data-section="services">{{ __('header_services') }}</button>
                <button data-section="different">{{ __('header_different') }}</button>
                <!--button data-section="our__team">Find a Team</button -->
                <button data-section="projects">{{ __('header_projects') }}</button>
                <button data-section="offers">{{ __('header_offers') }}</button>
                <button data-section="contact">{{ __('header_contact') }} Us</button>
            </div>


            
    </div>
    <div class="burger__menu__placeholder burger__menu__placeholder1">
        <img src="{{ asset('images/burger/placeholder_1.svg') }}" alt="">                
    </div>

    <div class="burger__menu__placeholder burger__menu__placeholder2">
        <img src="{{ asset('images/burger/placeholder_1.svg') }}" alt="">                
    </div>
</div>



    </div>
</header>
