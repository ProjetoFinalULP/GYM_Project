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

    $_SESSION['user'] = $username;
    header("Location: landingpage.php");
}else{

    echo "NÃO TENS ACESSO!";
}

?>