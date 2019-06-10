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
      $access = $_SESSION['access'];

      $classId = $_GET['id'];
      $f = $_GET['f'];

      if($f == 1){
        $sql_classes = "SELECT c.description AS aula,
                              cr.description AS sala,
                              cr.capacity,
                              cc.startHour,
                              c.duration,
                              cc.assignedTo
                        FROM classCalendar cc
                        INNER JOIN class c ON c.id = cc.classId
                        INNER JOIN classroom cr ON cr.id = c.classroomId
                        WHERE cc.id = '$classId'";
        $result_classes = mysqli_query($conn, $sql_classes);
        $row_c = mysqli_fetch_array($result_classes);

        $sql_subcount = "SELECT count(userUsername) AS inscritos
                        FROM subscribeClass
                        WHERE classCalendarId = '$classId'
                        AND active = 'Y'";
        $result_subcount = mysqli_query($conn, $sql_subcount);
        $row_subcount = mysqli_fetch_array($result_subcount);
        $subbed = $row_subcount['inscritos'];
      }else if($f == 2){
        
        $sql_classes = "SELECT u.username,
                             CONCAT(u.firstName, ' ', u.lastName) AS nome,
                             et.description AS tipo,
                             ec.startHour,
                             ec.assignedTo
                      FROM evaluationCalendar ec
                      INNER JOIN evaluationType et ON et.id = ec.evaluationTypeId
                      INNER JOIN user u ON u.username = ec.userUsername
                      WHERE ec.id = '$classId' 
                      AND ec.active = 'Y'";
        $result_classes = mysqli_query($conn, $sql_classes);

      }else if($f == 3){

        $sql_classes = "SELECT u.username,
                             CONCAT(u.firstName, ' ', u.lastName) AS nome,
                             et.description AS tipo,
                             ec.startHour,
                             ec.assignedTo
                      FROM evaluationCalendar ec
                      INNER JOIN evaluationType et ON et.id = ec.evaluationTypeId
                      INNER JOIN user u ON u.username = ec.userUsername
                      WHERE ec.id = '$classId' 
                      AND ec.active = 'Y'";
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
                
      <section>
        <form method="post" name="assignWorker">
          <div class="container">
            <div class="row justify-content-center">
              <?php
              if($f ==  1){
              ?>
                <div class="col-md-5 col-lg-4">
                  <tr>
                    <td>Nome da Aula: </td>
                    <td><?php echo $row_c['aula'];?></td>
                  </tr>
                  <tr>
                    <td>Sala: </td>
                    <td><?php echo $row_c['sala'];?></td>
                  </tr>
                  <tr>
                    <td>Capacidade: </td>
                    <td><?php if($subbed == $row_c['capacity']){echo "Lotação esgotada";}else{echo $subbed."/".$row_c['capacity'];};?></td>
                  </tr>
                  <tr>
                    <td>Horas: </td>
                    <td><?php echo $row_c['startHour']." (".$row_c['duration']." minutos)";?></td>
                  </tr>
                  <tr>
                    <label class="sr-only" for="textarea-contacts-02">Profissional</label>
                    <select class="custom-select d-block w-100" id="textarea-contacts-02" name="worker" required>
                          <option value="" selected disabled>Choose...</option>
                        <?php
                          if(mysqli_num_rows($result_workers)>0){
                            while($row_a = mysqli_fetch_array($result_workers)){
                        ?>
                              <option value="<?php echo $row_a['username'];?>"><?php echo $row_a['firstName']." ".$row_a['lastName']." (".$row_a['username'].")";?></option>
                      <?php
                          }
                        }
                      ?>
                      </select>
                  </tr>       
                  <button class="btn btn-primary btn-block py-2 my-3" formaction="save.php?s=25&id=<?php echo $classId;?>&f=<?php echo $f;?>">Guardar</button>
                </div>
              <?php
              }else if($f == 2 || $f == 3){
              ?>
                <div class="col-md-5 col-lg-4">
                  <tr>
                    <td>Cliente: </td>
                    <td><?php echo $row_c['nome']." (".$row_c['username'].")";?></td>
                  </tr>
                  <tr>
                    <td>Tipo de Avaliação: </td>
                    <td><?php echo $row_c['tipo'];?></td>
                  </tr>
                  <tr>
                    <td>Horas: </td>
                    <td><?php echo $row_c['startHour'];?></td>
                  </tr>
                  <tr>
                    <label class="sr-only" for="textarea-contacts-02">Profissional</label>
                    <select class="custom-select d-block w-100" id="textarea-contacts-02" name="worker" required>
                          <option value="" selected disabled>Choose...</option>
                        <?php
                          if(mysqli_num_rows($result_workers)>0){
                            while($row_a = mysqli_fetch_array($result_workers)){
                        ?>
                              <option value="<?php echo $row_a['username'];?>"><?php echo $row_a['firstName']." ".$row_a['lastName']." (".$row_a['username'].")";?></option>
                      <?php
                          }
                        }
                      ?>
                      </select>
                  </tr>       
                  <button class="btn btn-primary btn-block py-2 my-3" formaction="save.php?s=27&id=<?php echo $classId;?>&f=<?php echo $f;?>">Guardar</button>
                </div>
              <?php
              }
              ?>
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

