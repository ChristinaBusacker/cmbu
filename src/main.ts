import "./styles/app.scss";

const header = document.querySelector<HTMLElement>(".site-header");
const burger = document.querySelector<HTMLButtonElement>(".burger");
const nav = document.querySelector<HTMLElement>(".site-nav");
const navLinks = document.querySelectorAll<HTMLAnchorElement>(".site-nav a");

const closeMenu = () => {
  if (!header || !burger) return;

  burger.classList.remove("active");
  burger.setAttribute("aria-expanded", "false");
  header.classList.remove("nav-open");
};

if (header && burger && nav) {
  burger.addEventListener("click", () => {
    const isOpen = burger.classList.toggle("active");
    burger.setAttribute("aria-expanded", isOpen ? "true" : "false");
    header.classList.toggle("nav-open", isOpen);
  });

  navLinks.forEach((link) => {
    link.addEventListener("click", () => {
      closeMenu();
    });
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") {
      closeMenu();
    }
  });
}
