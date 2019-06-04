<!DOCTYPE html>
<html lang="pl">
  <head>
    <title>Page title</title>
    <meta charset="ISO-8859-1">
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
                
      <?php

        include 'menu.inc';

      ?>
                
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

