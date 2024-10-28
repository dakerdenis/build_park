// Import main styles
import '../css/style.css';
import '../css/header.css';
import '../css/home.css';

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

    // Smooth scrolling function
    const scrollToSection = (sectionId) => {
        const section = document.getElementById(sectionId);
        if (section) {
            section.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    };

    // Add click event listener to each navigation button
    navButtons.forEach(button => {
        button.addEventListener('click', () => {
            const sectionId = button.getAttribute('data-section');
            scrollToSection(sectionId);
        });
    });

    // Header background transition on scroll
    const updateHeaderBackgroundOnScroll = () => {
        if (window.scrollY > 50) {
            header.style.backgroundColor = isLightTheme ? '#fff' : 'rgba(72, 72, 72, 1)';
        } else {
            header.style.backgroundColor = 'rgba(255, 255, 255, 0)';
        }
    };

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
        isLightTheme = !isLightTheme;

        // Toggle dark theme for nav buttons
        navButtons.forEach(button => {
            button.classList.toggle('dark-theme-button');
        });

        // Toggle light theme class on hero section
        if (heroSection) {
            heroSection.classList.toggle('light-theme');
        }

        // Toggle light theme class on other sections
        servicesSection?.classList.toggle('light-theme');
        differentSection?.classList.toggle('light-theme');
        storySection?.classList.toggle('light-theme');

        // Update header background immediately when toggling theme
        updateHeaderBackgroundOnScroll();
    });
});
