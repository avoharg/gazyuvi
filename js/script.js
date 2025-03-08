
document.addEventListener('DOMContentLoaded', function() {
    const burgerButton = document.querySelector('#menu_open');
    const overlay = document.querySelector('.mobile_menu_overley');
    const menu = document.querySelector('.burger_menu');

    if (burgerButton && overlay && menu) {
        burgerButton.addEventListener('click', function(e) {
            e.preventDefault();
            toggleMenu();
        });

        overlay.addEventListener('click', function() {
            toggleMenu();
        });
    } else {
        console.error('One or more elements do not exist in the DOM');
    }

    function toggleMenu() {
        if (menu.classList.contains('active')) {
            menu.classList.remove('active');
            overlay.classList.remove('active');
        } else {
            menu.classList.add('active');
            overlay.classList.add('active');
        }
    }
});