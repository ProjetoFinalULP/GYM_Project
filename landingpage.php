<!DOCTYPE html>
<html lang="pl">
  <head>

  <?php

    session_start();

    include 'config.inc';
    
    $user = $_SESSION['user'];

    $sql_user = "SELECT firstName, lastName
                 FROM user
                 WHERE username = '$user'";
    $result_user = mysqli_query($conn, $sql_user);
    $row_user = mysqli_fetch_array($result_user);

  ?>

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
                
      <nav class="navbar navbar-expand-lg navbar-light"><a class="navbar-brand" href="#"><img src="images/49464979_2252961474952750_7513931656697217024_n.jpg" alt="GoUp" width="30"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigations-04" aria-controls="navigations-04" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navigations-04">
          <div class="d-flex flex-column flex-lg-row align-items-start justify-content-between w-100">
            <ul class="navbar-nav order-2 order-lg-1"><li class="nav-item"><a class="nav-link active" href="#">Plano Treino</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Plano Alimentar</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Evolu&ccedil;&atilde;o F&iacute;sica</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Aulas de Grupo</a></li>
            </ul><ul class="navbar-nav order-1 order-lg-2"><li class="nav-item d-flex"><a class="nav-link p-0 m-0" href="#"><img class="rounded-circle" src="https://bootstrapshuffle.com/placeholder/pictures/bg_square.svg?primary=007bff" height="40" width="40" alt=""></a></li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navigations-headers-04" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $row_user['firstName']." ".$row_user['lastName']." (".$user.")";?></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navigations-headers-04"><a class="dropdown-item" href="#">Account settings</a><a class="dropdown-item" href="#">Logout</a></div>
              </li>
            </ul></div>
        </div>
      </nav>
                
      <section class="py-4">
        <div class="container-fluid">
          <h2 class="mb-4">Order status</h2>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Invoice</th>
                  <th scope="col">User</th>
                  <th scope="col">Order date</th>
                  <th scope="col">Amount</th>
                  <th class="text-center" scope="col">Status</th>
                  <th class="text-center" scope="col">User ID</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Order #118</td>
                  <td>Sofia Henderson</td>
                  <td>Nov 04, 2018</td>
                  <td>$10.00</td>
                  <td class="text-center"><span class="badge badge-success">Paid</span></td>
                  <td class="text-center">-</td>
                </tr>
                <tr>
                  <td>Order #119</td>
                  <td>James Vaughan</td>
                  <td>Nov 05, 2018</td>
                  <td>$10.00</td>
                  <td class="text-center"><span class="badge badge-primary">Registered</span></td>
                  <td class="text-center">df8d9dbacf1853782</td>
                </tr>
                <tr>
                  <td>Order #120</td>
                  <td>Megan Kerr</td>
                  <td>Nov 05, 2018</td>
                  <td>$50.00</td>
                  <td class="text-center"><span class="badge badge-success">Paid</span></td>
                  <td class="text-center">-</td>
                </tr>
                <tr>
                  <td>Order #121</td>
                  <td>Finley Metcalfe</td>
                  <td>Nov 08, 2018</td>
                  <td>$100.00</td>
                  <td class="text-center"><span class="badge badge-success">Paid</span></td>
                  <td class="text-center">-</td>
                </tr>
                <tr>
                  <td>Order #123</td>
                  <td>Louise Ryan</td>
                  <td>Nov 10, 2018</td>
                  <td>$50.00</td>
                  <td class="text-center"><span class="badge badge-danger">Rafunded</span></td>
                  <td class="text-center">-</td>
                </tr>
                <tr>
                  <td>Order #124</td>
                  <td>Kayleigh Chadwick</td>
                  <td>Nov 14, 2018</td>
                  <td>$10.00</td>
                  <td class="text-center"><span class="badge badge-success">Paid</span></td>
                  <td class="text-center">-</td>
                </tr>
                <tr>
                  <td>Order #125</td>
                  <td>Elise Anderson</td>
                  <td>Nov 14, 2018</td>
                  <td>$50.00</td>
                  <td class="text-center"><span class="badge badge-warning">Unpaid</span></td>
                  <td class="text-center">-</td>
                </tr>
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

