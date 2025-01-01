<?php
require_once("connect.php");
session_start();
$revista = [];
//SELECIONANDO AS REVISTAS AGENDADAS
if (isset($_SESSION['user'])) {
    $user = json_decode($_SESSION['user'], true);
    $rm = $user['rm'];
    //SELECIONADO O AGENDAMENTO
    $query = "SELECT revista.id_revista, revista.titulo AS nomeRevista,revista.tema AS revistaTema,revista.imagem AS revistaImg,revista.descricao AS revistaDesc FROM revista INNER JOIN agendamento ON revista.id_revista = agendamento.id_revista WHERE agendamento.rm = $rm";
    $result = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (empty($row['revistaImg'])) {
                //ADICIONA UMA IMAGEM PADRÃO PARA A REVISTA
                $row['revistaImg'] = "semImagem.png";
            }
            $revista[] = $row;
        }
    }

    echo json_encode($revista);
}
