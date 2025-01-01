const menu = document.querySelector(".menu");
const btnMenu = document.getElementById("btnMenu");
const btnCheckbox = document.getElementById("btnCheckbox");

if(window.innerWidth <= 680){
  if (btnCheckbox.checked) {
    menu.style.width = "70%";
  } else {
    menu.style.width = "0px";
  }
  btnMenu.addEventListener("click", () => {
    if (btnCheckbox.checked) {
      menu.style.width = "70%";
    } else {
      menu.style.width = "0px";
    }
  });
}

