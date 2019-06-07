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

      $iduser = $_SESSION['user'];

    $sql_sel1 = "SELECT metabolicAge, bodyWater, imc, waistHipRatio, dateCreation
    FROM physicalEvaluation WHERE userUsername ='$iduser'"; 
    $result_sel1 = mysqli_query($conn, $sql_sel1);
    $row_sel1 = mysqli_fetch_array($result_sel1);

    $sql_sel2 = "SELECT weight, bodyFatPercent, bodyFatValue, leanBodyMassPercent, leanBodyMassValue, dateCreation
    FROM physicalEvaluation WHERE userUsername ='$iduser'"; 
    $result_sel2 = mysqli_query($conn, $sql_sel2);
    $row_sel2 = mysqli_fetch_array($result_sel2);

    $sql_sel3 = "SELECT  waistMeasure, hip, neck, shoulder, chest, abdomen, rightArmRelaxed, rightArmContracted, leftArmContracted ,dateCreation
    FROM physicalEvaluation WHERE userUsername ='$iduser'"; 
    $result_sel3 = mysqli_query($conn, $sql_sel3);
    $row_sel3 = mysqli_fetch_array($result_sel3);


    $sql_sel4 = "SELECT  leftArmRelaxed, leftForearm, rightForearm, leftThigh, rightThigh, leftCalf, rightCalf, dateCreation
    FROM physicalEvaluation WHERE userUsername ='$iduser'"; 
    $result_sel4 = mysqli_query($conn, $sql_sel4);
    $row_sel4 = mysqli_fetch_array($result_sel4);
     
    ?>
  <body>


<div class="container-fluid">
<?php
  include 'menu.inc';
?>
  <section class="py-4">
        <div class="container-fluid">
          <h2 class="mb-4">escrever aqui algo</h2>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Data</th>
                  <th scope="col">Indice de Massa Corporal</th>
                  <th scope="col">Indice Cintura/Anca</th>
                  <th scope="col">Idade Metabolica</th>
                  <th scope="col">Percentagem de água corpural</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                if(mysqli_num_rows($result_sel1) > 0){
                  while($row_sel1 = mysqli_fetch_array($result_sel1)){
              ?>
                    <tr>
                      <td><?php echo $row_sel1['dateCreation'];?></td>
                      <td><?php echo $row_sel1['imc'];?></td>
                      <td><?php echo $row_sel1['waistHipRatio'];?></td>
                      <td><?php echo $row_sel1['metabolicAge'];?></td>
                      <td><?php echo $row_sel1['bodyWater'];?></td>
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

      <section class="py-4">
        <div class="container-fluid">
          <h2 class="mb-4">Massa Corpural</h2>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Data</th>
                  <th scope="col">Peso</th>
                  <th scope="col">Massa Gorda (%)</th>
                  <th scope="col">Massa Gorda (kg)</th>
                  <th scope="col">Massa Magra (%)</th>
                  <th scope="col">Massa Magra (kg)</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                if(mysqli_num_rows($result_sel2) > 0){
                  while($row_sel2 = mysqli_fetch_array($result_sel2)){
              ?>
                    <tr>
                      <td><?php echo $row_sel2['dateCreation'];?></td>
                      <td><?php echo $row_sel2['weight'];?></td>
                      <td><?php echo $row_sel2['bodyFatPercent'];?></td>
                      <td><?php echo $row_sel2['bodyFatValue'];?></td>
                      <td><?php echo $row_sel2['leanBodyMassPercent'];?></td>
                      <td><?php echo $row_sel2['leanBodyMassValue'];?></td>                     
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
      
      <section class="py-4">
        <div class="container-fluid">
          <h2 class="mb-4">Medidas</h2>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Data</th>
                  <th scope="col">Cintura</th>
                  <th scope="col">Anca</th>
                  <th scope="col">Pescoço</th>
                  <th scope="col">Ombro</th>
                  <th scope="col">Tórax</th>
                  <th scope="col">Abdómen</th>
                  <th scope="col">Braço direito contraido</th>
                  <th scope="col">Braço direito descontraido</th>
                  <th scope="col">Braço esquerdo contraido</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                if(mysqli_num_rows($result_sel3) > 0){
                  while($row_sel3 = mysqli_fetch_array($result_sel3)){
              ?>
                    <tr>
                      <td><?php echo $row_sel3['dateCreation'];?></td>
                      <td><?php echo $row_sel3['waistMeasure'];?></td>
                      <td><?php echo $row_sel3['hip'];?></td>
                      <td><?php echo $row_sel3['neck'];?></td>
                      <td><?php echo $row_sel3['shoulder'];?></td>
                      <td><?php echo $row_sel3['chest'];?></td>
                      <td><?php echo $row_sel3['abdomen'];?></td>
                      <td><?php echo $row_sel3['rightArmContracted'];?></td>
                      <td><?php echo $row_sel3['rightArmRelaxed'];?></td>
                      <td><?php echo $row_sel3['leftArmContracted'];?></td>                      
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

      <section class="py-4">
        <div class="container-fluid">
          <h2 class="mb-4">Medidas</h2>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Data</th>
                  <th scope="col">Braço esquerdo descontraido</th>
                  <th scope="col">Antebraço esquerdo</th>
                  <th scope="col">Antebraço direiro</th>
                  <th scope="col">Coxa esquerda</th>
                  <th scope="col">Coxa direita</th>
                  <th scope="col">Gémeo esquerdo</th>
                  <th scope="col">Gémeo direito</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                if(mysqli_num_rows($result_sel4) > 0){
                  while($row_sel3 = mysqli_fetch_array($result_sel4)){
              ?>
                    <tr>
                      <td><?php echo $row_sel4['dateCreation'];?></td>
                      <td><?php echo $row_sel4['leftArmRelaxed'];?></td>
                      <td><?php echo $row_sel4['leftForearm'];?></td>  
                      <td><?php echo $row_sel4['rightForearm'];?></td>
                      <td><?php echo $row_sel4['leftThigh'];?></td>
                      <td><?php echo $row_sel4['rightThigh'];?></td>
                      <td><?php echo $row_sel4['leftCalf'];?></td>
                      <td><?php echo $row_sel4['rightCalf'];?></td>                      
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

