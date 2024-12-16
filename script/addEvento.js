// JAVASCRIPT PARA EFEITO DE PREVIEW EM IMAGEM 

const inputImgEvento = document.getElementById("imgEvento");
const imgEventoPreview = document.getElementById("imgEventoPreview");
const campoImgPreviewEvento = document.getElementById("campoImgPreviewEvento");
inputImgEvento.addEventListener("change",(event)=>{
    // imgCapaPreview.src = URL.createObjectURL(event.target.files[0]);
    campoImgPreviewEvento.style.backgroundImage = `URL(${URL.createObjectURL(event.target.files[0])})`;
    URL.revokeObjectURL(campoImgPreviewEvento.style.backgroundImage);
});