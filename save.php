<?php

    include 'config.inc';

    $s = $_GET[s];

    switch($s){

    case 1:

    $name1 = $_POST['nome'];
    $name2 = $_POST['apelido'];
    $email = $_POST['email'];
    $phone = $_POST['telefone'];


    $username = strtoupper(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5));

    $rndmpass = strtoupper(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8));

    $password = hash('sha256', $rndmpass);

    
    $sql_i = "INSERT INTO user (username, firstName, lastName, phoneNumber, email, accessId, userCreation, dateCreation)
                              VALUES ('$username', '$name1', '$name2', '$phone', '$email', 1, 'SYSTM', now())";
    $result_i = mysqli_query($conn, $sql_i);

    $sql_login = "INSERT INTO login (userUsername, pass, userCreation, dateCreation) VALUES ('$username', '$password', 'SYSTM', now())";
    $result_login = mysqli_query($conn, $sql_login);

    header("Location: index.php");

    break;

    }

?>