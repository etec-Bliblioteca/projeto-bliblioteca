const carroselEvento = document.getElementById('carroselEvento');

let href = window.location.href;
// console.log(href)
href = href.split("/");
// console.log(href)
let url = `${href[0]}//${href[2]}/${href[3]}`;
let endpoint = url + `/phpActions/selectEvento.php`;

fetch(endpoint)
.then((res)=> res.json())
.then((evento)=>{
    if(evento.length > 1){
        evento.map((foto)=>{
            carroselEvento.innerHTML += `<swiper-slide><img style='border-radius:5px' src='imagens/evento/${foto}' alt='evento foto'></swiper-slide>`;
        })
    }else{
        carroselEvento.innerHTML += `<swiper-slide><img style='border-radius:5px' src='imagens/evento/${evento}' alt='evento foto'></swiper-slide>`;
    }
});