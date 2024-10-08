const bgPoup = document.getElementById("bgPoup");
const btnClose = document.getElementById("btnClose");
const nomeRevista = document.getElementById("nomeRevista");
const autorRevista = document.getElementById("autorRevista");
const qtdeRevista = document.getElementById("qtdeRevista");
const imgPopUp = document.getElementById("imgPopUp");
const cardImg = [...document.querySelectorAll(".cardImg")];
let revistas = 0;
const btnReservar = document.querySelector(".btnReservar");
btnClose.addEventListener("click", () => {
  bgPoup.style.display = "none";
});

console.log(nomeRevista[1])

const containerCard = [...document.querySelectorAll(".containerCard")];
// console.log(containerCard)
let modal = true;
containerCard.map((card, index) => {
  card.addEventListener("click",()=>{
    nomeRevista.innerHTML = `Revista ${index + 1}`;
    imgPopUp.src = cardImg[index].firstElementChild.src;

    if (revistas > 0) {
      btnReservar.setAttribute("id", "ativo");
      btnReservar.innerHTML = "Reservar";
    } else {
      btnReservar.setAttribute("id", "inativo");
      btnReservar.innerHTML = `<svg
      viewBox="-4 0 32 32"
      xmlns="http://www.w3.org/2000/svg"
      fill="#000000"
    >
      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
      <g
        id="SVGRepo_tracerCarrier"
        stroke-linecap="round"
        stroke-linejoin="round"
      ></g>
      <g id="SVGRepo_iconCarrier">
        <g id="Lager_45" data-name="Lager 45" transform="translate(-4)">
          <g id="Group_16" data-name="Group 16">
            <path
              id="Path_53"
              data-name="Path 53"
              d="M26,12H24V7h-.069A7.993,7.993,0,0,0,8.069,7H8v5H6a2,2,0,0,0-2,2V30a2,2,0,0,0,2,2H26a2,2,0,0,0,2-2V14A2,2,0,0,0,26,12ZM12,8a4,4,0,0,1,8,0v4H12ZM23,28H9a1,1,0,0,1-1-1V17a1,1,0,0,1,1-1H23a1,1,0,0,1,1,1V27A1,1,0,0,1,23,28Z"
              fill="#ffffff"
            ></path>
            <circle
              id="Ellipse_1"
              data-name="Ellipse 1"
              cx="2"
              cy="2"
              r="2"
              transform="translate(14 20)"
              fill="#ffffff"
            ></circle>
          </g>
        </g>
      </g>
    </svg>`;
    }
  
    bgPoup.style.display = "flex";
  })
});
