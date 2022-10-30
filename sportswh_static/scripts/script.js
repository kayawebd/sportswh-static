"use strict";

const menuToggle = document.getElementById("menu-toggle");
const menu = document.getElementById("menu");

if (menuToggle && menu) {
  menuToggle.setAttribute("aria-expanded", "false");
  menuToggle.setAttribute("aria-controls", "menu");
  menuToggle.addEventListener("click", () => {
    if (menu.classList.contains("show")) {
      menu.classList.remove("show");
      menuToggle.setAttribute("aria-expanded", "false");
    } else {
      menu.classList.add("show");
      menuToggle.setAttribute("aria-expanded", "ture");
    }
  });
}
