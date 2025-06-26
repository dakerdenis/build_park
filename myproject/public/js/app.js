// Define the scrollToSection function globally so it can be used anywhere in this file
const scrollToSection = (sectionId) => {
    const section = document.getElementById(sectionId);
    if (section) {
        section.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
};



document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.header__wrapper');
    const languageButton = document.querySelector('.header__language');
    const dropdown = document.querySelector('.language-dropdown');
    const themeButton = document.querySelector('.header__theme');
    const navButtons = document.querySelectorAll('.header__navigation__element button');
    const heroSection = document.getElementById('hero');
    const servicesSection = document.getElementById('services');
    const differentSection = document.getElementById('different');
    const storySection = document.getElementById('story');
    const howWorkName = document.querySelector('.how__work__name');
    const howWorkDesc = document.querySelector('.how__work__desc');
    const differentImage = document.querySelector('.different__absolute__image');
    const storyImage = document.querySelector('.story__absolute__image');
    let isLightTheme = false;



    // Add click event listener to each navigation button in the header
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

        // Toggle light theme class on hero section and other sections
        heroSection?.classList.toggle('light-theme');
        servicesSection?.classList.toggle('light-theme');
        differentSection?.classList.toggle('light-theme');
        storySection?.classList.toggle('light-theme');

        // Change colors of "How We Work" section
        if (howWorkName) {
            howWorkName.style.color = isLightTheme ? '#3F3F3F' : '#fff';
        }
        if (howWorkDesc) {
            howWorkDesc.style.color = isLightTheme ? '#3F3F3F' : '#fff';
        }

        // Change the image source for the "different" section
        if (differentImage) {
            differentImage.src = isLightTheme ? differentImage.getAttribute('data-light-src') : differentImage.getAttribute('data-dark-src');
        }

        // Change the image source for the "story" section
        if (storyImage) {
            storyImage.src = isLightTheme ? storyImage.getAttribute('data-light-src') : storyImage.getAttribute('data-dark-src');
        }

        // Update header background immediately when toggling theme
        updateHeaderBackgroundOnScroll();
    });
});







document.addEventListener('DOMContentLoaded', () => {
    const openPopupButton = document.getElementById('openStoryPopup');
    const storyPopup = document.getElementById('storyPopup');
    const closePopupButtonExtra = document.getElementById('closeStoryPopupBtn'); // Updated close button selector

    // Open popup logic
    openPopupButton.addEventListener('click', () => {
        storyPopup.style.display = 'flex';
        document.body.classList.add('no-scroll'); // Prevent body from scrolling
    });

    // Close popup logic for the close button
    if (closePopupButtonExtra) {
        closePopupButtonExtra.addEventListener('click', () => {
            storyPopup.style.display = 'none';
            document.body.classList.remove('no-scroll'); // Allow body scrolling
        });
    }

    // Close popup when clicking outside the content area
    storyPopup.addEventListener('click', (e) => {
        if (e.target === storyPopup) {
            storyPopup.style.display = 'none';
            document.body.classList.remove('no-scroll');
        }
    });
});






// Burger menu functionality
document.addEventListener('DOMContentLoaded', () => {
    const burgerMenuButton = document.getElementById('burgerMenuButton');
    const burgerMenuOverlay = document.getElementById('burgerMenuOverlay');
    const closeBurgerMenuButton = document.getElementById('closeBurgerMenuButton');
    const burgerMenuButtons = burgerMenuOverlay.querySelectorAll('.burger-menu-content button');

    // Open the burger menu
    burgerMenuButton.addEventListener('click', () => {
        burgerMenuOverlay.style.display = 'flex';
        document.body.classList.add('no-scroll'); // Disable page scrolling
    });

    // Close the burger menu
    closeBurgerMenuButton.addEventListener('click', () => {
        burgerMenuOverlay.style.display = 'none';
        document.body.classList.remove('no-scroll'); // Enable page scrolling
    });

    // Function to scroll to section and close burger menu
    const handleBurgerMenuClick = (button) => {
        const sectionId = button.getAttribute('data-section');
        scrollToSection(sectionId); // Use the same smooth scroll function
        burgerMenuOverlay.style.display = 'none'; // Close the menu
        document.body.classList.remove('no-scroll'); // Enable page scrolling
    };

    // Close the menu when clicking on a button in the burger menu
    burgerMenuButtons.forEach(button => {
        button.addEventListener('click', () => handleBurgerMenuClick(button));
    });
});






document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.category-button');
    const projectsContainer = document.getElementById('projects-container');

    if (buttons.length > 0) {
        // Автоматически загрузить первую категорию
        const firstButton = buttons[0];
        firstButton.classList.add('active'); // Добавляем активный класс
        loadProjects(firstButton.getAttribute('data-category'));
    }

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            // Убираем активный класс у всех кнопок
            buttons.forEach(btn => btn.classList.remove('active'));

            // Добавляем активный класс текущей кнопке
            this.classList.add('active');

            const categoryId = this.getAttribute('data-category');
            loadProjects(categoryId);
        });
    });

    function loadProjects(categoryId) {
        fetch(`/api/projects-by-category?category_id=${categoryId}`)
            .then(response => response.json())
            .then(data => {
                let html = `
                    <div class="project__slider__wrapper">
                        <div class="swiper__projects__container">
                `;

                if (data.length === 0) {
                    html += `<p>No projects found for this category.</p>`;
                } else {
                    data.forEach(project => {
                        html += `
                            <div class="swiper__projects__element">
                                <div class="swiper__projects__element__image">
                                    <img src="/uploads/project_images/${project.main_image}" alt="Project Image">
                                </div>
                                <div class="swiper__projects__element__desc">
                                    <div class="swiper__projects__element__name">
                                        ${project.name_en} <!-- Можно динамически подставить язык -->
                                    </div>
                                    <div class="swiper__projects__element__adress">
                                        ${project.address ?? ''}
                                    </div>
                                    <div class="swiper__projects__element__more">
                                        <a target="_blank" href="/${currentLocale}/our-projects/${project.id}">See more...</a>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                }

                html += `
                        </div>
                    </div>
                `;

                projectsContainer.innerHTML = html;
            })
            .catch(error => console.error('Error loading projects:', error));
    }
});
