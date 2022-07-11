<?php

require_once('db.php');
$conn = conectarDB();

$class_code = $_POST['value'];

$data_del = mysqli_query($conn, "DELETE FROM turmas_informatica WHERE class_code=$class_code");

/* Confirm exclusion */

$check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM turmas_informatica WHERE class_code=$class_code"));

if($check==0){
    echo"A turma de código ".$class_code." teve seu registro removido.";
}


?>