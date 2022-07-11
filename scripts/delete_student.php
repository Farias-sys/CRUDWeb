<?php

require_once('db.php');
$conn = conectarDB();

$num_register = $_POST['value'];

$data_del = mysqli_query($conn, "DELETE FROM alunos WHERE num_register=$num_register");

/* Confirm exclusion */

$check = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM alunos WHERE num_register=$num_register"));

if($check==0){
    echo"O aluno de matrícula ".$num_register." teve seu registro removido.";
}

?>