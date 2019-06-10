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
    
    if(isset($_GET['f'])){
      $f = $_GET['f'];
    }else{
      $f = 1;
    }

    if(!isset($i)){
      $today = $_SESSION['date'] = date('l, d-m-Y');
    }else{
      if($i==1){
        $today = $_SESSION['date'] = date('l, d-m-Y', strtotime($_SESSION['date'] . ' + 1 day'));
      }else if($i==2){
        $today = $_SESSION['date'] = date('l, d-m-Y', strtotime($_SESSION['date'] . ' - 1 day'));
      }else{
        $today = $_SESSION['date'];
      }
    }

    $today2 = date('Y-m-d', strtotime($today));

    if($f == 1){ //aulas

      $sql_classes = "SELECT cc.id,
                            c.description AS aula,
                            cr.description AS sala,
                            cc.startHour,
                            c.duration,
                            cc.assignedTo
                      FROM classCalendar cc
                      INNER JOIN class c ON c.id = cc.classId
                      INNER JOIN classroom cr ON cr.id = c.classroomId
                      WHERE cc.dateClass = '$today2'
                      AND cc.active = 'Y'
                      ORDER BY cc.startHour";
      $result_classes = mysqli_query($conn, $sql_classes);

    }else if($f == 2){ //nutrição
      $sql_classes = "SELECT ec.id,
                             u.username,
                             CONCAT(u.firstName, ' ', u.lastName) AS nome,
                             et.description AS tipo,
                             ec.startHour,
                             ec.assignedTo
                      FROM evaluationCalendar ec
                      INNER JOIN evaluationType et ON et.id = ec.evaluationTypeId
                      INNER JOIN user u ON u.username = ec.userUsername
                      WHERE ec.evaluationTypeId = 1
                      AND ec.dateEvaluation = '$today2'
                      AND ec.active = 'Y'
                      ORDER BY ec.startHour";
      $result_classes = mysqli_query($conn, $sql_classes);

    }else if($f == 3){ //treino
      $sql_classes = "SELECT ec.id,
                             u.username,
                             CONCAT(u.firstName, ' ', u.lastName) AS nome,
                             et.description AS tipo,
                             ec.startHour,
                             ec.assignedTo
                      FROM evaluationCalendar ec
                      INNER JOIN evaluationType et ON et.id = ec.evaluationTypeId
                      INNER JOIN user u ON u.username = ec.userUsername
                      WHERE ec.evaluationTypeId = 2
                      AND ec.dateEvaluation = '$today2'
                      AND ec.active = 'Y'
                      ORDER BY ec.startHour";
        $result_classes = mysqli_query($conn, $sql_classes);

  }


    if($f == 1 || $f == 3){ //aulas e treino
      $sql_workers = "SELECT username, firstName, lastName
                      FROM user WHERE accessId = 3";
      $result_workers = mysqli_query($conn, $sql_workers);
    }else{ //nutrição
      $sql_workers = "SELECT username, firstName, lastName
                      FROM user WHERE accessId = 2";
      $result_workers = mysqli_query($conn, $sql_workers);
    }

