<!DOCTYPE html>
<html lang="pl">
<?php

    session_start();

    include 'config.inc';

    $sql_exe = "SELECT id, description, content, photo1, photo2, photo3, active FROM exercise";
              
             
    $result_exe = mysqli_query($conn, $sql_exe);
    $row_exe = mysqli_fetch_array($result_exe);
    //print_r($row_exe); 

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

      <a class="btn btn-primary btn-block py-2 my-3" href="exeadd.php">Adicionar Exercicio</a>          
      <section class="py-4">
        <div class="container-fluid">
          <h2 class="mb-4">Order status</h2>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nome Exercicio</th>
                  <th scope="col">Descri��o</th>
                  <th scope="col">Imagem</th>
                  <th scope="col">Imagem</th>
                  <th scope="col">Imagem</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Op��o</th>
                </tr>
              </thead>
              <tbody>
               <?php 
                  if(mysqli_num_rows($result_exe) > -1){
                    while($row_exe = mysqli_fetch_array($result_exe)){
                ?>
                      <tr>
                        <td><?php echo $row_exe['description'];?></td>
                        <td><?php echo $row_exe['content'];?></td>
                        <td><?php echo  "<img src='images/img_exe/".$row_exe['photo1']."'   class='img-fluid rounded' height='200px' width='200px' >";  ?></td>
                        <td><?php echo  "<img src='images/img_exe/".$row_exe['photo2']."'   class='img-fluid rounded' height='200px' width='200px' >";  ?></td>
                        <td><?php echo  "<img src='images/img_exe/".$row_exe['photo3']."'   class='img-fluid rounded' height='200px' width='200px' >";  ?></td>
                        <td><?php
                          if ($row_exe['active'] == 1) {
                            echo "Ativo";
                          }else {
                            echo "Desativado";
                          }
                        ?></td>
                        <td><a href="exeedit.php?varname= <?php echo $row_exe['id'] ?> ">Editar</a> </td>
                      </tr>
                <?php
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </div>
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>	