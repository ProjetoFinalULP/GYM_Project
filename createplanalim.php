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
  <body>
<?php
 session_start();
?>
  
    <div class="container-fluid">         
    <?php
      include 'menu.inc';
    ?>
                
      <section>
        <form method="get" name="createexe" enctype="multipart/form-data">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-5 col-lg-4">
                <label class="sr-only" for="input1-signin-03">ID Utilizador</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="text" placeholder="ID Utilizador" name="iduser">                          
                <input class="btn btn-primary btn-block py-2 my-3" name="file" type="file" >             
                <button class="btn btn-primary btn-block py-2 my-3" formaction="save.php?s=6">Guardar</button>
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
</html>

