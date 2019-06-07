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

    $utilizador = $_GET['id'];

    $sql_u = "SELECT firstName,
                      lastName
              FROM user
              WHERE username = '$user'";
    $result_u = mysqli_query($conn, $sql_u);
    $row_u = mysqli_fetch_array($result_u);

    $sql_user = "SELECT username,
                        firstName,
                        lastName,
                        email,
                        phoneNumber,
                        accessId,
                        active
                FROM user
                WHERE username = '$utilizador' 
                AND active = 'Y'";
    $result_user = mysqli_query($conn, $sql_user);
    $row_user = mysqli_fetch_array($result_user);

    $sql_access = "SELECT id,
                          description
                   FROM access
                   WHERE active = 'Y'";
    $result_access = mysqli_query($conn, $sql_access);

?>


  <body>
    <div class="container-fluid">

    <?php
      include 'menu.inc';
    ?>
                
      <section class="py-5">
        <div class="container">
          <div class="pb-5 text-center"><img class="mx-auto mb-4" src="https://bootstrapshuffle.com/placeholder/pictures/bg_square.svg?primary=007bff" alt="" width="72" height="72">
            <h2>Checkout form</h2>
          </div>
          <div class="row">
            <div class="col-md-8 order-md-1">
              <h4 class="mb-3">Informações do utilizador <?php echo $row_user['username'];?></h4>
              <form class="needs-validation" method="post" novalidate>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="input1-ecommerce-03">Nome</label>
                    <input class="form-control" id="input1-ecommerce-03" name="nome" type="text" value="<?php echo $row_user['firstName'];?>" required>
                    <div class="invalid-feedback">Valid first name is required.</div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="input2-ecommerce-03">Apelido</label>
                    <input class="form-control" id="input2-ecommerce-03" type="text" name="apelido" value="<?php echo $row_user['lastName'];?>" required>
                    <div class="invalid-feedback">Valid last name is required.</div>
                  </div>
                </div>
                <div>
                  <div class="mb-3">
                    <label for="input4-ecommerce-03">Email</label>
                    <input class="form-control" id="input3-ecommerce-03" name="email" type="email" value="<?php echo $row_user['email'];?>" required>
                    <div class="invalid-feedback">Please enter a valid email address for shipping updates.</div>
                  </div>
                  <div class="mb-3">
                    <label for="input5-ecommerce-03">Telefone</label>
                    <input class="form-control" id="input4-ecommerce-03" type="number" value="<?php echo $row_user['phoneNumber'];?>" required>
                    <div class="invalid-feedback">Please enter your phone number.</div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-5 mb-3">
                    <label for="input7-ecommerce-03">Permissão</label>
                    <select class="custom-select d-block w-100" id="input7-ecommerce-03" name="access" required>
                      <!--<option value="" selected disabled>Choose...</option>-->
                    <?php
                      if(mysqli_num_rows($result_access)>0){
                        while($row_a = mysqli_fetch_array($result_access)){
                    ?>
                          <option value="<?php echo $row_a['id'];?>" <?php if($row_a['id'] == $row_user['accessId']){echo 'selected';}; ?>><?php echo $row_a['description'];?></option>
                    <?php
                        }
                      }
                    ?>
                    </select>
                  </div>
                </div>
                <!--<hr class="mb-4">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" id="input10-ecommerce-03" type="checkbox">
                  <label class="custom-control-label" for="input10-ecommerce-03">Shipping address is the same as my billing address</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" id="input11-ecommerce-03" type="checkbox">
                  <label class="custom-control-label" for="input11-ecommerce-03">Save this information for next time</label>
                </div>-->
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit" formaction="save.php?s=5">Guardar</button>
              </form>
            </div>
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

