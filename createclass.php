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

      $sql_rooms = "SELECT id,
                           description,
                           capacity
                    FROM classroom
                    WHERE active = 'Y'";
      $result_rooms = mysqli_query($conn, $sql_rooms);
    
  ?>

  <body>
    <div class="container-fluid">
                
    <?php
      include 'menu.inc';
    ?>
                
      <section>
        <form method="post" name="createexe">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-5 col-lg-4">
                <label class="sr-only" for="input1-signin-03">Nome da Aula</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="text" placeholder="Nome da aula" name="nome" required>
                <label for="input7-ecommerce-03">Sala</label>
                    <select class="custom-select d-block w-100" id="input7-ecommerce-03" name="sala" required>
                      <option value="" selected disabled>Escolha uma sala:</option>
                    <?php
                      if(mysqli_num_rows($result_rooms)>0){
                        while($row_a = mysqli_fetch_array($result_rooms)){
                    ?>
                          <option value="<?php echo $row_a['id'];?>"><?php echo $row_a['description']. " (".$row_a['capacity']." lugares)";?></option>
                    <?php
                        }
                      }
                    ?>
                    </select>
                <label class="sr-only" for="input1-signin-05">Duração (em minutos)</label>
                <input class="form-control my-3 bg-light" id="input1-signin-05" type="number" min="1" placeholder="Duração (em minutos)" name="duracao" required>
                <label for="input7-ecommerce-03">Intensidade</label>
                    <select class="custom-select d-block w-100" id="input7-ecommerce-03" name="intensidade" required>
                      <option value="" selected disabled>Escolha uma opção...</option>
                      <option value="L">Baixa</option>
                      <option value="M">Média</option>
                      <option value="H">Alta</option>
                    </select>     
                <button class="btn btn-primary btn-block py-2 my-3" formaction="save.php?s=15">Guardar</button>
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

