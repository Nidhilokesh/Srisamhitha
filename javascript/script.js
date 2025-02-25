document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.getElementById("hamburger");
    const navLinks = document.getElementById("nav-links");

    hamburger.addEventListener("click", function () {
        navLinks.classList.toggle("show");
    });
});

// const navbar = document.querySelector(".navbar");
// const hamburger = document.querySelector(".hamburger");
// const navLinks = document.querySelector(".nav-links");

// // Navbar scroll effect
// window.addEventListener("scroll", () => {
//     if (window.scrollY > 50) {
//         navbar.classList.add("scrolled");
//     } else {
//         navbar.classList.remove("scrolled");
//     }
// });

// // Toggle mobile menu
// hamburger.addEventListener("click", () => {
//     navLinks.classList.toggle("show");
// });
