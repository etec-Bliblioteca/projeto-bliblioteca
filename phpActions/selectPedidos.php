<?php

require_once("connect.php");
date_default_timezone_set('America/Sao_Paulo');

//CONFIRMAR ENTREGA DA REVISTA
if (isset($_POST['btnEntrega'])) {
  $idAgendamento = $_POST['idAgendamento'];

  $query = "UPDATE agendamento SET estado=true WHERE id_agen=$idAgendamento";

  $result = mysqli_query($connect, $query);
}

//CANCELAR ENTREGA DA REVISTA
if (isset($_POST['btnCancelar'])) {
  $idAgendamento = $_POST['idAgendamento'];
  //PEGA O ID DA REVISTA e seleciona a quantidade
  $query = "SELECT quantidade FROM revista WHERE id_revista = (SELECT id_revista FROM agendamento WHERE id_agen=$idAgendamento)";
  $result = mysqli_query($connect, $query);
  $qtdeRevista = mysqli_fetch_assoc($result);
  //ALTERA A QUANTIDADE DE REVISTAS 
  if($qtdeRevista){
    $qtde = $qtdeRevista['quantidade'] + 1;
    //DELETA O AENDAMENTO ATUAL
    $query = "UPDATE revista SET quantidade=$qtde where id_revista=(SELECT id_revista FROM agendamento WHERE id_agen=$idAgendamento)";
    $result = mysqli_query($connect, $query);
    $query = "DELETE FROM agendamento WHERE id_agen = $idAgendamento";
    $result = mysqli_query($connect, $query);
  }
}

// QUERY PARA SELECIONAR OS AENDAMENTOS COM ESTADO FALSO
$query = "SELECT agendamento.id_agen,users.nome,users.rm,agendamento.dt_pegar,users.turma,revista.titulo,revista.imagem FROM agendamento INNER JOIN users
    ON agendamento.rm = users.rm INNER JOIN revista 
    ON agendamento.id_revista = revista.id_revista 
    WHERE agendamento.rm = users.rm AND agendamento.id_revista = revista.id_revista AND agendamento.estado = false";

$result = mysqli_query($connect, $query);
// var_dump($result);
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_array($result)) {
    $idAgendamento = $row['id_agen'];
    $nome = $row['nome'];
    $rm = $row['rm'];
    $dt_pegar = $row['dt_pegar'];
    $turma = $row['turma'];
    $tituloRevista = $row['titulo'];
    $revistaImagem = $row['imagem'];
?>
    <div class="cardPedido">
      <img src="imagens/<?php echo $revistaImagem ?>" alt="foto">
      <div class="pedidoInfo">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
          <input type="num" name="idAgendamento" id="idAgendamento" value="<?php echo $idAgendamento ?>" hidden>
          <h1><?php echo $nome ?></h1>
          <p>Turma: <?php echo $turma ?> </p>
          <p>Data para pegar: <?php echo date("d/m/Y", strtotime($dt_pegar)) ?></p>
          <p>Revista: <?php echo $tituloRevista ?></p>
          <div class="cardBtns">
            <button class="btnEntrega" type="submit" name="btnEntrega">Confirmar Entrega</button>
            <button class="btnCancelar" type="submit" name="btnCancelar">Cancelar</button>
          </div>
        </form>
      </div>
    </div>
<?php
  }
} else {
  echo "<h1>SEM PEDIDOS</h1>";
}
?>