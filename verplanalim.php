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

  
    <div class="container-fluid">         
    
    <?php
      include 'menu.inc';
    ?>
                
      <section>
        <form method="post" name="createexe" enctype="multipart/form-data">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-5 col-lg-4">            
                <button class="btn btn-primary btn-block py-2 my-3" type="submit" name="download_palm">Download</button>
                
              </div>
            </div>
          </div>
          </form>
      </section>
<?php     
        session_start();
    
        include 'config.inc';

        $user = $_SESSION['user'];
       
        $sql_palm = "SELECT plan FROM nutritionPlan WHERE userUsername = '$user' AND status = 'Y'";
        $result_palm = mysqli_query($conn, $sql_palm);
        $row_palm = mysqli_fetch_array($result_palm);

        $file = 'files/plan_alm/'.$row_palm['plan'];

        if(isset($_POST['download_palm'])){

          if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
          }
          
  
        }

echo "<embed src='$file' type='application/pdf' width='100%' height='600px' />";
        
   


?>
    </div>
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>
 
