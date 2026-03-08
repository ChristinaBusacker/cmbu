import "./styles/app.scss";

const burger = document.querySelector(".burger");

if (burger) {
  burger.addEventListener("click", () => {
    burger.classList.toggle("active");

    const expanded = burger.classList.contains("active");
    burger.setAttribute("aria-expanded", expanded ? "true" : "false");
  });
}
