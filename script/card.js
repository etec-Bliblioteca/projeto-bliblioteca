const containerCard = [...document.querySelectorAll(".containerCard")];

containerCard.map((card)=>{
    card.addEventListener("click",()=>{
        Swal.fire({
            title: `Tu escolheu o ${card.id}`,
            width: 600,
            padding: "3em",
            color: "#716add",
            backdrop: `
              rgba(0,0,123,0.4)
              url("/images/nyan-cat.gif")
              left top
              no-repeat
            `
          });
    })
})