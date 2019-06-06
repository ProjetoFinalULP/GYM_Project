<!DOCTYPE html>
<html lang="pl">
<?php

    session_start();

    include 'config.inc';
      $idDay = $_GET[idDay];
      $iduser = $_GET[iduser];
      $varname = $_GET[varname];

    $sql_exe = "SELECT description, content, photo1, photo2, photo3 FROM exercise WHERE id='$varname'";
              
             
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
    <?php include 'menu.inc';?>    
    
         
      <section class="py-4">
        <div class="container-fluid">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nome Exercicio</th>
                  <th scope="col">Descri��o</th>
                  <th scope="col">Imagem</th>
                  <th scope="col">Imagem</th>
                  <th scope="col">Imagem</th>
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
      <a class="btn btn-primary btn-block py-2 my-3" href="createtrainexe.php?id=<?php echo $idDay ?>&iduser=<?php echo $iduser ?> ">Voltar</a>

      
    </div>
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>	