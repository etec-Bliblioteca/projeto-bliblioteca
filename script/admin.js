const btnChamar = [...document.querySelectorAll('.btnChamar')];

btnChamar.map((btn)=>{
    btn.addEventListener("click",()=>{
        let txtTel = btn.parentElement.previousSibling.previousSibling.value;

        let nomeAluno = btn.parentElement.parentElement.firstElementChild.innerHTML;
        
        let msg = `*Aviso Etec*: Olá ${nomeAluno} estamos entrando em contato para dizer que sua Revista está preste a vencer. Pedimos que entregue na bliblioteca da escola ou adie a entrega`;

        let url = new String(
            `https://api.whatsapp.com/send?phone=55${txtTel}&text=${msg}`
        );

        window.open(url,"_blank");
    });
});