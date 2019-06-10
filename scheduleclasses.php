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


    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
      $(function(){
        $("#dataFim").datepicker();
      });

    </script>

 

  </head>

  <?php

    session_start();

    include 'config.inc';
    
    if(isset($_SESSION['user'])){
  
      $user = $_SESSION['user'];
      $access = $_SESSION['access'];


      $sql_class = "SELECT id,
                           description
                    FROM class
                    WHERE active = 'Y'";
      $result_class = mysqli_query($conn, $sql_class);
    
  ?>

  <body>
    <div class="container-fluid">
                
    <?php
      include 'menu.inc';
    ?>
                
      <section>
        <form method="post" name="createexe">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-5 col-lg-4">
                <label class="sr-only" for="input1-signin-03">Aula</label>
                    <select class="custom-select d-block w-100" id="input1-signin-03" name="aula" required>
                      <option value="" selected disabled>Escolha uma aula:</option>
                    <?php
                      if(mysqli_num_rows($result_class)>0){
                        while($row_c = mysqli_fetch_array($result_class)){
                    ?>
                          <option value="<?php echo $row_c['id'];?>"><?php echo $row_c['description'];?></option>
                    <?php
                        }
                      }
                    ?>
                    </select>
                <label class="sr-only" for="dataInicio">Data de Início</label>
                <input class="form-control" id="dataInicio" type="text" name="dataInicio">
                <label class="sr-only" for="dataFim">Data de Fim</label>
                <input id="dataFim" type="text" name="dataFim">
                <label for="input7-ecommerce-03">Hora de Início</label>
                    <select class="custom-select d-block w-100" id="input7-ecommerce-03" name="hora" required>
                      <option value="" selected disabled>Escolha uma opção...</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                    </select>     
                    <select class="custom-select d-block w-100" id="input7-ecommerce-03" name="minutos" required>
                      <option value="" selected disabled>Escolha uma opção...</option>
                      <option value="00">00</option>
                      <option value="05">05</option>
                      <option value="10">10</option>
                      <option value="15">15</option>
                      <option value="20">20</option>
                      <option value="25">25</option>
                      <option value="30">30</option>
                      <option value="35">35</option>
                      <option value="40">40</option>
                      <option value="45">45</option>
                      <option value="50">50</option>
                      <option value="55">55</option>
                    </select>
                <button class="btn btn-primary btn-block py-2 my-3" formaction="save.php?s=18">Guardar</button>
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
  
  <?php
    }else{
      header("Location: error.php");
    }
  ?>

</html>

