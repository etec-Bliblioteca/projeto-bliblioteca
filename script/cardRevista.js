class Revista{
    constructor(id,titulo,desc,tema,qtde,img){
        this.id = `revista_${id}`;
        this.titulo = titulo;
        this.descricao = desc;
        this.tema = tema;
        this.quantidade = qtde;
        this.imagem = img;
    }

    createRevista = () => {
        const divContainerCard = document.createElement('div');
        divContainerCard.setAttribute('class','containerCard');
        divContainerCard.setAttribute('id',`${this.id}`);

        const cardImg = document.createElement('div');
        cardImg.setAttribute('class',"cardImg");

        const img = document.createElement('img');
        img.src = `imagens/${this.imagem}`;
        cardImg.appendChild(img);

        divContainerCard.appendChild(cardImg);

        const catalogo = document.getElementById('catalogo');
        catalogo.appendChild(divContainerCard);
    }
}

export default Revista;