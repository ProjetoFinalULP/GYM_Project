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


    header("Location: landingpage.php");
}else{

    header("Location: error.php");
}

?>