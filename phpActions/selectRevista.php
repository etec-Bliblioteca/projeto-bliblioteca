<?php
require_once("connect.php");
session_start();
$dados = [
    'revistas' => [],
    'numPages' => 0,
    'currentPage' => 1,
];

$totalRevistaQuery = "SELECT COUNT(*) AS totalRevista FROM revista";
$totalRevistaCount = mysqli_query($connect, $totalRevistaQuery);
$totalRevista = mysqli_fetch_assoc($totalRevistaCount);
$totalRevista = $totalRevista['totalRevista'];

$limit = $_GET['limit']; //NUMERO DE REVISTAS POR  PÁGINA
// $paginaAtual = $_GET['page'];
$paginaAtual =  $_GET['page'];
$offset = ($paginaAtual - 1) * $limit; //CALCULA QUAL PÁGINA ESTAMOS
$numPages = ceil($totalRevista / $limit); // DIFINE QUANTAS PÁGINAS VAMOS PRECISAR
$query = "SELECT id_revista,titulo,descricao,tema,quantidade,imagem FROM revista order by id_revista DESC LIMIT {$limit} OFFSET {$offset}";
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        //VERIFICA SE POSSUI IMAGEM
        if (empty($row['imagem'])) {
            //ADICIONA UMA IMAGEM PADRÃO PARA A REVISTA
            $row['imagem'] = "semImagem.png";
        }

        if(empty($row['descricao'])){
            $row['descricao'] = "Sem descrição...";
        }

        
        if(empty($row['tema'])){
            $row['tema'] = "Sem tema";
        }
        $dados['revistas'][] = $row;
    }
}
$dados['numPages'] = $numPages; // PASSA O NUMERO DE PAGINAS
$dados['paginaAtual'] = $paginaAtual; //PASSA A PARINA ATUAL
echo json_encode($dados);
mysqli_close($connect);
