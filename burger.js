// Get references to your elements
const hamburgerIcon = document.querySelector('.hamburger-icon');
const navbartop = document.querySelector('.navbartop');

// Add a click event listener to the hamburger icon
hamburgerIcon.addEventListener('click', () => {
    // Toggle the 'active' class to show/hide the mobile menu
    mobileMenu.classList.toggle('active');
});