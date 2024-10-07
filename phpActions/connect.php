<?php 
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbName = "users";

    $connect = mysqli_connect($host,$username,$password,$dbName);

    if(mysqli_connect_error()){
        echo "Erro ao Conectar!";
    }else{
        // echo "Conectado com Sucesso!";
    }
?>