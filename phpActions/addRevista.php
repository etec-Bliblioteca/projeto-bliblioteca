<?php
require_once('connect.php');
session_start();
global $connect;

if (isset($_POST['btnCadastrar'])) {
    
    //PEGANDO OS DADOS
    $txtNomeRevista = $_POST['txtNomeRevista'];
    $txtDesc = $_POST['txtDesc'];
    $txtTema = $_POST['txtTema'];
    $numQTDE = $_POST['numQTDE'];

    echo $txtNomeRevista . "<br>";
    echo $txtDesc . "<br>";
    echo $txtTema . "<br>";
    echo $numQTDE . "<br>";

    //PEGANDO A IMAGEM
    //PEGANDO O NOME DO ARQUIVO
    if($_FILES['imgCapa']['name'] != ''){
        $img = $_FILES['imgCapa']['name'];
        //FORMATOS PERMITIDOS
        $fmtPermitidos = ["png", "jpeg", "jpg"];
        //PEGANDO O FORMATO DO ARQUIVO ENVIADO
        $fmt = pathinfo($img, PATHINFO_EXTENSION);
        $nomeImg = uniqid() . ".$fmt"; //PEGA UM ID UNICO 
    }else{
        $nomeImg = 'semImagem.png';
    }
 
    // INSERINDO A REVISTA
    $query = "INSERT INTO revista (titulo,descricao,tema,quantidade,imagem) VALUES ('$txtNomeRevista','$txtDesc','$txtTema',$numQTDE,'$nomeImg')";

    //SALVANDO NO BANCO DE DADOS
    $result = mysqli_query($connect, $query);
    if ($result) {
        //SALVANDO A ARQUIVO FOTO NA PASTA
        if($_FILES['imgCapa']['name'] != ''){
            if (in_array($fmt, $fmtPermitidos)) {
                $pasta = "../imagens/"; //PASTA DE DESTINO
                $tmp = $_FILES['imgCapa']['tmp_name']; //PASTA ATUAL DO ARQUIVO
                //CRIA UMA COPIA DO ARQUIVO EM UMA PASTA ESCOLHIDA
                if(move_uploaded_file($tmp, $pasta . $nomeImg)){
                    $_SESSION['msg'] = "REVISTA ADICIONADA COM SUCESSO";
                    header("Location: ../adicionar.html");
                }
            }
        }
    }else{
        $_SESSION['msg'] = "ERRO AO CADASTRAR REVISTA!";
    }
}

?>