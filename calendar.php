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

    $sql_u = "SELECT firstName,
                      lastName
              FROM user
              WHERE username = '$user'";
    $result_u = mysqli_query($conn, $sql_u);
    $row_u = mysqli_fetch_array($result_u);

    $i = $_GET['i'];

    if(!isset($i)){
      $today = $_SESSION['date'] = date('l, d-m-Y');
    }else{
      if($i==1){
        $today = $_SESSION['date'] = date('l, d-m-Y', strtotime($_SESSION['date'] . ' + 1 day'));
      }else if($i==2){
        $today = $_SESSION['date'] = date('l, d-m-Y', strtotime($_SESSION['date'] . ' - 1 day'));
      }
    }

    $today2 = date('Y-m-d', strtotime($today));

    $sql_classes = "SELECT classId, startHour
                    FROM classCalendar
                    WHERE dateClass = '$today2'
                    AND active = 'Y'";
    $result_classes = mysqli_query($conn, $sql_classes);



   

?>

  <body>
    <div class="container-fluid">
                
      <?php

        include 'menu.inc';

      ?>
                
      <nav class="p-2" aria-label="Pagination">
        <?php echo $sql_classes;?>
        <ul class="pagination justify-content-center mb-0 flex-wrap">
          <li class="page-item <?php if($today == date('l, d-m-Y')){echo 'disabled';}?>"><a class="page-link" href="calendar.php?i=2"><<</a></li>
          <li class="page-item"><a class="page-link" href="#"><?php echo $today;?></a></li>
          <li class="page-item"><a class="page-link" href="calendar.php?i=1">>></a></li>
        </ul>
      </nav>


      <section class="py-4">
        <div class="container-fluid">
          <h2 class="mb-4">Aulas de hoje:</h2>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ClassId</th>
                  <th scope="col">Hora de Início</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                if(mysqli_num_rows($result_classes) > 0){
                  while($row_c = mysqli_fetch_array($result_classes)){
              ?>
                    <tr>
                      <td><?php echo $row_c['classId'];?></td>
                      <td><?php echo $row_c['startHour'];?></td>
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

