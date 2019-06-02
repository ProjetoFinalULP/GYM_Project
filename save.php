<?php

    session_start();

    include 'config.inc';
    include 'email.php';

    $s = $_GET[s];
    echo $s;

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

    case 3: //adiciona e exercicios

        $exename = $_POST['exenome'];
        $descricao = $_POST['descricao'];
        $image1 = $_FILES['image1'];
        $image2 = $_FILES['image2'];
        $image3 = $_FILES['image3'];
        $allowed = array('jpg','jpeg','png');
    
        //imagem 1
        $imageName1 = $_FILES['image1']['name'];
        $imageTmpName1 = $_FILES['image1']['tmp_name'];
    
        $imageExt1 = explode('.', $imageName1);
        $imageActExt1 = strtolower(end($imageExt1));
    
        if (in_array($imageActExt1, $allowed)) {
            $imageActName1 = uniqid('', true) . "." . $imageActExt1;
            $target = 'images/img_exe/'. $imageActName1;
            move_uploaded_file($imageTmpName1, $target);
        }else{
            $imageActName1 = "NULL1";
        }
    
        //imagem 2
        $imageName2 = $_FILES['image2']['name'];
        $imageTmpName2 = $_FILES['image2']['tmp_name'];
    
        $imageExt2 = explode('.', $imageName2);
        $imageActExt2 = strtolower(end($imageExt2));
    
        if (in_array($imageActExt2, $allowed)) {
            $imageActName2 = uniqid('', true) . "." . $imageActExt2;
            $target = 'images/img_exe/'. $imageActName2;
            move_uploaded_file($imageTmpName2, $target);
        }else{
            $imageActName2 = "NULL2";
        }
    
        //imagem 3
        $imageName3 = $_FILES['image3']['name'];
        $imageTmpName3 = $_FILES['image3']['tmp_name'];
    
        $imageExt3 = explode('.', $imageName3);
        $imageActExt3 = strtolower(end($imageExt3));
    
        if (in_array($imageActExt3, $allowed)) {
            $imageActName3 = uniqid('', true) . "." . $imageActExt3;
            $target = 'images/img_exe/'. $imageActName3;
            move_uploaded_file($imageTmpName3, $target);
        }else{
            $imageActName3 = "NULL3";
        }
    
        $sql_e = "INSERT INTO exercise (description, content, photo1, photo2, photo3, active, userCreation, dateCreation) VALUES ('$exename', '$descricao', '$imageActName1', '$imageActName2', '$imageActName3', 1, 'SYSTM', now())";
        $result_e = mysqli_query($conn, $sql_e);
    
        header("Location: exever.php");

    break;

    case 4: //edit exercicio

        $var_value = $_POST['id_exe'];
        $exename = $_POST['exenome'];
        $descricao = $_POST['descricao'];
        $image1 = $_FILES['image1'];
        $image2 = $_FILES['image2'];
        $image3 = $_FILES['image3'];
        $allowed = array('jpg','jpeg','png');
        
        //imagem 1
        $imageName1 = $_FILES['image1']['name'];
        $imageTmpName1 = $_FILES['image1']['tmp_name'];
    
        $imageExt1 = explode('.', $imageName1);
        $imageActExt1 = strtolower(end($imageExt1));
    
        if (in_array($imageActExt1, $allowed)) {
            $imageActName1 = uniqid('', true) . "." . $imageActExt1;
            $target = 'images/img_exe/'. $imageActName1;
            move_uploaded_file($imageTmpName1, $target);
        }else{
            $sql_img1 = "SELECT photo1 FROM exercise WHERE id = '$var_value'";
            $result_img1 = mysqli_query($conn, $sql_img1);
            $row_img1 = mysqli_fetch_array($result_img1);
            $imageActName1 = $row_img1['photo1'];
        }
    
        //imagem 2
        $imageName2 = $_FILES['image2']['name'];
        $imageTmpName2 = $_FILES['image2']['tmp_name'];
    
        $imageExt2 = explode('.', $imageName2);
        $imageActExt2 = strtolower(end($imageExt2));
    
        if (in_array($imageActExt2, $allowed)) {
            $imageActName2 = uniqid('', true) . "." . $imageActExt2;
            $target = 'images/img_exe/'. $imageActName2;
            move_uploaded_file($imageTmpName2, $target);
        }else{
            $sql_img2 = "SELECT photo2 FROM exercise WHERE id = '$var_value'";
            $result_img2 = mysqli_query($conn, $sql_img2);
            $row_img2 = mysqli_fetch_array($result_img2);
            $imageActName2 = $row_img2['photo2'];
        }
    
        //imagem 3
        $imageName3 = $_FILES['image3']['name'];
        $imageTmpName3 = $_FILES['image3']['tmp_name'];
    
        $imageExt3 = explode('.', $imageName3);
        $imageActExt3 = strtolower(end($imageExt3));
    
        if (in_array($imageActExt3, $allowed)) {
            $imageActName3 = uniqid('', true) . "." . $imageActExt3;
            $target = 'images/img_exe/'. $imageActName3;
            move_uploaded_file($imageTmpName3, $target);
        }else{
            $sql_img3 = "SELECT photo3 FROM exercise WHERE id = '$var_value'";
            $result_img3 = mysqli_query($conn, $sql_img3);
            $row_img3 = mysqli_fetch_array($result_img3);
            $imageActName3 = $row_img3['photo3'];
        }
    

        $sql_eu= "UPDATE exercise SET description = '$exename', content = '$descricao', photo1 = '$imageActName1', photo2 = '$imageActName2', photo3 =  '$imageActName3' WHERE id = '$var_value'";
        $result_eu = mysqli_query($conn, $sql_eu);
   
        header("Location: exever.php");
        
    break;

    case 5:

        $user = $_SESSION['user'];

        $nome = $_POST['nome'];
        $apelido = $_POST['apelido'];
        $email = $_POST['email'];
        $phone = $_POST['telefone'];
        $access = $_POST['access'];

        $sql_u = "UPDATE user SET firstName = '$nome', lastName = '$apelido', email='$email', phoneNumber = '$phone', accessId = '$access'";
        $result_u = mysqli_query($conn, $sql_u);

        header("Location: manageusers.php");

    break;
    
    case 6: //adicionar plano alimentar

        
        $userid = $_POST['iduser'];
        $file = $_FILES['file'];
        $allowed = array('doc','pdf','docx');
        
        
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
    
        $fileExt = explode('.', $fileName);
        $fileActExt = strtolower(end($fileExt));
    
        if (in_array($fileActExt, $allowed)) {
            $fileActName = uniqid('', true) . "." . $fileActExt;
            $target = 'files/plan_alm/'. $fileActName;
            move_uploaded_file($fileTmpName, $target);
        }else{
            $fileActName = "Null";
        }
        $sql_alm = "INSERT INTO nutritionPlan (userUsername, doctorUsername, plan, status, userCreation, dateCreation) VALUES ('$userid', 'SYSTM', '$fileActName', Y, 'SYSTM', now())";
        $result_alm = mysqli_query($conn, $sql_alm);

        header("Location: index.php");

    break;

    }
    

?>