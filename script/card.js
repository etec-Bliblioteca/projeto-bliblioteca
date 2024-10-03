const containerCard = [...document.querySelectorAll(".containerCard")];
let modal = true;
containerCard.map((card,index)=>{
    card.addEventListener("click",()=>{
      Swal.fire(`Você escolheu a revista Nº${index+1}`);
    });
})
