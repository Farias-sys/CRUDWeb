<?php

function conectarLogin(){
    $host = "127.0.0.1";
    $db = "users";
    $user = "root";
    $pass = "";

    $conn = mysqli_connect("$host", "$user", "$pass", "$db") or die ("Houve um problema ao se conectar com o servidor");
    return $conn;
}
function conectarDB(){
    $host = "127.0.0.1";
    $db = "curso_informatica";
    $user = "root";
    $pass = "";

    $conn = mysqli_connect("$host", "$user", "$pass", "$db") or die ("Houve um problema ao se conectar com o servidor");
    return $conn;
}

?>