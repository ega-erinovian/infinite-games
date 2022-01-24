const nav = document.querySelector("nav");
window.onscroll = function () {
  var top = window.scrollY;
  if (top >= 30) {
    nav.classList.add("scrolled");
  } else {
    nav.classList.remove("scrolled");
  }
};
