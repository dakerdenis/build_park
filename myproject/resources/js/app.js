import './bootstrap';
document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.header__wrapper');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {  // You can adjust this value to change when the effect starts
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });
});
