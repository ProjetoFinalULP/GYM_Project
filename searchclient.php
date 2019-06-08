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
      //include 'autocomplete.php';
      //<script>autocomplete(document.getElementById("myInput"), iduser);</script>
    ?>
    
                
      <section>
        <form method="get" name="createexe" autocomplete="off" >
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-5 col-lg-4">
                <div class="autocomplete"> 
                  <input class="form-control my-3 bg-light" id="myInput" type="text" placeholder="ID Utilizador" name="iduser">
                </div>                                  
                <button class="btn btn-primary btn-block py-2 my-3" formaction="vertrainplan.php" type="submit" name="procurar">Ver Plano de Treino</button>
                <button class="btn btn-primary btn-block py-2 my-3" formaction="verplanalim.php" type="submit" name="procurar">Ver Plano Alimentar</button>
                <button class="btn btn-primary btn-block py-2 my-3" formaction="veravalfisica.php" type="submit" name="procurar">Ver Avaliação Fisica</button>
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