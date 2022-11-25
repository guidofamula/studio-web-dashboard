// Humberger dan navmenu start
const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");

// Button to top
const buttonTop = document.querySelector("#topButton");

hamburger.addEventListener("click", function () {
    hamburger.classList.toggle("hamburger-active");
    navMenu.classList.toggle("hidden");
});
// Humberger dan navmenu end

// If hamburger enable in mobile version, anywhere compatible to click for close the hamburger
window.addEventListener("click", function (e) {
    if (e.target != hamburger && e.target != navMenu) {
        hamburger.classList.remove("hamburger-active");
        navMenu.classList.add("hidden");
    }
});
// end If hamburger enable in mobile version, anywhere compatible to click for close the hamburger
// Navbar fixed start
window.onscroll = function () {
    const header = document.querySelector("header");
    const navFixed = header.offsetTop;

    if (window.pageYOffset > navFixed) {
        header.classList.add("navbar-fixed");
        // Button top conditional for hidden & enable
        buttonTop.classList.remove("hidden");
        buttonTop.classList.add("flex");
    } else {
        header.classList.remove("navbar-fixed");
        buttonTop.classList.add("hidden");
        buttonTop.classList.remove("flex");
    }
};
// Navbar fixed end

// Start dark mode toggle
const darkToggle = document.querySelector("#dark-toggle");
const html = document.querySelector("html");

darkToggle.addEventListener("click", function (e) {
    if (darkToggle.checked) {
        html.classList.add("dark");
        localStorage.theme = "dark";
    } else {
        html.classList.remove("dark");
        localStorage.theme = "light";
    }
});
// End dark mode toggle

// Make toggle stay with status light/dark
// On page load or when changing themes, best to add inline in `head` to avoid FOUC
if (
    localStorage.theme === "dark" ||
    (!("theme" in localStorage) &&
        window.matchMedia("(prefers-color-scheme: dark)").matches)
) {
    darkToggle.checked = true;
} else {
    darkToggle.checked = false;
}
