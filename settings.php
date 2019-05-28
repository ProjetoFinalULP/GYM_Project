<!DOCTYPE html>
<html lang="pl">
  <head>

  <?php

  session_start();

  include 'config.inc';

  $user = $_SESSION['user'];

  $sql_info = "SELECT firstName,
                      lastName,
                      phoneNumber,
                      email
                FROM user
                WHERE username = '$user'";
  $result_info = mysqli_query($conn, $sql_info);
  $row_info = mysqli_fetch_array($result_info);

  ?>

    <title>Page title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="icon" href="favicon.ico">
  </head>
  <body>
    <div class="container-fluid">
                
      <nav class="navbar navbar-light justify-content-center"><a class="navbar-brand mr-0" href="#"><img src="images/49464979_2252961474952750_7513931656697217024_n.jpg" alt="Pied Piper" width="100"></a></nav>

      <section>
        <form method="post" name="settings">
          <div class="container text-center">
            <div class="row justify-content-center">
              <div class="col-md-5 col-lg-4">
                <label class="sr-only" for="input1-signin-01">Nome</label>
                <input class="form-control my-3 bg-light" id="input1-signin-01" name="nome" type="text" maxlength="5" placeholder="Nome" value="<?php echo $row_info['firstName'];?>">
                <label class="sr-only" for="input2-signin-01">Apelido</label>
                <input class="form-control my-3 bg-light" id="input2-signin-01" name="apelido" type="text" placeholder="Apelido" value="<?php echo $row_info['lastName'];?>">
                <label class="sr-only" for="input3-signin-01">Telefone</label>
                <input class="form-control my-3 bg-light" id="input3-signin-01" name="telefone" type="number" placeholder="Telefone" value="<?php echo $row_info['phoneNumber'];?>">
                <label class="sr-only" for="input4-signin-01">Email</label>
                <input class="form-control my-3 bg-light" id="input4-signin-01" name="email" type="email" placeholder="Email" value="<?php echo $row_info['email'];?>">
                <label class="sr-only" for="input5-signin-01">Password</label>
                <input class="form-control my-3 bg-light" id="input5-signin-01" name="password" type="password" placeholder="Password">
                <button class="btn btn-primary btn-block py-2 my-3" formaction="save.php?s=2">Guardar</button>
              </div>
            </div>
            <!--<p class="text-secondary text-muted mt-3">Don't have an account? <a href="login.php?i=2">Register here!</a></p>-->
          </div>
        </form>
      </section>

    </div>
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>

