<?php

function insertDataIntoDatabase(){

    require_once("db.php");
    $conn = conectarDB();

    if(isset($_POST['change-aluno'])){
        $name_student = $_POST['student-name'];
        $num_register = $_POST['num-register'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $class = $_POST['turma'];
        $cel = $_POST['cel'];
        
        $query = "UPDATE alunos SET class=$class, name=$name_student, cpf=$cpf, rg=$rg, cel=$cel WHERE num_register=$num_register";
        $status = mysqli_query($conn, $query);

        header("Location: http://localhost/crud.php");
        exit();
    }else if(isset($_POST['change-class'])){
        $class = $_POST['class-code'];
        $num_students = $_POST['num-students'];
        $date_start = $_POST['date-start'];
        $date_end = $_POST['date-end'];

        $query = "UPDATE turmas_informatica SET class_code=$class, number_students=$num_students, date_start=$date_start, date_end=$date_end WHERE class_code=$class";
        $status = mysqli_query($conn, $query);

        header("Location: http://localhost/crud.php");
        exit();
    }
}

insertDataIntoDatabase();

?>