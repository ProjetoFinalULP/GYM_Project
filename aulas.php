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

    $sql_class = "SELECT c.id,
                         c.description,
                         cr.description AS room,
                         cr.capacity,
                         c.duration,
                         c.intensityLevel
                  FROM class c
                  INNER JOIN classroom cr ON cr.id = c.classroomId
                  WHERE c.active = 'Y'";
    $result_class = mysqli_query($conn, $sql_class);

?>

  <body>
    <div class="container-fluid">
                
      <?php

        include 'menu.inc';

      ?>
                
      <section class="py-4">
        <div class="container-fluid">
          <h2 class="mb-4">Aulas</h2>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nome</th>
                  <th scope="col">Sala</th>
                  <th scope="col">Duração</th>
                  <th scope="col">Intensidade</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              <?php 
                if(mysqli_num_rows($result_class) > 0){
                  while($row_c = mysqli_fetch_array($result_class)){
              ?>
                    <tr>
                      <td><?php echo $row_c['description'];?></td>
                      <td><?php echo $row_c['room'] . " (" . $row_c['capacity'] . " lugares)";?></td>
                      <td><?php echo $row_c['duration'];?></td>
                      <td><?php if($row_c['intensityLevel'] == 'L'){echo "Baixa";}else if($row_c['intensityLevel'] == 'M'){echo "Média";}else{echo "Alta";};?></td>
                      <td>
                        <a class="btn btn-primary" href="editclass.php?id=<?php echo $row_c['id'];?>">Editar</a>
                        <a class="btn btn-primary" href="save.php?s=16&id=<?php echo $row_c['id'];?>">Desativar</a>
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

