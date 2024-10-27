document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.header__wrapper');
    const languageButton = document.querySelector('.header__language');
    const dropdown = document.querySelector('.language-dropdown');
    const themeButton = document.querySelector('.header__theme');
    const navButtons = document.querySelectorAll('.header__navigation__element button');
    const heroSection = document.querySelector('.hero');
    const servicesSection = document.querySelector('.services');
    const differentSection = document.querySelector('.different');
    const storySection = document.querySelector('.story');
    let isLightTheme = false;

    // Function to update the header background on scroll based on the theme
    const updateHeaderBackgroundOnScroll = () => {
        if (window.scrollY > 50) {
            header.style.backgroundColor = isLightTheme ? '#fff' : 'rgba(72, 72, 72, 1)'; // Light or dark background
        } else {
            header.style.backgroundColor = 'rgba(255, 255, 255, 0)'; // Transparent when at the top
        }
    };

    // Listen for scroll events and update the header background
    window.addEventListener('scroll', updateHeaderBackgroundOnScroll);

    // Language dropdown visibility and arrow rotation
    const showDropdown = () => {
        languageButton.classList.add('hovered');
        dropdown.classList.add('visible');
    };

    const hideDropdown = () => {
        languageButton.classList.remove('hovered');
        dropdown.classList.remove('visible');
    };

    // Show dropdown on hover and hide on mouse leave
    languageButton.addEventListener('mouseenter', showDropdown);
    languageButton.addEventListener('mouseleave', hideDropdown);

    // Toggle theme changer animation and update styles on click
    themeButton.addEventListener('click', () => {
        themeButton.classList.toggle('active');
        isLightTheme = !isLightTheme; // Toggle light theme state

        // Update nav button colors based on theme
        navButtons.forEach(button => {
            button.classList.toggle('dark-theme-button');
        });

        // Toggle light theme class on each section
        heroSection?.classList.toggle('light-theme');
        servicesSection?.classList.toggle('light-theme');
        differentSection?.classList.toggle('light-theme');
        storySection?.classList.toggle('light-theme');

        // Update header background immediately when toggling theme
        updateHeaderBackgroundOnScroll();
    });
});
