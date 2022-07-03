const menuToggle = document.querySelector(".menu-toggle");
const aside = document.querySelector("aside");

menuToggle.addEventListener("click", () => {
  menuToggle.classList.toggle("is-active");
  aside.classList.toggle("is-active");
});

const openSection = (section) => {
  var x = document.getElementsByClassName("admin-section");
  for (i = 0; i < x.length; i++) x[i].style.display = "none";

  //   document
  //   .querySelectorAll(".menu-item")
  //     .forEach((l) => l.classList.remove("active"));

  menuToggle.classList.remove("is-active");
  aside.classList.remove("is-active");
  //   event.currentTarget.className += " active";

  document.getElementById(section).style.display = "block";
};
