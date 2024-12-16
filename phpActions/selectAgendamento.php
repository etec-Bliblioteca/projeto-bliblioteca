<?php
require_once('connect.php');


//DELETANDO O AGENDAMENTO AO COMFIRMAR A ENTREGA
if (isset($_POST['btnEntregar'])) {
    $numRM = $_POST['numRM'];
    $idRevista = $_POST['idRevista'];
    $deletar = "DELETE FROM agendamento WHERE rm = $numRM and id_revista = $idRevista";
    $result = mysqli_query($connect, $deletar);
    //ADICIONAR O VALOR DA REVISTA
    $query = "SELECT quantidade FROM revista WHERE id_revista = $idRevista";
    $result = mysqli_query($connect, $query);
    var_dump($result);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
            $revistaQtdeAdd = $row['quantidade'] + 1;
            echo $revistaQtdeAdd;
            $sqlAddQtde = "UPDATE revista SET quantidade=$revistaQtdeAdd";
            $result = mysqli_query($connect, $sqlAddQtde);
    }
    

    header("Location: admin.php");
}

//ADICIONANDO MAIS UMA SEMANA A DATA PARA DEVOLVER
if (isset($_POST['btnAdiar'])) {
    $numRM = $_POST['numRM'];
    $idRevista = $_POST['idRevista'];
    echo "NUMRM: " . $numRM;
    echo "idRevista: " . $idRevista;
    //SELECIONADO A DATA DE ENTREGA DE ACORDO COM O RM E A REVISTA
    $selecionarDtDevolver = "SELECT dt_devolver FROM agendamento WHERE rm = $numRM AND id_revista = $idRevista";
    $result = mysqli_query($connect, $selecionarDtDevolver);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $dtDevolverAgendamento = $row['dt_devolver'];
            $dtDevolverNova = date("Y/m/d", strtotime($dtDevolverAgendamento . "+ 1 week")); 
            $query = "UPDATE agendamento SET dt_devolver='$dtDevolverNova' WHERE rm = $numRM AND id_revista = $idRevista";
            $resultado = mysqli_query($connect,$query);
            if($resultado){
                header("Location: admin.php");
            }
            
        }
    }
}

$dtAtual = date("Y/m/d");
$query = "SELECT users.nome,agendamento.rm,users.turma,revista.titulo,agendamento.dt_devolver,users.telefone,agendamento.id_revista FROM agendamento INNER JOIN users
ON agendamento.rm = users.rm INNER JOIN revista 
ON agendamento.id_revista = revista.id_revista 
WHERE agendamento.rm = users.rm AND agendamento.id_revista = revista.id_revista AND agendamento.estado = true";
$result  = mysqli_query($connect, $query);


function createAtual()
{
    global $query, $connect, $dtAtual, $result;
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // VERIFICAR SE A DATA DE ENTREGA E A DATA ATUAL 
            $dtDevolver = $row['dt_devolver'];
            if (strtotime($dtAtual) < strtotime($dtDevolver)) {
?>
                <div class="cardAgd">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <h1><?php echo $row['nome'] ?></h1>
                        <p>RM: <?php echo $row['rm'] ?></p>
                        <p>Turma: <?php echo $row['turma'] ?></p>
                        <p>Revista: <?php echo $row['titulo'] ?></p>
                        <p>Data para Devolver: <?php echo date("d/m/Y" ,strtotime($dtDevolver)) ?></p>
                        <input type="num" value="<?php echo $row['rm'] ?>" id="numRM" name="numRM" hidden>
                        <input type="tel" value="<?php echo $row['telefone'] ?>" id="txtTel" name="txtTel" hidden>
                        <input type="num" value="<?php echo $row['id_revista'] ?>" id="idRevista" name="idRevista" hidden>
                        <div class="btnAgd">
                            <button type="submit" class="btnEntregar" name="btnEntregar">Comfirmar</button>
                            <button type="submit" class="btnAdiar" name="btnAdiar">
                                Adiar
                            </button>
                            <button type="submit" class="btnChamar" name="btnChamar">
                                Chamar
                            </button>
                        </div>
                    </form>
                </div>
            <?php
            }
        }
    }
}

function createVencido()
{
    global $query, $connect, $dtAtual, $result;
    $result  = mysqli_query($connect, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            // VERIFICAR SE A DATA DE ENTREGA E A DATA ATUAL
            $dtDevolver = $row['dt_devolver'];
            if (strtotime($dtAtual) >= strtotime($dtDevolver)) {
            ?>
                <div class="cardAgd">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        <h1><?php echo $row['nome'] ?></h1>
                        <p>RM: <?php echo $row['rm'] ?></p>
                        <p>Turma: <?php echo $row['turma'] ?></p>
                        <p>Revista: <?php echo $row['titulo'] ?></p>
                        <p>Data para Devolver: <?php echo date("d/m/Y" ,strtotime($dtDevolver)) ?></p>
                        <input type="num" value="<?php echo $row['rm'] ?>" id="numRM" name="numRM" hidden>
                        <input type="tel" value="<?php echo $row['telefone'] ?>" id="txtTel" name="txtTel" hidden>
                        <input type="num" value="<?php echo $row['id_revista'] ?>" id="idRevista" name="idRevista" hidden>
                        <div class="btnAgd">
                            <button type="submit" class="btnEntregar" name="btnEntregar">Comfirmar</button>
                            <button type="submit" class="btnAdiar" name="btnAdiar">
                                Adiar
                            </button>
                            <button type="submit" class="btnChamar" name="btnChamar">
                                Chamar
                            </button>
                        </div>
                    </form>
                </div>
<?php
            }
        }
    }
}
?>