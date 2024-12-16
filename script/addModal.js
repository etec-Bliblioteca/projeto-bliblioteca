
const createModal =()=>{
    const bgPoup = document.createElement('div');
    bgPoup.setAttribute('class',"bgPoup");
    bgPoup.setAttribute('id',"bgPoup");
  
    const containerPopUp = document.createElement("div");
    containerPopUp.setAttribute("class","containerPopUp");
    containerPopUp.setAttribute("id","containerPopUp");
  
    const img = document.createElement('img');
    img.setAttribute("class","imgPopUp");
    img.setAttribute("id","imgPopUp");
    bgPoup.appendChild(img);
  
    const containerInfoPopUp = document.createElement("div");
    containerInfoPopUp.setAttribute("class","containerInfoPopUp");
  
    const nomeRevista = document.createElement("h1");
    nomeRevista.setAttribute("id","nomeRevista");
    const temaRevista = document.createElement("p");
    temaRevista.setAttribute("id","temaRevista");
    const qtdeRevista = document.createElement("p");
    qtdeRevista.setAttribute("id","qtdeRevista");
  
    containerInfoPopUp.appendChild(nomeRevista);
    containerInfoPopUp.appendChild(temaRevista);
    containerInfoPopUp.appendChild(qtdeRevista);
  
    const containerDescPopUp = document.createElement('div');
    containerDescPopUp.setAttribute("class","containerDescPopUp");
    const descRevista = document.createElement('h1');
    descRevista.setAttribute("class","descRevista");
    descRevista.innerHTML = "Descrição";
    const txtDesc = document.createElement('p');
    txtDesc.setAttribute("class","txtDesc");
    txtDesc.setAttribute("id","txtDesc");
  
    containerDescPopUp.appendChild(descRevista);
    containerDescPopUp.appendChild(txtDesc);
  
    const btnReservar = document.createElement("button");
    btnReservar.setAttribute("class","btnReservar");
    const btnClose = document.createElement("button");
    btnClose.setAttribute("class","btnClose");
    btnClose.setAttribute("id","btnClose");
    btnClose.innerHTML = "X";
  
    containerPopUp.appendChild(img);
    containerPopUp.appendChild(containerInfoPopUp);
    containerPopUp.appendChild(btnClose);
    containerPopUp.appendChild(containerDescPopUp);
    containerPopUp.appendChild(btnReservar);
    bgPoup.appendChild(containerPopUp);
    document.body.appendChild(bgPoup);
  }

  export default createModal;