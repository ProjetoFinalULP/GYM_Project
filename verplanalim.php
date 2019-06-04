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

  
    <div class="container-fluid">         
    <nav class="navbar navbar-expand-lg navbar-light"><a class="navbar-brand" href="#"><img src="images/49464979_2252961474952750_7513931656697217024_n.jpg" alt="Go Up Fitness" width="35"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigations-04" aria-controls="navigations-04" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navigations-04">
          <div class="d-flex flex-column flex-lg-row align-items-start justify-content-between w-100">
            <ul class="navbar-nav order-2 order-lg-1">
              <li class="nav-item"><a class="nav-link active" href="createuser.php">Adicionar Utilizador<span class="sr-only">(current)</span></a></li>
              <li class="nav-item"><a class="nav-link" href="#">Inscrever Aula de Grupo</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Inscrever Aula de Personal Trainer</a></li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Outros</a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="manageusers.php">Gerir Utilizador</a>
                  <a class="dropdown-item" href="#">Gerir Calendario de Avaliação</a>
                  <a class="dropdown-item" href="#">Gerir Aulas de Grupo</a>             
                  <a class="dropdown-item" href="exever.php">Gerir Exercicios</a>  
                </div>
              </li>
            </ul>
            <ul class="navbar-nav order-1 order-lg-2">
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
                <button class="btn btn-primary btn-block py-2 my-3" type="submit" name="download_palm">Download</button>
                
              </div>
            </div>
          </div>
          </form>
      </section>
<?php     
        session_start();
    
        include 'config.inc';

        $user = $_SESSION['user'];
       
        $sql_palm = "SELECT plan FROM nutritionPlan WHERE userUsername = '$user' AND status = 'Y'";
        $result_palm = mysqli_query($conn, $sql_palm);
        $row_palm = mysqli_fetch_array($result_palm);

        $file = 'files/plan_alm/'.$row_palm['plan'];

        if(isset($_POST['download_palm'])){

          if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
          }
          
  
        }

echo "<embed src='$file' type='application/pdf' width='100%' height='600px' />";
        
   


?>
    </div>
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>
 
