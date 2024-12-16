<?php
session_start();
require_once('connect.php');

// FUNÇÃO PARA FAZER AS CHECAGENS NECESSARIAS
function checagens($txtEmail, $txtSenha)
{
    global $connect;
    $query = "SELECT rm,email,senha,estado,nivel FROM users WHERE email = '$txtEmail'";

    // EXECUTA A QUERY
    $result = mysqli_query($connect, $query);
    //PEGA O ARRAY RETORNADO E PASSA PARA UM OUTRO ARRAY
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $dados = $row;
        }
    }


    //VERIFICA SE HOUVE UM RETORNO
    if (mysqli_num_rows($result) > 0) {
        //VERIFICA SE A SENHA DO USUARIO E A MESMA DIGITADA
        if ($dados['estado'] == "ativo") {
            if ($dados['senha'] == $txtSenha) {
                date_default_timezone_set('America/Sao_Paulo');
                $jsonDados =  json_encode($dados);
                $expiracao = time() + 86400; //HORA ATUAL + 24 HORAS
                // $expiracao = time() + 30;//UM MINUTO
                $_SESSION['user'] = $jsonDados;
                $_SESSION['exp'] = $expiracao;
                $_SESSION['nivel'] = $dados['nivel'];
                //ENVIA PARA PÁGINA INICIAL OU DE ADMINISTRADOR
                if ($dados['nivel'] == 0) {
                    header("Location: ../index.php");
                } else {
                    header("Location: ../admin.php");
                }
            } else {
                $_SESSION['icon'] = "error";
                $_SESSION['title'] = "ERRO AO ENTRAR!";
                $_SESSION['msg'] = "SENHA ERRADA, TENTE NOVAMENTE!";
                header("Location: ../login.php");
            }
        } else {
            $_SESSION['icon'] = "error";
            $_SESSION['title'] = "PERFIL INATIVO!";
            $_SESSION['msg'] = "AGUARDE A LIBERAÇÂO NA BIBLIOTECA!";
            header("Location: ../login.php");
        }
    }else{
        $_SESSION['icon'] = "error";
        $_SESSION['title'] = "ERRO AO ENTRAR!";
        $_SESSION['msg'] = "EMAIL NÃO ENCONTRADO!";
        header("Location: ../login.php");
    }

    mysqli_close($connect);
}

// FUNÇÃO PARA LIMPAR OS CAMPOS
function limpar($campo)
{
    global $connect;
    $campoLimpo = mysqli_escape_string($connect, $campo);
    $campoLimpo = htmlspecialchars($campo);
    return $campoLimpo;
}

if (isset($_POST['btnLogar'])) {
    $dados = [];
    $txtEmail = $_POST['txtEmail'];
    $txtSenha = $_POST['txtSenha'];
    echo $txtEmail . "<br/>";
    echo $txtSenha . "<br/>";
    $txtSenha = limpar($txtSenha);
    $txtEmail = limpar($txtEmail);
    $txtSenha = md5($txtSenha);
    $result = checagens($txtEmail, $txtSenha);
}
