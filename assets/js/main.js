
const mobileMenu = document.querySelector('.mobile-menu');
const openBtn = document.querySelector('.mobile-toggle');
const closeBtn = document.querySelector('.mobile-close');

openBtn.addEventListener('click', () => {
    mobileMenu.classList.add('active');
});

closeBtn.addEventListener('click', () => {
    mobileMenu.classList.remove('active');
});
