<!DOCTYPE html>
<html lang="pl">
<?php

    session_start();

    include 'config.inc';
    $idDay = $_GET[idDay];
    $iduser = $_GET[iduser];

    $sql_exe = "SELECT id, exerciseId, numSets, numReps, exeName FROM planExercise WHERE trainingDayId ='$idDay' AND active='Y' "; 
    $result_exe = mysqli_query($conn, $sql_exe);
    $row_exe = mysqli_fetch_array($result_exe);
    

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
                
    <?php
      include 'menu.inc';
    ?>

      <section class="py-4">
        <div class="container-fluid">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nome Exercicio</th>
                  <th scope="col">Sets</th>
                  <th scope="col">Reps</th>
                  <th scope="col">Opção</th>
                </tr>
              </thead>
              <tbody>
               <?php 
                  if(mysqli_num_rows($result_exe) > 0){
                    while($row_exe = mysqli_fetch_array($result_exe)){
                ?>
                      <tr>
                        <td><?php echo $row_exe['exeName'];?></td>
                        <td><?php echo $row_exe['numSets'];?></td>
                        <td><?php echo $row_exe['numReps'];?></td>
                        <td><a href="save.php?s=11&varname= <?php echo $row_exe['id']; ?>&idDay=<?php echo $idDay ?>&iduser=<?php echo $iduser ?> ">Eleminar</a> </td>
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
      
      
      
      
    <section>
        <form method="post" name="createtrain" enctype="multipart/form-data">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-5 col-lg-4">
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="text" placeholder="Exercicio" name="exercicio">
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="text" placeholder="Set" name="set"> 
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="text" placeholder="Reps" name="reps">                                      
                <button class="btn btn-primary btn-block py-2 my-3" formaction="save.php?s=10&idDay=<?php echo $idDay ?>&iduser=<?php echo $iduser ?>">Adicionar</button>
                <a class="btn btn-primary btn-block py-2 my-3" href="createtrainday.php?iduser=<?php echo $iduser ?>">Voltar</a>
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