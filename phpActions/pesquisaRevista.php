<?php 
    require_once('connect.php');
    $dados = [];
    $pesq = $_GET['pesq'];

    $query = "SELECT * FROM revista WHERE titulo LIKE '%$pesq%'";

    $result = mysqli_query($connect,$query);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            if (empty($row['imagem'])) {
                //ADICIONA UMA IMAGEM PADRÃO PARA A REVISTA
                $row['imagem'] = "semImagem.png";
            }
            $dados[] = $row;
        }
        echo json_encode($dados);
        mysqli_close($connect);
        die();
    }else{
        echo "<h1>NADA ESNCONTRADO</h1>";
    }
  
?>


