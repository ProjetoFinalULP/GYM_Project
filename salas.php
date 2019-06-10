<!DOCTYPE html>
<html lang="pl">
  <head>
    <title>Page title</title>
    <meta charset="ISO-8859-1">
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

    $sql_rooms = "SELECT id,
                         description,
                         capacity
                  FROM classroom
                  WHERE active = 'Y'";
    $result_rooms = mysqli_query($conn, $sql_rooms);

?>

  <body>
    <div class="container-fluid">
                
      <?php

        include 'menu.inc';

      ?>
                
      <section class="py-4">
        <div class="container-fluid">
          <h2 class="mb-4">Salas</h2>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Capacidade</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <?php 
                if(mysqli_num_rows($result_rooms) > 0){
                  while($row_r = mysqli_fetch_array($result_rooms)){
              ?>
                    <tr>
                      <td><?php echo $row_r['description'];?></td>
                      <td><?php echo $row_r['capacity'];?></td>
                      <td>
                        <a class="btn btn-primary" href="editroom.php?id=<?php echo $row_r['id'];?>">Editar</a>
                        <a class="btn btn-primary" href="save.php?s=13&id=<?php echo $row_r['id'];?>">Remover</a>
                      </td>
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

<?php

  }else{
    header("Location: error.php");
  }

?>
</html>

