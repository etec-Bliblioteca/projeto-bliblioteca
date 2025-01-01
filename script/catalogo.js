import Revista from "./cardRevista.js";
import {modal,modalUser} from "./modal.js";
import createModal from "./addModal.js";

const btnsLink = document.createElement("div");
btnsLink.setAttribute("id", "btnsLink");
btnsLink.setAttribute("class", "btnsLink");

let paginaAtual = 1; // Página inicial

// Função para carregar dados de uma página específica
function loadCatalog(page) {
  const ajax = new XMLHttpRequest();
  ajax.responseType = "json";
  const href = window.location.href.split("/");
  const url = `${href[0]}//${href[2]}/${href[3]}/phpActions/selectRevista.php?page=${page}&limit=20`;

  // Conexão com o servidor
  ajax.onreadystatechange = () => {
    if (ajax.readyState == 4 && ajax.status == 200) {
      const response = ajax.response;

      //ALterar o valor da página atual
      paginaAtual = response.paginaAtual;
      // Limpar o catálogo atual e botões
      const catalogoContainer = document.getElementById("catalogo");
      catalogoContainer.innerHTML = "";
      btnsLink.innerHTML = "";

      // Renderizar as revistas
      response.revistas.forEach((revista) => {
        const cardRevista = new Revista(
          revista["id_revista"],
          revista["titulo"],
          revista["descricao"],
          revista["tema"],
          revista["quantidade"],
          revista["imagem"]
        );

        cardRevista.createRevista();
        const containerCard = document.getElementById(cardRevista.id);

        // Adicionar evento de clique para abrir o modal
        containerCard.addEventListener("click", () => {
          createModal();
          modal(cardRevista, revista["id_revista"]);
        });
      });

      //Botão para voltar e avançar
      const btnNext = document.createElement("button");
      btnNext.innerHTML = ">>";
      btnNext.addEventListener("click", () => {
        paginaAtual = response.paginaAtual++;
        console.log(response.paginaAtual);
        loadCatalog(response.paginaAtual); // Carrega a nova página
      });

      const btnPrev = document.createElement("button");
      btnPrev.innerHTML = "<<";
      btnPrev.addEventListener("click", () => {
        paginaAtual = response.paginaAtual--;
        console.log(response.paginaAtual);
        loadCatalog(response.paginaAtual); // Carrega a nova página
      });
      if (response.paginaAtual != 1) {
        btnsLink.appendChild(btnPrev);
      }

      const btnLink = document.createElement("button");
      btnLink.innerHTML = response.paginaAtual;
      btnLink.addEventListener("click", () => {
        paginaAtual = paginaAtual++; // Atualiza a página atual
        loadCatalog(paginaAtual); // Carrega a nova página
      });
      btnsLink.appendChild(btnLink);

      if (response.paginaAtual < response.numPages) {
        btnsLink.appendChild(btnNext);
      }

      catalogoContainer.appendChild(btnsLink);
    }
  };

  ajax.open("GET", url, true);
  ajax.send();
}

// Carregar a página inicial
loadCatalog(paginaAtual);
export { loadCatalog };
