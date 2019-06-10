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
      $access = $_SESSION['access'];

      $roomId = $_GET['id'];

      $sql_room = "SELECT description,
                          capacity
                   FROM classroom
                   WHERE id = '$roomId'";
      $result_room = mysqli_query($conn, $sql_room);
      $row_room = mysqli_fetch_array($result_room);
    
  ?>

  <body>
    <div class="container-fluid">
                
    <?php
      include 'menu.inc';
    ?>
                
      <section>
        <form method="post" name="createexe" enctype="multipart/form-data">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-5 col-lg-4">
                <label class="sr-only" for="input1-signin-03">Nome da Sala</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="text" value="<?php echo $row_room['description'];?>" name="nome" required>
                <label class="sr-only" for="textarea-contacts-02">Capacidade</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" value=<?php echo $row_room['capacity'];?> min="1" name="capacidade" required>             
                <button class="btn btn-primary btn-block py-2 my-3" formaction="save.php?s=14&id=<?php echo $roomId;?>">Guardar</button>
              </div>
            </div>
          </div>
          </form>
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

