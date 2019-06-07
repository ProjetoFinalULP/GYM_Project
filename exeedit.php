<!DOCTYPE html>
<html lang="pl">
<?php
      session_start();
      
      $var_value = $_GET['varname'];
      include 'config.inc';
      $sql_edexe = "SELECT description, content, photo1, photo2, photo3, active FROM exercise WHERE id = '$var_value'";
      $result_edexe = mysqli_query($conn, $sql_edexe);
      $row_edexe = mysqli_fetch_array($result_edexe);
      //print_r($row_edexe);
  
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
                
      <section>
        <form method="post" name="createexe" enctype="multipart/form-data">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-5 col-lg-4">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="text" placeholder="Nome Exercicio" name="exenome" value="<?php echo $row_edexe['description'];?>">
                <label class="sr-only" for="textarea-contacts-02">Descrição</label>
                <textarea class="form-control mb-3" id="textarea-contacts-02" rows="5" placeholder="Descrição" name="descricao"><?php echo $row_edexe['content'];?></textarea>             
                <input class="btn btn-primary btn-block py-2 my-3" name="image1" type="file">
                <input class="btn btn-primary btn-block py-2 my-3" name="image2" type="file">
                <input class="btn btn-primary btn-block py-2 my-3" name="image3" type="file">
                <button class="btn btn-primary btn-block py-2 my-3" formaction="save.php?s=4" name="id_exe" value="<?php echo $var_value ?>">Guardar</button>
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

