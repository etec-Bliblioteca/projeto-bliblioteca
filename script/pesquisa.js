import Revista from "./cardRevista.js";
import {modal,modalUser} from "./modal.js";
import createModal from "./addModal.js";
import { loadCatalog } from "./catalogo.js";

const btnPesquisa = document.getElementById("btnPesquisa");
const catalogo = document.getElementById("catalogo");
btnPesquisa.addEventListener("keydown", (event) => {
  catalogo.innerHTML = "";
  if (event.key == "Enter") {
    if (btnPesquisa.value != " ") {
      let pesq = btnPesquisa.value;
      //UTILIZANDO AJAX PARA CRIAR O CATALOGO
      let ajax = new XMLHttpRequest();
      ajax.responseType = "json";
      let href = window.location.href;
      // console.log(href)
      href = href.split("/");
      // console.log(href)
      let url = `${href[0]}//${href[2]}/${href[3]}/`;
      // console.log(url)

      ajax.open(
        "GET",
        url + `/phpActions/pesquisaRevista.php/?pesq=${pesq}`,
        true
      );

      //FAZ A CONECXÂO COM O SERVIDOR
      ajax.onreadystatechange = () => {
        //VERIFICA SE O STATUS DA CONECXÃO É 4 OU SEJA COMPLETA
        if (ajax.readyState == 4 && ajax.status == 200) {
          const response = ajax.response;
          console.log(response);
          response.map((revista) => {
            let cardRevista = new Revista(
              revista["id_revista"],
              revista["titulo"],
              revista["descricao"],
              revista["tema"],
              revista["quantidade"],
              revista["imagem"]
            );

            cardRevista.createRevista();
            let containerCard = document.getElementById(cardRevista.id);

            containerCard.addEventListener("click", (evt) => {
              createModal();
              modal(cardRevista);
            });
          });
          // console.log(response);
        }
      };
      //FAZ O ENVIO DAS CONFIGURAÇÔES ACIMA
      ajax.send();
    }
  }
});

// btnPesquisa.addEventListener("focusout",()=>{
//   loadCatalog(1);
// })
