document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.header__wrapper');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {  // Adjust this value as needed
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
});
