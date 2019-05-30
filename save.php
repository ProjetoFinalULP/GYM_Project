<?php

    session_start();

    include 'config.inc';
    include 'email.php';

    $s = $_GET[s];

    switch($s){

    case 1: //gera utilizador e password e envia dados por email

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

    case 2: //altera dados do utilizador e password

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

    case 3: //adiciona exercicios

        $exename = $_POST['exenome'];
        $descricao =$_POST['descricao'];
        $image1 = $_FILES['image1'];
        $image2 = $_FILES['image2'];
        $image3 = $_FILES['image3'];

        //imagem 1

        $imageName1 = $_FILES['image1']['name'];
        $imageTmpName1 = $_FILES['image1']['tmp_name'];

        $imageExt1 = explode('.', $imageName1);
        $imageActExt1 = strtolower(end($imageExt1));
        $imageActName1 = uniqid('', true) . "." . $imageActExt1;
        $target1 = 'images/'. $imageActName1;
        move_uploaded_file($imageTmpName1, $target1);

        //imagem 2

        $imageName2 = $_FILES['image2']['name'];
        $imageTmpName2 = $_FILES['image2']['tmp_name'];

        $imageExt2 = explode('.', $imageName2);
        $imageActExt2 = strtolower(end($imageExt2));
        $imageActName2 = uniqid('', true) . "." . $imageActExt2;
        $target2 = 'images/'. $imageActName2;
        move_uploaded_file($imageTmpName2, $target2);

        //imagem 3

        $imageName3 = $_FILES['image3']['name'];
        $imageTmpName3 = $_FILES['image3']['tmp_name'];

        $imageExt3 = explode('.', $imageName3);
        $imageActExt3 = strtolower(end($imageExt3));
        $imageActName3 = uniqid('', true) . "." . $imageActExt3;
        $target3 = 'images/'. $imageActName3;
        move_uploaded_file($imageTmpName3, $target3);

        $sql_ie = "INSERT INTO exercise (description, content, photo1, photo2, photo3, active, userCreation, dateCreation) VALUES ('$exename', '$descricao', '$imageActName1', '$imageActName2', '$imageActName3', 1, 'SYSTM', now())";
        $result_ie = mysqli_query($conn, $sql_ie);

        header("Location: exever.php");

    break;

    
    }

?>