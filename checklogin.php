<?php

include 'config.inc';

$username = $_POST['username'];
$password = $_POST['password'];

$checkpass = hash('sha256', $password);

$sql = "SELECT pass FROM login WHERE userUsername = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if($checkpass == $row['pass']){

    session_start();

    $sql_access = "SELECT accessId FROM user WHERE username = '$username'";
    $result_access = mysqli_query($conn, $sql_access);
    $row_access = mysqli_fetch_array($result_access);

    $_SESSION['access'] = $row_access['accessId'];
    $_SESSION['user'] = $username;

    $today = date('Y-m-d');

    $sql_update = "SELECT todaysDate FROM log WHERE todaysDate = '$today'";
    
   
    $result_update = mysqli_query($conn, $sql_update);
    $row_update = mysqli_fetch_array($result_update);

    if(mysqli_num_rows($row_update) == 0){

        $sql_u = "UPDATE classCalendar SET active = 'N'
                  WHERE dateClass < '$today'";
        $result_u = mysqli_query($conn, $sql_u);

    }

    $sql_log = "INSERT INTO log (todaysDate, userCreation, dateCreation)
                                VALUES ('$today', '$username', now())";
    $result_log = mysqli_query($conn, $sql_log);


    header("Location: landingpage.php");
    
}else{

    header("Location: error.php");
}

?>