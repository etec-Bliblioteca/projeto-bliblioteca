
const containerCard = document.querySelector('#cards');
const btnPrev = document.getElementById('btnPrev');
const btnNext = document.getElementById('btnNext');
const card = [...document.querySelectorAll('.card')];

id=1;



function construir() {
    containerCard.innerHTML += `
        <div class="card">
            <div class="livro">${id}</div>
        </div>        
    `;

    id++;
}

for(i=0; i<5;i++){
    construir();
}

function focar(){
   containerCard.children[2].firstElementChild.classList.toggle('focar')
}

function acharElementos(){
    let cardPrevious = containerCard.children[2].previousElementSibling;
    let cardNext = containerCard.children[2].nextElementSibling;

    cardNext.classList.remove('focar')
    cardPrevious.classList.remove('focar')
    return [cardPrevious,cardNext];
}

function sumir(){
    let elem = acharElementos();
    elem[0].previousElementSibling.classList.add('sumir')
    elem[1].nextElementSibling.classList.add('sumir')

}

function aparecer(){
    let elem = acharElementos();
    elem[0].classList.remove('sumir')
    elem[1].classList.remove('sumir')
}



function moverNext(){

    focar();

    acharElementos();

    const primeElem = containerCard.firstElementChild;
    containerCard.firstElementChild.remove();
    containerCard.appendChild(primeElem)
    sumir();
    aparecer();
    focar();
}

function moverPrev(){
    focar();
    acharElementos();
    const primeElem = containerCard.firstElementChild;
    const lastElem = containerCard.lastElementChild;
    containerCard.lastElementChild.remove();
    containerCard.insertBefore(lastElem,primeElem);
    aparecer();
    sumir();
    focar()
}
btnPrev.addEventListener('click', moverPrev);

btnPrev.addEventListener('mouseover',()=>{
    let img = btnPrev.firstElementChild;
    img.src = 'icones/seta-esquerda-colorida.png'
});

btnPrev.addEventListener('mouseleave',()=>{
    let img = btnPrev.firstElementChild;
    img.src = 'icones/seta-esqueda.png'
});

btnNext.addEventListener('click',moverNext);

btnNext.addEventListener('mouseover',()=>{
    let img = btnNext.firstElementChild;
    img.src = 'icones/seta-direita-colorida.png'
});

btnNext.addEventListener('mouseleave',()=>{
    let img = btnNext.firstElementChild;
    img.src = 'icones/seta-direita.png'
});

let intervalo = setInterval(()=>{
    moverNext();
},3000);

focar();
sumir();

