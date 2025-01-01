<?php
require_once('connect.php');
$foto = [];
$query = "SELECT foto FROM evento ORDER BY id_evento DESC LIMIT 3";

$result = mysqli_query($connect, $query);
if($result){
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $foto[] = $row['foto'];
        }
    }
    echo json_encode($foto);
}

mysqli_close($connect);


