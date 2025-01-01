import Revista from "./cardRevista.js";
import {modal,modalUser} from "./modal.js";
import createModal from "./addModal.js";


let href = window.location.href;
// console.log(href)
href = href.split("/");
// console.log(href)
let url = `${href[0]}//${href[2]}/${href[3]}`;
let endpoint = url + `/phpActions/sessionUser.php/`;
//PEGANDO AS REVISTAS AGENDADAS PELO USUARIO
fetch(endpoint)
.then((res)=> res.json())
.then((arrRevista)=>{ //ARRAY PARA PEGAR AS REVISTAS
    if(arrRevista.length >= 1){//VERIFICA SE TEM APENAS UMA AGENDADA
        console.log(arrRevista);
        const cardRevista = new Revista(
            arrRevista["id_revista"],
            arrRevista["nomeRevista"],
            arrRevista["revistaDesc"],
            arrRevista["revistaTema"],
            0,
            arrRevista["revistaImg"]
          );
  
          cardRevista.createRevista();
          const containerCard = document.getElementById(cardRevista.id);
  
          // Adicionar evento de clique para abrir o modal
          containerCard.addEventListener("click", () => {
            createModal();
            modalUser(cardRevista);
          });
    }else if(arrRevista.length >= 2){
        arrRevista.map((revista)=>{
            const cardRevista = new Revista(
                revista["id_revista"],
                revista["nomeRevista"],
                revista["revistaDesc"],
                revista["revistaTema"],
                0,
                revista["revistaImg"]
              );
                
              cardRevista.createRevista();
              const containerCard = document.getElementById(cardRevista.id);
      
              // Adicionar evento de clique para abrir o modal
              containerCard.addEventListener("click", () => {
                createModal();
                modalUser(cardRevista);
              });
        });
    }else{
      document.getElementById('catalogo').innerHTML = "<h1>SEM REVISTAS AGENDADAS</h1>"
    }
});
