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
?>
  

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
                <label class="sr-only" for="input1-signin-03">ID Utilizador</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="text" placeholder="ID Utilizador" name="iduser"> 
                <select class="form-control mb-3" name="sexo">
                  <option disabled="" selected="">Sexo</option>
                  <option value="M">M</option>
                  <option value="F">F</option>
                </select>
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Idade" name="idade">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Altura" name="altura">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Peso" name="peso">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number"  step="0.01" placeholder="Massa Gorda (%)" name="massagordap">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Massa Magra (kg)" name="massamagrakg">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Idade Metabolica" name="idademetabolica">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Percentagem de água corpural" name="aguacorpural">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Cintura" name="cintura">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Anca" name="anca">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Pescoço" name="pescoco">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Ombro" name="ombro">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Tórax" name="torax">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Abdómen" name="abdomen">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Braço direito contraido" name="bracodireitocontraido">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Braço direito descontraido" name="bracodireitodescontraido">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Braço esquerdo contraido" name="bracoesquerdocontraido">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Braço esquerdo descontraido" name="bracoesquerdodescontraido">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Antebraço esquerdo" name="antebracoesquerdo">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Antebraço direiro" name="antebracodireito">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Coxa esquerda" name="coxaesquerda">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Coxa direita" name="coxadireira">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Gémeo esquerdo" name="gemeoesquerdo">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <input class="form-control my-3 bg-light" id="input1-signin-03" type="number" step="0.01" placeholder="Gémeo direito" name="gemeodireito">
                <label class="sr-only" for="input1-signin-03">Name Exercicio</label>
                <button class="btn btn-primary btn-block py-2 my-3" formaction="save.php?s=7">Guardar</button>
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

	