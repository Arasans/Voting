//Menu
const toTop = document.querySelector("#to-top");
const header = document.querySelector("header");
const buttondropdown = document.querySelector("#buttondropdown");
const buttondropdown1 = document.querySelector("#buttondropdown1");
const buttondropdown2 = document.querySelector("#buttondropdown2");
const menu = document.querySelector("#menu");
const navmenu = document.querySelector("#nav-menu");
const isidropdown = document.querySelector("#isidropdown");
const isidropdown1 = document.querySelector("#isidropdown1");
const isidropdown2 = document.querySelector("#isidropdown2");

// const password = document.querySelector("#password");
const password = document.getElementById("password");
const passwordconfirmation = document.querySelector("#password_confirmation");
const svgshow = document.querySelector("#svgshow");
const svgshowdiv = document.querySelector("#svgshowdiv");
const svghidden = document.querySelector("#svghidden");
const svghiddendiv = document.querySelector("#svghiddendiv");
const svgshow1 = document.querySelector("#svgshow1");
const svgshowdiv1 = document.querySelector("#svgshowdiv1");
const svghidden1 = document.querySelector("#svghidden1");
const svghiddendiv1 = document.querySelector("#svghiddendiv1");
const waktu = document.querySelector("#waktu");
// const vote = document.querySelectorAll("[id=vote]");
// const modal = document.querySelector("#modal");

const fixedNav = header.offsetTop;

menu.addEventListener("click", function () {
    menu.classList.toggle("menu-active");
    navmenu.classList.toggle("hidden");
});

//Navbar Fixed
window.onscroll = function () {
    if (window.pageYOffset > fixedNav) {
        console.log("inivoee", vote);
        header.classList.add("navbar-fixed");
        toTop.classList.remove("hidden");
        toTop.classList.add("flex");
        // toTop.classList.add("bg-gradient-to-tr from-secondary to-primary");
    } else {
        header.classList.remove("navbar-fixed");
        toTop.classList.remove("flex");
        toTop.classList.add("hidden");
        // toTop.classList.remove("bg-gradient-to-tr from-secondary to-primary");
    }
};

// vote.addEventListener("click", function () {
//     modal.classList.remove("hidden");
//     modal.classList.add("flex");
// });
