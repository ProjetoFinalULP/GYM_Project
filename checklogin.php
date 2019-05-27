<?php

include 'config.inc';

$username = $_POST['username'];
$password = $_POST['password'];

$checkpass = md5($password);
echo $checkpass;

$sql = "SELECT password FROM login WHERE userUsername = '$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if($checkpass == $row['password']){

    session_start();

    $_SESSION['user'] = $username;
    header("Location: index.php");
}else{

    echo "NÃO TENS ACESSO!";
}

?>