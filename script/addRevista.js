// JAVASCRIPT PARA EFEITO DE PREVIEW EM IMAGEM 

const inputImgCapa = document.getElementById("imgCapa");
const imgCapaPreview = document.getElementById("imgCapaPreview");
const campoImgPreview = document.getElementById("campoImgPreview");
inputImgCapa.addEventListener("change",(event)=>{
    // imgCapaPreview.src = URL.createObjectURL(event.target.files[0]);
    campoImgPreview.style.backgroundImage = `URL(${URL.createObjectURL(event.target.files[0])})`;
    URL.revokeObjectURL(campoImgPreview.style.backgroundImage);
});