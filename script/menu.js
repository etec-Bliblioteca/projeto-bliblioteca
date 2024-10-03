const menu = document.querySelector(".menu");
const btnMenu = document.getElementById("btnMenu");
const btnCheckbox = document.getElementById("btnCheckbox");
if (btnCheckbox.checked) {
  menu.style.display = "flex";
} else {
  menu.style.display = "none";
}
btnMenu.addEventListener("click", () => {
  if (btnCheckbox.checked) {
    menu.style.display = "flex";
  } else {
    menu.style.display = "none";
  }
});
