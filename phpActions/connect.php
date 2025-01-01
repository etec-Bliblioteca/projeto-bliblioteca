<?php 
// BANCO DE DADOS DO USUARIO
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbName = "biblioteca";
    $connect;
    $connect = mysqli_connect($host,$username,$password,$dbName);

    if(mysqli_connect_error()){
        echo "Erro ao Conectar!";
    }else{
        // echo "Conectado com Sucesso!";
    }
?>