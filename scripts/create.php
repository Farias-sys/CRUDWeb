<?php

function insertDataIntoDatabase(){

    require_once("db.php");
    $conn = conectarDB();

    if(isset($_POST['submit-alunos'])){
        $name_student = $_POST['student-name'];
        $cpf = $_POST['cpf'];
        $rg = $_POST['rg'];
        $class = $_POST['turma'];
        $cel = $_POST['cel'];

        $query = "INSERT INTO alunos (class, name, cpf, rg, cel_aluno) VALUES ('$class','$name_student', '$cpf', '$cel', '$rg')";
        $status = mysqli_query($conn, $query);

        header("Location: http://localhost/crud.php");
        exit();
    }else if(isset($_POST['submit-turmas'])){
        $class = $_POST['class-code'];
        $teacher = $_POST['teacher'];
        $num_students = $_POST['num-students'];
        $date_start = $_POST['date-start'];
        $date_end = $_POST['date-end'];

        $query = "INSERT INTO turmas_informatica VALUES ('$class','$teacher', '$num_students', '$date_start', '$date_end')";
        $status = mysqli_query($conn, $query);

        header("Location: http://localhost/crud.php");
        exit();
    }else{
        header("Location: http://localhost/crud.php");
        exit();
    }
}

insertDataIntoDatabase();

?>