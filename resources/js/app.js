import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    menuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
    });

    const userMenuButton = document.getElementById('user-menu-button');
    const userMenu = document.getElementById('user-menu');

    if (userMenuButton && userMenu) {
        userMenuButton.addEventListener('click', function() {
            userMenu.classList.toggle('hidden');
        });
    }
});


