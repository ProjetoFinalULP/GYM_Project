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
    
    ?>

  <body>
    <div class="container-fluid">
                
    <?php
      include 'menu.inc';
    ?>
                
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
  <?php
    }else{
      header("Location: error.php");
    }
  ?>
</html>

