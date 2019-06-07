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
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="text" placeholder="Nome Exercicio" name="exenome">
                <label class="sr-only" for="textarea-contacts-02">Descrição</label>
                <textarea class="form-control mb-3" id="textarea-contacts-02" rows="5" placeholder="Descri��o" name="descricao"></textarea>             
                <input class="btn btn-primary btn-block py-2 my-3" name="image1" type="file" >
                <input class="btn btn-primary btn-block py-2 my-3" name="image2" type="file" >
                <input class="btn btn-primary btn-block py-2 my-3" name="image3" type="file" >
                <button class="btn btn-primary btn-block py-2 my-3" formaction="save.php?s=3">Guardar</button>
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

