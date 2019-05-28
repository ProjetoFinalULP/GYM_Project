<?php

    

    include 'config.inc';
    

    $s = $_GET[s];

    switch($s){

    case 1:

        $target = 'images/'. basename($_FILES['image']['name']);

        $image = $_FILES['image']['name'];
        $exename = $_POST['exenome'];
        $descricao =$_POST['descricao'];

        
        $sql_i = "INSERT INTO exercise (description, content, photo1, accessId, userCreation, dateCreation)
                                VALUES ('$descricao', '$exename', '$image', 1, 'SYSTM', now())";
        $result_i = mysqli_query($conn, $sql_i);

        move_uploaded_file($_FILES['name']['tmp_name'], $target)

        header("Location: exever.php");

    break;

    
    }

?>