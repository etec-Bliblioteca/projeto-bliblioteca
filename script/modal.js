
const modal = (cardRevista,idRevista) => {
  const bgPoup = document.getElementById("bgPoup");
  const btnClose = document.getElementById("btnClose");
  const nomeRevista = document.getElementById("nomeRevista");
  const temaRevista = document.getElementById("temaRevista");
  const qtdeRevista = document.getElementById("qtdeRevista");
  const txtDesc = document.getElementById("txtDesc");
  const imgPopUp = document.getElementById("imgPopUp");
  const btnReservar = [...document.querySelectorAll(".btnReservar")];
  btnClose.addEventListener("click", () => {
    bgPoup.remove();
  });

  nomeRevista.innerHTML = `${cardRevista["titulo"]}`;
  imgPopUp.src = `imagens/${cardRevista["imagem"]}`;

  temaRevista.innerHTML = `Tema: ${cardRevista["tema"]}`;

  txtDesc.innerHTML = `${cardRevista["descricao"]}`;

  qtdeRevista.innerHTML = `Quantidade: ${cardRevista["quantidade"]}`;

  if (cardRevista["quantidade"] > 0) {
    btnReservar[0].setAttribute("id", "ativo");
    btnReservar[0].innerHTML = "Reservar";
    btnReservar[0].addEventListener("click", () => {
      cardRevista['quantidade'] = cardRevista['quantidade'] - 1;
      addPedido(idRevista,cardRevista['quantidade']);
      btnClose.click();
    });
  } else {
    btnReservar[0].setAttribute("id", "inativo");
    btnReservar[0].innerHTML = `<svg
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
};

// FAZENDO O NOVO PEDIDO DA REVISTA
const addPedido = (idRevista,qtdeRevista) =>{
  //UTILIZANDO AJAX PARA CRIAR O CATALOGO
  let ajax = new XMLHttpRequest();
  ajax.responseType = "json";
  let href = window.location.href;
  // console.log(href)
  href = href.split("/");
  // console.log(href)
  let url = `${href[0]}//${href[2]}/${href[3]}/`;
  // console.log(url);
  ajax.open("GET", url + `/phpActions/addPedido.php?idRevista=${idRevista}&qtdeRevista=${qtdeRevista}`, true);
  
  //FAZ A CONECXÂO COM O SERVIDOR
  ajax.onreadystatechange = () => {
    //VERIFICA SE O STATUS DA CONECXÃO É 4 OU SEJA COMPLETA
    if (ajax.readyState == 4 && ajax.status == 200) {
      let response = ajax.response;
      Swal.fire({
        icon: response['icon'],
        title: response['title'],
        text: response['msg'],
      });
    }
  };
    //FAZ O ENVIO DAS CONFIGURAÇÔES ACIMA
    ajax.send();
}

//Modal para o usuario ver as revistas agendadas
const modalUser=(cardRevista)=>{
  const bgPoup = document.getElementById("bgPoup");
  const btnClose = document.getElementById("btnClose");
  btnClose.addEventListener("click", () => {
    bgPoup.remove();
  });
  const nomeRevista = document.getElementById("nomeRevista");
  const temaRevista = document.getElementById("temaRevista");
  // const qtdeRevista = document.getElementById("qtdeRevista");
  const txtDesc = document.getElementById("txtDesc");
  const imgPopUp = document.getElementById("imgPopUp");

  nomeRevista.innerHTML = `${cardRevista["titulo"]}`;
  imgPopUp.src = `imagens/${cardRevista["imagem"]}`;

  temaRevista.innerHTML = `Tema: ${cardRevista["tema"]}`;

  txtDesc.innerHTML = `${cardRevista["descricao"]}`;

  

  bgPoup.style.display = "flex";
}

export { modal, modalUser };