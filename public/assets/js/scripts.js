// Humberger dan navmenu start
const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");

hamburger.addEventListener("click", function () {
	hamburger.classList.toggle("hamburger-active");
	navMenu.classList.toggle("hidden");
});
// Humberger dan navmenu end

// Navbar fixed start
window.onscroll = function () {
	const header = document.querySelector("header");
	const navFixed = header.offsetTop;

	if (window.pageYOffset > navFixed) {
		header.classList.add("navbar-fixed");
	} else {
		header.classList.remove("navbar-fixed");
	}
};
// Navbar fixed end
