<?php
if (isset($_POST['btnCadastrar'])) {
    session_start();
    require_once("connect.php");
    $txtNome = $_POST['txtNome'];
    $numRM = $_POST['numRM'];
    $slAno = $_POST['slAno'];
    $slTurma = $_POST['slTurma'];
    $slPeriodo = $_POST['slPeriodo'];
    $txtEmail = $_POST['txtEmail'];
    $numTel = $_POST['numTel'];
    $txtSenha = $_POST['txtSenha'];
    $txtSenha = md5($txtSenha);
    $txtTurma =  $slAno . " " . $slTurma . " " . $slPeriodo;

    $query = "INSERT INTO users (`rm`,`turma`,`nome`,`email`,`telefone`,`senha`,`estado`) VALUES ($numRM,'$txtTurma','$txtNome','$txtEmail',$numTel,'$txtSenha','inativo')";

    $result = mysqli_query($connect, $query);
    if ($result) {
        $_SESSION['icon'] = "success";
        $_SESSION['title'] = "CADASTRO REALIZADO!";
        $_SESSION['msg'] = "AGUARDE A LIBERAÇÂO NA BIBLIOTECA...";
        header("Location: ../login.php");
    }else{
        $_SESSION['icon'] = "error";
        $_SESSION['title'] = "ERRO AO CADASTRO!";
        $_SESSION['msg'] = "VERIFIQUE OS DADOS FORNECIDOS...";
        header("Location: ../login.php");
    }
}
?>