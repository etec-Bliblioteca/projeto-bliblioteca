<?php 
require_once("connect.php");
//ADICIONA REVISTA DE EVENTO
if(isset($_POST['btnCadastrar'])){
    if($_FILES['imgEvento']['name'] != ''){
        $img = $_FILES['imgEvento']['name'];
        //FORMATOS PERMITIDOS
        $fmtPermitidos = ["png", "jpeg", "jpg"];
        //PEGANDO O FORMATO DO ARQUIVO ENVIADO
        $fmt = pathinfo($img, PATHINFO_EXTENSION);
        $nomeImg = uniqid() . ".$fmt";
        $query = "INSERT INTO evento (foto) VALUES ('$nomeImg')";
        $result = mysqli_query($connect,$query);
        if($result){
            if (in_array($fmt, $fmtPermitidos)) {
                $pasta = "../imagens/evento/"; //PASTA DE DESTINO
                $tmp = $_FILES['imgEvento']['tmp_name']; //PASTA ATUAL DO ARQUIVO
                //CRIA UMA COPIA DO ARQUIVO EM UMA PASTA ESCOLHIDA
                if(move_uploaded_file($tmp, $pasta . $nomeImg)){
                    $_SESSION['msg'] = "EVENTO ADICIONADO COM SUCESSO";
                    header("Location: ../adicionar.html");
                }
            }
        }
    }
}

mysqli_close($connect);


?>