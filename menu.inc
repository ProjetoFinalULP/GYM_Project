<?php

    echo "<nav class='navbar navbar-expand-lg navbar-light'><a class='navbar-brand' href='#'><img src='images/49464979_2252961474952750_7513931656697217024_n.jpg' alt='Go Up Fitness' width='35'></a>";
        echo "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navigations-04' aria-controls='navigations-04' aria-expanded='false' aria-label='Toggle navigation'><span class='navbar-toggler-icon'></span></button>";
        echo "<div class='collapse navbar-collapse' id='navigations-04'>";
        echo "<div class='d-flex flex-column flex-lg-row align-items-start justify-content-between w-100'>";
        echo "<ul class='navbar-nav order-2 order-lg-1'>";
            echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Planos</a>";
            echo "<div class='dropdown-menu'>";
                echo "<a class='dropdown-item' href='exever.php'>Gerir Exercicios</a>";
            echo "</div>";
            echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Aulas</a>";
            echo "<div class='dropdown-menu'>";
                echo "<a class='dropdown-item' href='#'>Gerir Aulas de Grupo</a>"; 
            echo "</div>";
            echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Administração</a>";
            echo "<div class='dropdown-menu'>";
                echo "<a class='dropdown-item' href='manageusers.php'>Gerir Utilizador</a>";
                echo "<a class='dropdown-item' href='#'>Gerir Calendario de Avaliação</a>";
                            
            echo "</div>";
            echo "</li>";
        echo "</ul>";
        echo "<ul class='navbar-nav order-1 order-lg-2'><li class='nav-item d-flex'><a class='nav-link p-0 m-0' href='#'><img class='rounded-circle' src='https://bootstrapshuffle.com/placeholder/pictures/bg_square.svg?primary=007bff' height='40' width='40' alt=''></a></li>";
              echo "<li class='nav-item dropdown'>";
                echo "<a class='nav-link dropdown-toggle' id='navigations-headers-04' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" . $row_u['firstName']." ".$row_u['lastName']." (".$user.")" . "</a>";
                echo "<div class='dropdown-menu dropdown-menu-right' aria-labelledby='navigations-headers-04'>";
                  echo "<a class='dropdown-item' href='settings.php'>Account settings</a>";
                  echo "<a class='dropdown-item' href='logout.php'>Logout</a>";
                echo "</div>";
              echo "</li>";
            echo "</ul>";
        echo "</div>";
        echo "</div>";
    echo "</nav>";

?>