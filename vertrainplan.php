
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
  <body>

  <?php
    session_start(); 
    include 'config.inc';
    
    $iduser = $_SESSION['user'];
  
   
    $sql_sele = "SELECT id FROM trainingPlan WHERE userUsername = '$iduser' AND active='Y'";
    $result_sele = mysqli_query($conn, $sql_sele);
    $row_sele = mysqli_fetch_array($result_sele);
    $idPlan = $row_sele['id'];

    $sql_sel = "SELECT id, dayName FROM planDay WHERE trainPlanId = '$idPlan'";
    $result_sel = mysqli_query($conn, $sql_sel);
    $row_sel = mysqli_fetch_array($result_sel);
  
  ?>
    <div class="container-fluid">
                
    <?php
      include 'menu.inc';
    ?>
      <section>
        <form method="post" name="createtrain" enctype="multipart/form-data">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-5 col-lg-4">
                <?php 
                
                  if(mysqli_num_rows($result_sel) > 0){
                    while($row_sel = mysqli_fetch_array($result_sel)){
                      ?>
                        <a class="btn btn-primary btn-block py-2 my-3" href="verplanexe.php?idDay=<?php echo $row_sel['id'];?>&iduser=<?php echo $iduser ?>"><?php echo $row_sel['dayName'];?></a>
                      <?php
                      
                    }
                  }
                  
                ?>
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