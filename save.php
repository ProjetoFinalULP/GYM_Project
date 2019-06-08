<?php

    session_start();
    
    include 'config.inc';
    include 'email.php';

    $s = $_GET[s];
    

    switch($s){

    case 1: //gera utilizador e password e envia dados por email
        $user = $_SESSION['user'];
        $name1 = $_POST['nome'];
        $name2 = $_POST['apelido'];
        $email = $_POST['email'];
        $phone = $_POST['telefone'];


        do{
            $username = strtoupper(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5));

            $sql_repeat = "SELECT username
                           FROM user
                           WHERE username = '$username'";
            $result_repeat = mysqli_query($conn, $sql_repeat);

            if(mysqli_num_rows($result_repeat) > 0){
                $flag = 1;
            }else{
                $flag = 0;
            }
        }while($flag == 1);


        $rndmpass = strtoupper(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8));

        $password = hash('sha256', $rndmpass);

        
        $sql_i = "INSERT INTO user (username, firstName, lastName, phoneNumber, email, accessId, userCreation, dateCreation)
                                VALUES ('$username', '$name1', '$name2', '$phone', '$email', 1, 'SYSTM', now())";
        $result_i = mysqli_query($conn, $sql_i);

        $sql_login = "INSERT INTO login (userUsername, pass, userCreation, dateCreation) VALUES ('$username', '$password', '$user', now())";
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

    case 3: //adiciona
        $userLogedIn = $_SESSION['user'];
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
    
        $sql_e = "INSERT INTO exercise (description, content, photo1, photo2, photo3, active, userCreation, dateCreation) VALUES ('$exename', '$descricao', '$imageActName1', '$imageActName2', '$imageActName3', 1, '$userLogedIn', now())";
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
        $userLogedIn = $_SESSION['user'];
        $userid = $_POST['iduser'];
        $file = $_FILES['file'];
        $allowed = array('pdf');
        
        
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
        $sql_uppalm="UPDATE nutritionPlan SET status = 'N' WHERE userUsername = '$userid' AND status='Y'";
        $result_uppalm = mysqli_query($conn, $sql_uppalm);

        $sql_alm = "INSERT INTO nutritionPlan (userUsername, doctorUsername, plan, status, userCreation, dateCreation) VALUES ('$userid', '$userLogedIn', '$fileActName', 'Y', '$userLogedIn', now())";
        $result_alm = mysqli_query($conn, $sql_alm);

        header("Location: landingpage.php");

    break;

    case 7: //criar avaliação
        $userLogedIn = $_SESSION['user'];
        $userid = $_POST['iduser'];
        $sexo = $_POST['sexo'];
        $idade = $_POST['idade'];
        $altura = $_POST['altura'];
        $peso = $_POST['peso'];
        $massagordap = $_POST['massagordap'];
        $massamagrakg = $_POST['massamagrakg'];
        $idademetabolica = $_POST['idademetabolica'];
        $aguacorpural = $_POST['aguacorpural'];
        $cintura = $_POST['cintura'];
        $anca = $_POST['anca'];
        $pescoco = $_POST['pescoco'];
        $ombro = $_POST['ombro'];
        $torax = $_POST['torax'];
        $abdomen = $_POST['abdomen'];
        $bracodireitocontraido = $_POST['bracodireitocontraido'];
        $bracodireitodescontraido = $_POST['bracodireitodescontraido'];
        $bracoesquerdocontraido = $_POST['bracoesquerdocontraido'];
        $bracoesquerdodescontraido = $_POST['bracoesquerdodescontraido'];
        $antebracoesquerdo = $_POST['antebracoesquerdo'];
        $antebracodireito = $_POST['antebracodireito'];
        $coxaesquerda = $_POST['coxaesquerda'];
        $coxadireira = $_POST['coxadireira'];
        $gemeoesquerdo = $_POST['gemeoesquerdo'];
        $gemeodireito = $_POST['gemeodireito'];

        //calcular IMC
        $a = $altura*$altura;
        $b = $peso/$a;
        $imc = round ($b);
        // calcular incice de cintura anca
        $ica = round($cintura/$anca);
        //calcuar massa gorda kg
        $c = $massagordap*$peso;
        $massagordakg = round($c/100);
        //calcuar massa magra %
        $d = $massamagrakg*100;
        $massamagrap = round($d/$peso);


        $sql_avf = "INSERT INTO physicalEvaluation (userUsername, sex, age, height, weight, trainerUsername, bodyFatPercent, bodyFatValue, leanBodyMassPercent, leanBodyMassValue, metabolicAge, bodyWater, imc, waistHipRatio, waistMeasure, hip, neck, shoulder, chest, abdomen, leftArmRelaxed, rightArmRelaxed, leftArmContracted, rightArmContracted, leftForearm, rightForearm ,leftThigh, rightThigh, leftCalf, rightCalf, status, userCreation, dateCreation) 
            VALUES ('$userid', '$sexo', '$idade', ' $altura', '$peso', ' $userLogedIn', ' $massagordap', '$massagordakg', '$massamagrap', '$massamagrakg', '$idademetabolica', '$aguacorpural', '$imc', '$ica', '$cintura', '$anca', '$pescoco', '$ombro', '$torax', '$abdomen', '$bracoesquerdodescontraido', '$bracodireitodescontraido', '$bracoesquerdocontraido', '$bracodireitocontraido', '$antebracoesquerdo', '$antebracodireito', '$coxaesquerda', '$coxadireira ', '$gemeoesquerdo', '$gemeodireito', 'Y', ' $userLogedIn', now())";
        $result_avf = mysqli_query($conn, $sql_avf);

        header("Location: landingpage.php");



    break;

    case 8: // criarplanofisica
        $userLogedIn = $_SESSION['user'];
        $iduser = $_POST['iduser'];

        $sql_update="UPDATE trainingPlan SET active = 'N' WHERE userUsername = '$iduser' AND active='Y'";
        $result_update = mysqli_query($conn, $sql_update);

        $sql_insert = "INSERT INTO trainingPlan (userUsername, active, userCreation, dateCreation) VALUES ('$iduser', 'Y', '$userLogedIn', now())";
        $result_insert = mysqli_query($conn, $sql_insert);
        
        header("Location: createtrainday.php?iduser=$iduser");
    break;

    case 9: // cirar plano dia
        $userLogedIn = $_SESSION['user'];
        $iduser = $_GET['iduser'];
        $musc = $_POST['criarmusc'];
        
        $sql_sele = "SELECT id FROM trainingPlan WHERE userUsername = '$iduser' AND active='Y'";
        $result_sele = mysqli_query($conn, $sql_sele);
        $row_sele = mysqli_fetch_array($result_sele);
        $idPlan = $row_sele['id'];


        $sql_insert = "INSERT INTO planDay (trainPlanId, userUsername, active, userCreation, dateCreation, dayName) VALUES ('$idPlan', '$iduser', 'Y', '$userLogedIn', now(), '$musc')";
        $result_insert = mysqli_query($conn, $sql_insert);




        header("Location: createtrainday.php?iduser=$iduser");

    break;

    case 10: //criar exercicios
        $userLogedIn = $_SESSION['user'];
        $exe = $_POST['exercicio'];
        $sets = $_POST['set'];
        $reps = $_POST['reps'];
        $idDay = $_GET['idDay'];
        $iduser = $_GET['iduser'];


        $sql_exe = "SELECT id FROM exercise WHERE description = '$exe'";
        $result_exe = mysqli_query($conn, $sql_exe);
        $row_exe = mysqli_fetch_array($result_exe);
        $idExe = $row_exe['id'];

        $sql_insert = "INSERT INTO planExercise (trainingDayId, exerciseId, numSets, numReps, active, userCreation, dateCreation, exeName) 
                        VALUES ('$idDay', '$idExe', '$sets', '$reps', 'Y', '$userLogedIn',now(), '$exe')";
        $result_insert = mysqli_query($conn, $sql_insert);

        header("Location: createtrainexe.php?iduser=$iduser&idDay=$idDay");

    break;

    case 11: // apagar ex dia
        $idDay = $_GET['idDay'];
        $iduser = $_GET['iduser'];
        $varname = $_GET['varname'];

        $sql_update="UPDATE planExercise SET active = 'N' WHERE id = '$varname'";
        $result_update = mysqli_query($conn, $sql_update);

        header("Location: createtrainexe.php?iduser=$iduser&idDay=$idDay");

    break;

    case 12:

        $user = $_SESSION['user'];
        $nome = $_POST['nome'];
        $capacidade = $_POST['capacidade'];

        $sql_i = "INSERT INTO classroom (description, capacity, userCreation, dateCreation)
                                VALUES ('$nome', '$capacidade', '$user', now())";
        $result_i = mysqli_query($conn, $sql_i);

        header("Location: salas.php");

    break;

    case 13:

        $user = $_SESSION['user'];
        $roomId = $_GET['id'];

        $sql_d = "UPDATE classroom SET active = 'N' WHERE id = '$roomId'";
        $result_d = mysqli_query($conn, $sql_d);
        
        header("Location: salas.php");

    break;

    case 14:

        $user = $_SESSION['user'];
        $roomId = $_GET['id'];

        $nome = $_POST['nome'];
        $capacidade = $_POST['capacidade'];

        $sql_u = "UPDATE classroom SET description = '$nome', capacity = '$capacidade' WHERE id = '$roomId'";
        $result_u = mysqli_query($conn, $sql_u);

        header("Location: salas.php");

    break;

    case 15:

        $user = $_SESSION['user'];

        $nome = $_POST['nome'];
        $sala = $_POST['sala'];
        $duracao = $_POST['duracao'];
        $intensidade = $_POST['intensidade'];

        $sql_i = "INSERT INTO class (description, classroomId, duration, intensityLevel, userCreation, dateCreation)
                                    VALUES ('$nome', '$sala', '$duracao', '$intensidade', '$user', now())";
        $result_i = mysqli_query($conn, $sql_i);

        header("Location: aulas.php");

    break;

    case 16:

        $user = $_SESSION['user'];
        $classId = $_GET['id'];

        $sql_u = "UPDATE class SET active = 'N' WHERE id = '$classId'";
        $result_u = mysqli_query($conn, $sql_u);

        header("Location: aulas.php");

    break;

    case 17:

        $user = $_SESSION['user'];
        $classId = $_GET['id'];

        $nome = $_POST['nome'];
        $sala = $_POST['sala'];
        $duracao = $_POST['duracao'];
        $intensidade = $_POST['intensidade'];

        $sql_u = "UPDATE class SET description = '$nome', classroomId = '$sala', duration = '$duracao', intensityLevel = '$intensidade'
                  WHERE id = '$classId'";
        $result_u = mysqli_query($conn, $sql_u);

        header("Location: aulas.php");

    break;

    case 18:

        $user = $_SESSION['user'];

        $aula = $_POST['aula'];
        //$dataInicio = $_POST['dataInicio'];
        //$dataFim = $_POST['dataFim'];
        $hora = $_POST['hora'];
        $minutos = $_POST['minutos'];

        $dataInicio = '2019-06-01';
        $dataFim = '2019-09-01';

        $startHour = $hora.":".$minutos;


        $date = $dataInicio;

        while($date >= $dataInicio && $date <= $dataFim){
            
            $sql_i = "INSERT INTO classCalendar (classId, dateClass, startHour, userCreation, dateCreation)
                                            VALUES ('$aula', '$date', '$startHour', '$user', now())";
            $result_i = mysqli_query($conn, $sql_i);

            $date = date('Y-m-d', strtotime($date . ' + 7 days'));
        }
        

        header("Location: aulas.php");

    break;

    case 19:

        $user = $_SESSION['user'];
        $classId = $_GET['id'];

        $sql_i = "INSERT INTO subscribeClass (userUsername, classCalendarId, userCreation, dateCreation)
                                             VALUES ('$user', '$classId', '$user', now())";
        $result_i = mysqli_query($conn, $sql_i);

        header("Location: calendar.php");

    break;

    case 20:

        $user = $_SESSION['user'];
        $classId = $_GET['id'];

        $sql_u = "UPDATE subscribeClass SET active = 'N' WHERE classCalendarId = '$classId' AND userUsername = '$user'";
        $result_i = mysqli_query($conn, $sql_u);

        header("Location: calendar.php");
    
    break;

    case 21:
    $userLogedIn = $_SESSION['user'];
    $coment = $_POST['coment'];
    $iduser = $_GET['iduser'];
    
    $sql_e = "INSERT INTO nutritionPlanComments (content, active, userCreation, dateCreation, userUsername) VALUES ('$coment', 'Y', '$userLogedIn', now(), '$iduser')";
    $result_e = mysqli_query($conn, $sql_e);
    
    header("Location: searchclient.php");

    break;

    case 22:
    $userLogedIn = $_SESSION['user'];
    $coment = $_POST['coment'];
    $iduser = $_GET['iduser'];
    
    $sql_e = "INSERT INTO trainingPlanComment (content, acive, userCreation, dateCreation, userUsername) VALUES ('$coment', 'Y', '$userLogedIn', now(), '$iduser')";
    $result_e = mysqli_query($conn, $sql_e);
    
    header("Location: searchclient.php");
    break;


    case 23:
    $userLogedIn = $_SESSION['user'];
    $coment = $_POST['coment'];
    $iduser = $_GET['iduser'];
    
    $sql_e = "INSERT INTO physicalEvaluationComments (content, active, userCreation, dateCreation, userUsername) VALUES ('$coment', 'Y', '$userLogedIn', now(), '$iduser')";
    $result_e = mysqli_query($conn, $sql_e);
    
    header("Location: searchclient.php");
    break;


    }
?>