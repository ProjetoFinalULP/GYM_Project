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

    session_destroy();

  ?>
  <body>
    <div class="container-fluid">
                
      <section class="py-5">
        <div class="container text-center">
          <h1 class="display-1">ERRO</h1>
          <p class="lead">Acesso negado!</p>
          <div class="row">
            <div class="col-md-6 mx-auto">
              <p>Não tem permissões suficientes para visualizar esta página. Por favor contacte o staff GoUp.</p>
            </div>
          </div><a class="btn btn-primary" href="index.php">Voltar à página inicial</a>
        </div>
      </section>
    </div>
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>