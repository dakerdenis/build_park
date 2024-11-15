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
                <button data-section="hero">Home</button>
            </div>
            <div class="header__navigation__element">
                <button data-section="services">Services</button>
            </div>
            <div class="header__navigation__element">
                <button data-section="different">About Us</button>
            </div>
            <div class="header__navigation__element">
                <button data-section="our__team">Find a Team</button>
            </div>
            <div class="header__navigation__element">
                <button data-section="projects">Portfolio</button>
            </div>

            <div class="header__navigation__element">
                <button data-section="offers">Offers</button>
            </div>
            <div class="header__navigation__element">
                <button data-section="contact">Contact us</button>
            </div>
        </nav>

        <!-- Language Change -->
        <div class="header__language">
            <button class="active_language">
                <p>EN</p>
                <img src="{{ asset('images/lang_arrow.svg') }}" alt="Language arrow">
            </button>
            <div class="language-dropdown">
                <button>AZ</button>
                <button>RU</button>
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
                <a href="#">AZ</a>
                <a href="#">RU</a>
                <a href="#">EN</a>
            </div>



            <div class="burdger__menu__navigation">
                <button data-section="hero">Home</button>
                <button data-section="services">Services</button>
                <button data-section="different">About Us</button>
                <!--button data-section="our__team">Find a Team</button -->
                <button data-section="projects">Portfolio</button>
                <button data-section="offers">Offers</button>
                <button data-section="contact">Contact Us</button>
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
