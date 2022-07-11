<?php
$login = $_POST['login'];
$password = md5($_POST['password']);
$submit = $_POST['submit'];
require_once("db.php");
$conn = conectarLogin();

if(isset($submit)){
    $check = mysqli_query($conn,"SELECT * FROM active_users WHERE login = '$login' AND password = '$password'") or die("Erro ao consultar base de dados, contate o administrador do sistema através de cafsalgadojr@gmail.com");
    $match_conn = mysqli_fetch_assoc($check);
    if (mysqli_num_rows($check)<=0){
        die();
    }
    else{
        setcookie("login", $login);
        header("Location: http://localhost/crud.php");
        exit();
    }
}


?>