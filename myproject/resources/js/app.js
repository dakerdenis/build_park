document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.header__wrapper');
    const languageButton = document.querySelector('.header__language');
    const dropdown = document.querySelector('.language-dropdown');
    const themeButton = document.querySelector('.header__theme');
    const navButtons = document.querySelectorAll('.header__navigation__element button');
    const heroSection = document.querySelector('.hero'); // Hero section
    const servicesSection = document.querySelector('.services'); // Services section
    const differentSection = document.querySelector('.different'); // Different section

    // Header background transition on scroll
    window.addEventListener('scroll', () => {
        header.classList.toggle('scrolled', window.scrollY > 50);
    });

    // Language dropdown visibility and arrow rotation
    const showDropdown = () => {
        languageButton.classList.add('hovered'); // Arrow rotates
        dropdown.classList.add('visible'); // Dropdown shows with fade-in
    };

    const hideDropdown = () => {
        languageButton.classList.remove('hovered'); // Arrow rotates back
        dropdown.classList.remove('visible'); // Dropdown hides with fade-out
    };

    // Show dropdown on hover and hide on mouse leave
    languageButton.addEventListener('mouseenter', showDropdown);
    languageButton.addEventListener('mouseleave', hideDropdown);

    // Toggle theme changer animation and update styles on click
    themeButton.addEventListener('click', () => {
        themeButton.classList.toggle('active');

        // Toggle dark theme for nav buttons
        navButtons.forEach(button => {
            button.classList.toggle('dark-theme-button'); // Toggle theme-specific class
        });

        // Toggle light theme class on hero section
        if (heroSection) {
            heroSection.classList.toggle('light-theme'); // Add or remove light theme on hero
        }

        // Toggle light theme class on services section
        if (servicesSection) {
            servicesSection.classList.toggle('light-theme'); // Add or remove light theme on services
        }

        // Toggle light theme class on different section
        if (differentSection) {
            differentSection.classList.toggle('light-theme'); // Add or remove light theme on different
        }
    });
});
