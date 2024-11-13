<header>
    <div class="header__wrapper">
        <!-- Header Logo -->
        <div class="header__logo">
            <button>
                <img src="{{ asset('images/logo.png') }}" alt="Build Park Company Logo">

            </button>
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

        <!----burger menu----->
        <div class="burger__menu">
            
        </div>
    </div>
</header>
