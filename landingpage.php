<!DOCTYPE html>
<html lang="pl">
  <head>
    <title>Page title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="icon" href="favicon.ico">
  </head>

<?php

  session_start();

  include 'config.inc';

  if(isset($_SESSION['user'])){
  
    $user = $_SESSION['user'];

    $sql_u = "SELECT firstName,
                      lastName
              FROM user
              WHERE username = '$user'";
    $result_u = mysqli_query($conn, $sql_u);
    $row_u = mysqli_fetch_array($result_u);

    $sql_user = "SELECT username,
                        firstName,
                        lastName,
                        phoneNumber,
                        email,
                        accessId,
                        active
                FROM user
                WHERE active = 'Y'";
    $result_user = mysqli_query($conn, $sql_user);


    $sql_u = "SELECT firstName,
                        lastName
                FROM user
                WHERE username = '$user'";
    $result_u = mysqli_query($conn, $sql_u);
    $row_u = mysqli_fetch_array($result_u);

?>

  <body>
    <div class="container-fluid">
                
    <nav class="navbar navbar-expand-lg navbar-light"><a class="navbar-brand" href="#"><img src="images/49464979_2252961474952750_7513931656697217024_n.jpg" alt="Go Up Fitness" width="35"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigations-04" aria-controls="navigations-04" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navigations-04">
          <div class="d-flex flex-column flex-lg-row align-items-start justify-content-between w-100">
            <ul class="navbar-nav order-2 order-lg-1">
              <li class="nav-item"><a class="nav-link active" href="createuser.php">Adicionar Utilizador<span class="sr-only">(current)</span></a></li>
              <li class="nav-item"><a class="nav-link" href="#">Inscrever Aula de Grupo</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Inscrever Aula de Personal Trainer</a></li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Outros</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="manageusers.php">Gerir Utilizador</a>
                  <a class="dropdown-item" href="#">Gerir Calendario de Avaliação</a>
                  <a class="dropdown-item" href="#">Gerir Aulas de Grupo</a>             
                  <a class="dropdown-item" href="exever.php">Gerir Exercicios</a>  
                </div>
              </li>
            </ul>
            <ul class="navbar-nav order-1 order-lg-2">
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navigations-headers-04" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navigations-headers-04"><a class="dropdown-item" href="#">Account settings</a><a class="dropdown-item" href="#">Logout</a></div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
                
      <section class="py-4">
        <div class="container-fluid">
          <h2 class="mb-4">Order status</h2>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Username</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Telefone</th>
                  <th scope="col">Email</th>
                  <th class="text-center" scope="col">ID Permissão</th>
                  <th class="text-center" scope="col">Activo</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                if(mysqli_num_rows($result_user) > 0){
                  while($row_i = mysqli_fetch_array($result_user)){
              ?>
                    <tr>
                      <td><?php echo $row_i['username'];?></td>
                      <td><?php echo $row_i['firstName']." ".$row_i['lastName'];?></td>
                      <td><?php echo $row_i['phoneNumber'];?></td>
                      <td><?php echo $row_i['email'];?></td>
                      <td><?php if($row_i['accessId'] == 1){echo "Admin";}else{echo "Utilizador";};?></td>
                      <td><?php if($row_i['active'] == 'Y'){echo "Sim";}else{echo "Não";};?></td>
                    </tr>
              <?php
                  }
                }
              ?>

              </tbody>
            </table>
          </div>
        </div>
      </section>
    </div>
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
  </body>

<?php

  }else{
    header("Location: error.php");
  }

?>
</html>

