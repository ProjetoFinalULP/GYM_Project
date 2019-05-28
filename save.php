<?php

    session_start();

    include 'config.inc';
    include 'email.php';

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

        $enviarMail = new emailSend($name1, $name2, $email, $rndmpass, $username);
        $enviarMail->sendMail();

        header("Location: landingpage.php");

    break;

    case 2:

        $user = $_SESSION['user'];
        $name1 = $_POST['nome'];
        $name2 = $_POST['apelido'];
        $email = $_POST['email'];
        $phone = $_POST['telefone'];
        $pass = $_POST['password'];

        $password = hash('sha256', $pass);

        $sql_user = "UPDATE user SET firstName = '$name1', lastName = '$name2', phoneNumber = '$phone', email = '$email'
                  WHERE username = '$user'";
        $result_user = mysqli_query($conn, $sql_user);

        $sql_login = "UPDATE login SET pass = '$password'
                      WHERE userUsername = '$user'";
        $result_login = mysqli_query($conn, $sql_login);

        header("Location: landingpage.php");

    break;

    }

?>