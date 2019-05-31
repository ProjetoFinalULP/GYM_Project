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
    
  ?>

  <body>
    <div class="container-fluid">
                
        <nav class="navbar navbar-expand-lg navbar-light"><a class="navbar-brand" href="#"><img src="images/49464979_2252961474952750_7513931656697217024_n.jpg" alt="Go Up Fitness" width="35"></a>
          <div class="navbar-nav ml-auto">
              <div class="d-flex flex-column flex-lg-row align-items-start justify-content-between w-100">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item d-flex"><a class="nav-link p-0 m-0" href="#"><img class="rounded-circle" src="https://bootstrapshuffle.com/placeholder/pictures/bg_square.svg?primary=007bff" height="40" width="40" alt=""></a></li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" id="navigations-headers-04" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navigations-headers-04">
                        <a class="dropdown-item" href="#">Account settings</a>
                        <a class="dropdown-item" href="#">Logout</a>
                      </div>
                    </li>
                </ul>
              </div>
          </div>
        </nav>  
                
      <section>
        <form method="post" name="createexe" enctype="multipart/form-data">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-5 col-lg-4">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="text" placeholder="Nome Exercicio" name="exenome">
                <label class="sr-only" for="textarea-contacts-02">Descri√ß√£o</label>
                <textarea class="form-control mb-3" id="textarea-contacts-02" rows="5" placeholder="DescriÁ„o" name="descricao"></textarea>             
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

