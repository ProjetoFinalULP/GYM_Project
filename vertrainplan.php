
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
    
    if(isset($_GET['procurar'])){
      $user = $_GET['iduser'];
      $userLogedIn = $_SESSION['user'];
    }else{
      $user = $_SESSION['user'];
    }
  
   
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
<?php
if(isset($userLogedIn)){
  ?>
        <section>
          <form method="post">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-5 col-lg-4">
                  <textarea class="form-control mb-3" id="textarea-contacts-02" rows="5" placeholder="Inserir Comentário" name="coment"></textarea>             
                  <button class="btn btn-primary btn-block py-2 my-3" formaction="save.php?s=22&iduser=<?php echo $user ?>">Guardar</button>
                </div>
              </div>
            </div>
            </form>
        </section>
  <?php
  $sql_exe = "SELECT content FROM trainingPlanComment WHERE userUsername = '$user'";
                
               
  $result_exe = mysqli_query($conn, $sql_exe);
  $row_exe = mysqli_fetch_array($result_exe);
  
  ?>
        <section class="py-4">
          <div class="container-fluid">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Comentario</th>
                  </tr>
                </thead>
                <tbody>
                 <?php 
                    if(mysqli_num_rows($result_exe) > 0){
                      while($row_exe = mysqli_fetch_array($result_exe)){
                  ?>
                        <tr>
                          <td><?php echo $row_exe['content'];?></td>
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
  <?php
  }
?>
    </div>
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>	