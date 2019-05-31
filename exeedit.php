<!DOCTYPE html>
<html lang="pl">
<?php
      $var_value = $_GET['varname'];
      include 'config.inc';
      $sql_edexe = "SELECT description, content, photo1, photo2, photo3, active FROM exercise WHERE id = '$var_value'";
      $result_edexe = mysqli_query($conn, $sql_edexe);
      $row_edexe = mysqli_fetch_array($result_edexe);
      //print_r($row_edexe);
      
?>
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
    <div class="container-fluid">
                
      <nav class="navbar navbar-expand-lg navbar-light"><a class="navbar-brand" href="#">Pied Piper</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigations-04" aria-controls="navigations-04" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navigations-04">
          <div class="d-flex flex-column flex-lg-row align-items-start justify-content-between w-100">
            <ul class="navbar-nav order-2 order-lg-1">
              <li class="nav-item"><a class="nav-link active" href="#">Features <span class="sr-only">(current)</span></a></li>
              <li class="nav-item"><a class="nav-link" href="#">Enterprise</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Support</a></li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">ICO</a>
                <div class="dropdown-menu"><a class="dropdown-item" href="#">Whitepaper</a><a class="dropdown-item" href="#">Token</a></div>
              </li>
            </ul>
            <ul class="navbar-nav order-1 order-lg-2">
              <li class="nav-item d-flex"><a class="nav-link p-0 m-0" href="#"><img class="rounded-circle" src="https://bootstrapshuffle.com/placeholder/pictures/bg_square.svg?primary=007bff" height="40" width="40" alt=""></a></li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navigations-headers-04" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navigations-headers-04"><a class="dropdown-item" href="#">Account settings</a><a class="dropdown-item" href="#">Logout</a></div>
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
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="text" placeholder="Nome Exercicio" name="exenome" value="<?php echo $row_edexe['description'];?>">
                <label class="sr-only" for="textarea-contacts-02">Descrição</label>
                <textarea class="form-control mb-3" id="textarea-contacts-02" rows="5" placeholder="Descrição" name="descricao"><?php echo $row_edexe['content'];?></textarea>             
                <input class="btn btn-primary btn-block py-2 my-3" name="image1" type="file">
                <input class="btn btn-primary btn-block py-2 my-3" name="image2" type="file">
                <input class="btn btn-primary btn-block py-2 my-3" name="image3" type="file">
                <button class="btn btn-primary btn-block py-2 my-3" formaction="save.php?s=4" name="id_exe" value="<?php echo $var_value ?>">Guardar</button>
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

