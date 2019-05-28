<!DOCTYPE html>
<html lang="pl">
  <head>

    <?php
    
    session_start();

    include 'config.inc';
    
    $user = $_SESSION['user'];

    $sql_u = "SELECT firstName,
                      lastName
              FROM user
              WHERE username = '$user'";
    $result_u = mysqli_query($conn, $sql_u);
    $row_u = mysqli_fetch_array($result_u);
    
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
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navigations-headers-04" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $row_u['firstName']." ".$row_u['lastName'];?></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navigations-headers-04"><a class="dropdown-item" href="#">Account settings</a><a class="dropdown-item" href="#">Logout</a></div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
                
      <section>
        <form method="post" name="createuser">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-5 col-lg-4">
                <label class="sr-only" for="input1-signin-03">Nome</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" name="nome" type="text" placeholder="Nome">
                <label class="sr-only" for="input2-signin-03">Apelido</label>
                <input class="form-control my-3 bg-light" id="input2-signin-03" name="apelido" type="text" placeholder="Apelido">
                <label class="sr-only" for="input3-signin-03">Email</label>
                <input class="form-control my-3 bg-light" id="input3-signin-03" name="email" type="email" placeholder="Email">
                <label class="sr-only" for="input4-signin-03">Telefone</label>
                <input class="form-control my-3 bg-light" id="input4-signin-03" name="telefone" type="number" maxsize=9 placeholder="Telefone">
                <button class="btn btn-primary btn-block py-2 my-3" formaction="save.php?s=1">Criar utilizador</button>
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

