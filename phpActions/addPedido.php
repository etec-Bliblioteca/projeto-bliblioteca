<?php
$msg = ["title"=>"","msg"=>"","icon"=>""];
session_start();
require_once('connect.php');
    if (isset($_SESSION['user'])) {
        //PEGANDO OS DADOS DO USUARIO LOGADO
        $dadosUser = json_decode($_SESSION['user'], true);
        $rm = $dadosUser['rm'];
        $id_revista = $_GET['idRevista'];
        $qtderevista = $_GET['qtdeRevista'];
        $dtHoje = date("Y/m/d");
        $dtPegar = date("Y/m/d", strtotime($dtHoje . "+ 2 day"));
        $dtDevolver = date("Y/m/d", strtotime($dtPegar . "+ 1 week"));

        //VERIFICANDO SE A REVISTA JÁ ESTA AGENDA PELO USER 
        $query = "SELECT rm,id_revista FROM agendamento WHERE  rm=$rm AND id_revista = $id_revista";
        $result = mysqli_query($connect,$query);
        if(mysqli_num_rows($result) > 0){
            $msg["title"] = "ALERTA"; 
            $msg["icon"] = "warning";  
            $msg["msg"] = "ESTA REVISTA JÁ FOI AGENDADA POR VOCÊ!";  
            echo json_encode($msg);   
        }else{

        //INSERINDO UM NOVO AGENDAMENTO NO AGENDAMENTOS
        $query = "INSERT INTO agendamento (rm,id_revista,dt_devolver,dt_pegar,estado) VALUES ($rm,$id_revista,'$dtDevolver','$dtPegar','false')";

        $result = mysqli_query($connect,$query);
        if($result){
            //ATUALIZANDO A QUANTIDADE DE REVISTAS E MANDANDO O ALERTA
            $query = "UPDATE revista SET quantidade=$qtderevista WHERE id_revista=$id_revista";
            $result = mysqli_query($connect,$query);

            //VERIFICANDO SE ATUALIZOU
            if($result){
                $msg["icon"] = "success";  
                $msg["title"] = "SUCESSO!";  
                $msg["msg"] = "Revista Agendada, vai lá pegar!";        
            }
        }else{
            //EXBIBINDO MENSSAGEM DE ERRO
            $msg["title"] = "ERRO";  
            $msg["icon"] = "error";  
            $msg["msg"] = "OPS, ALGO DEU ERRADO, SORRY!";  
        }

        echo json_encode($msg);   
        mysqli_close($connect);
        }
    }else{        
        $msg["title"] = "ALERTA";  
        $msg["icon"] = "error";
        $msg["msg"] = "SEU LOGIN EXPIROU OU NÂO EXISTE!";  
        echo json_encode($msg);   
    } 

?> 