?>

  <body>
    <div class="container-fluid">
                
      <?php

        include 'menu.inc';

      ?>
                
      <nav class="p-2" aria-label="Pagination">
        <ul class="pagination justify-content-center mb-0 flex-wrap">
          <li class="page-item <?php if($today == date('l, d-m-Y')){echo 'disabled';}?>"><a class="page-link" href="assignWork.php?i=2&f=<?php echo $f;?>"><<</a></li>
          <li class="page-item"><a class="page-link" href="#"><?php echo $today;?></a></li>
          <li class="page-item"><a class="page-link" href="assignWork.php?i=1&f=<?php echo $f;?>">>></a></li>
        </ul>
        <br>
        <ul class="pagination justify-content-center mb-0 flex-wrap">
          <li><a class="page-link" href="assignWork.php?f=1&i=3">Aulas</a></li>
          <li><a class="page-link" href="assignWork.php?f=2&i=3">Nutrição</a></li>
          <li><a class="page-link" href="assignWork.php?f=3&i=3">Treino</a></li>
        </ul>
      </nav>


      <section class="py-4">
        <div class="container-fluid">
          <h2 class="mb-4">Calendário de <?php echo $today2;?>:</h2>
          <div class="table-responsive">
            <table class="table">
            <?php if($f == 1){
            ?>
              <thead>
                <tr>
                  <th scope="col">Aula</th>
                  <th scope="col">Sala</th>
                  <th scope="col">Horas</th>
                  <th scope="col">Professor</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if(mysqli_num_rows($result_classes) > 0){
                    while($row_c = mysqli_fetch_array($result_classes)){
                ?>
                      <tr>
                        <td><?php echo $row_c['aula'];?></td>
                        <td><?php echo $row_c['sala'];?></td>
                        <td><?php echo $row_c['startHour'] . " (" . $row_c['duration'] . " minutos)";?></td>
                        <td>
                        <?php 
                            if($row_c['assigedTo'] != '' || $row_c['assignedTo'] != NULL){
                              echo $row_c['assignedTo'];
                            }else{
                              echo "N/A";
                            };
                        ?>
                        </td>
                        <td>
                          <?php
                            if($row_c['assigedTo'] != '' || $row_c['assignedTo'] != NULL){
                          ?>
                              <a class="btn btn-primary" href="save.php?s=24&id=<?php echo $row_c['id'];?>">Retirar</a>
                          <?php
                            }else{
                          ?>
                              <a class="btn btn-primary" href="assignWorkers.php?id=<?php echo $row_c['id'];?>&f=1">Assignar</a>
                          <?php
                            }
                          ?>
                        </td>
                      </tr>
                <?php
                    }
                  }
                ?>
              </tbody>
            <?php
            }else if($f == 2){
            ?>
              <thead>
                <tr>          
                  <th scope="col">Aluno</th>
                  <th scope="col">Tipo de Avaliação</th>
                  <th scope="col">Horas</th>
                  <th scope="col">Professor</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if(mysqli_num_rows($result_classes) > 0){
                    while($row_c = mysqli_fetch_array($result_classes)){
                ?>
                      <tr>
                        <td><?php echo $row_c['nome']." (".$row_c['username'].")";?></td>
                        <td><?php echo $row_c['tipo'];?></td>
                        <td><?php echo $row_c['startHour'];?></td>
                        <td>
                        <?php 
                            if($row_c['assigedTo'] != '' || $row_c['assignedTo'] != NULL){
                              echo $row_c['assignedTo'];
                            }else{
                              echo "N/A";
                            };
                        ?>
                        </td>
                        <td>
                          <?php
                            if($row_c['assigedTo'] != '' || $row_c['assignedTo'] != NULL){
                          ?>
                              <a class="btn btn-primary" href="save.php?s=26&id=<?php echo $row_c['id'];?>&f=<?php echo $f;?>">Retirar</a>
                          <?php
                            }else{
                          ?>
                              <a class="btn btn-primary" href="assignWorkers.php?id=<?php echo $row_c['id'];?>&f=2">Assignar</a>
                          <?php
                            }
                          ?>
                        </td>
                      </tr>
                <?php
                    }
                  }
                ?>
              </tbody>
            <?php
            }else if($f == 3){
            ?>
              <thead>
                <tr>          
                  <th scope="col">Aluno</th>
                  <th scope="col">Tipo de Avaliação</th>
                  <th scope="col">Horas</th>
                  <th scope="col">Professor</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  if(mysqli_num_rows($result_classes) > 0){
                    while($row_c = mysqli_fetch_array($result_classes)){
                ?>
                      <tr>
                        <td><?php echo $row_c['nome']." (".$row_c['username'].")";?></td>
                        <td><?php echo $row_c['tipo'];?></td>
                        <td><?php echo $row_c['startHour'];?></td>
                        <td>
                        <?php 
                            if($row_c['assigedTo'] != '' || $row_c['assignedTo'] != NULL){
                              echo $row_c['assignedTo'];
                            }else{
                              echo "N/A";
                            };
                        ?>
                        </td>
                        <td>
                          <?php
                            if($row_c['assigedTo'] != '' || $row_c['assignedTo'] != NULL){
                          ?>
                              <a class="btn btn-primary" href="save.php?s=26&id=<?php echo $row_c['id'];?>&f=<?php echo $f;?>">Retirar</a>
                          <?php
                            }else{
                          ?>
                              <a class="btn btn-primary" href="assignWorkers.php?id=<?php echo $row_c['id'];?>&f=3">Assignar</a>
                          <?php
                            }
                          ?>
                        </td>
                      </tr>
                <?php
                    }
                  }
                ?>
              </tbody>
            <?php
            }
            ?>
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

