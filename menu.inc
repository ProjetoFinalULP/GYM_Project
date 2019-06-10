<?php

    $sql_menu1 = "SELECT description,
                        link,
                        accessId
                 FROM menu
                 WHERE category = 1
                 AND active = 'Y'";
    $result_menu1 = mysqli_query($conn, $sql_menu1);

    $sql_menu2 = "SELECT description,
                        link,
                        accessId
                 FROM menu
                 WHERE category = 2
                 AND active = 'Y'";
    $result_menu2 = mysqli_query($conn, $sql_menu2);
    
    $sql_menu3 = "SELECT description,
                        link,
                        accessId
                 FROM menu
                 WHERE category = 3
                 AND active = 'Y'";
    $result_menu3 = mysqli_query($conn, $sql_menu3);

    $sql_menu4 = "SELECT description,
                        link,
                        accessId
                 FROM menu
                 WHERE category = 4
                 AND active = 'Y'";
    $result_menu4 = mysqli_query($conn, $sql_menu4);
    
    $sql_menu5 = "SELECT description,
                        link,
                        accessId
                 FROM menu
                 WHERE category = 5
                 AND active = 'Y'";
    $result_menu5 = mysqli_query($conn, $sql_menu5);

    $sql_u = "SELECT firstName,
                      lastName
              FROM user
              WHERE username = '$user'";
    $result_u = mysqli_query($conn, $sql_u);
    $row_u = mysqli_fetch_array($result_u);

    switch($access){

        case 1:  /* ADMIN */             

            echo "<nav class='navbar navbar-expand-lg navbar-light'><a class='navbar-brand' href='landingpage.php'><img src='images/49464979_2252961474952750_7513931656697217024_n.jpg' alt='Go Up Fitness' width='35'></a>";
                echo "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navigations-04' aria-controls='navigations-04' aria-expanded='false' aria-label='Toggle navigation'><span class='navbar-toggler-icon'></span></button>";
                echo "<div class='collapse navbar-collapse' id='navigations-04'>";
                echo "<div class='d-flex flex-column flex-lg-row align-items-start justify-content-between w-100'>";
                echo "<ul class='navbar-nav order-2 order-lg-1'>";
                    echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Planos</a>";
                    echo "<div class='dropdown-menu'>";
                        if(mysqli_num_rows($result_menu1) > 0){
                            while($row_m1 = mysqli_fetch_array($result_menu1)){
                                echo "<a class='dropdown-item' href=" . $row_m1['link'] . ">" . $row_m1['description'] . "</a>";
                            }
                        }    
                    echo "</div>";

                    echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Avaliações</a>";
                    echo "<div class='dropdown-menu'>";
                        if(mysqli_num_rows($result_menu2) > 0){
                            while($row_m2 = mysqli_fetch_array($result_menu2)){
                                echo "<a class='dropdown-item' href=" . $row_m2['link'] . ">" . $row_m2['description'] . "</a>";
                            }
                        }
                    echo "</div>";

                    echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Aulas</a>";
                    echo "<div class='dropdown-menu'>";
                        if(mysqli_num_rows($result_menu3) > 0){
                            while($row_m3 = mysqli_fetch_array($result_menu3)){
                                echo "<a class='dropdown-item' href=" . $row_m3['link'] . ">" . $row_m3['description'] . "</a>";
                            }
                        }    
                    echo "</div>";

                    echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Administração</a>";
                    echo "<div class='dropdown-menu'>";
                        if(mysqli_num_rows($result_menu4) > 0){
                            while($row_m4 = mysqli_fetch_array($result_menu4)){
                                echo "<a class='dropdown-item' href=" . $row_m4['link'] . ">" . $row_m4['description'] . "</a>";
                            }
                        }    
                    echo "</div>";

                    echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Outros</a>";
                    echo "<div class='dropdown-menu'>";
                        if(mysqli_num_rows($result_menu5) > 0){
                            while($row_m5 = mysqli_fetch_array($result_menu5)){
                                echo "<a class='dropdown-item' href=" . $row_m5['link'] . ">" . $row_m5['description'] . "</a>";
                            }
                        }
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
            break;

        case 2: /* NUTRICIONISTA */

            echo "<nav class='navbar navbar-expand-lg navbar-light'><a class='navbar-brand' href='landingpage.php'><img src='images/49464979_2252961474952750_7513931656697217024_n.jpg' alt='Go Up Fitness' width='35'></a>";
                echo "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navigations-04' aria-controls='navigations-04' aria-expanded='false' aria-label='Toggle navigation'><span class='navbar-toggler-icon'></span></button>";
                echo "<div class='collapse navbar-collapse' id='navigations-04'>";
                echo "<div class='d-flex flex-column flex-lg-row align-items-start justify-content-between w-100'>";
                echo "<ul class='navbar-nav order-2 order-lg-1'>";
                    echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Planos</a>";
                    echo "<div class='dropdown-menu'>";
                        if(mysqli_num_rows($result_menu1) > 0){
                            while($row_m1 = mysqli_fetch_array($result_menu1)){
                                echo "<a class='dropdown-item' href=" . $row_m1['link'] . ">" . $row_m1['description'] . "</a>";
                            }
                        }  
                    echo "</div>";

                    echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Avaliações</a>";
                    echo "<div class='dropdown-menu'>";
                        if(mysqli_num_rows($result_menu2) > 0){
                            while($row_m2 = mysqli_fetch_array($result_menu2)){
                                echo "<a class='dropdown-item' href=" . $row_m2['link'] . ">" . $row_m2['description'] . "</a>";
                            }
                        }
                    echo "</div>";
                echo "</ul>";
                echo "<ul class='navbar-nav order-1 order-lg-2'><li class='nav-item d-flex'><a class='nav-link p-0 m-0' href='landingpage.php'><img class='rounded-circle' src='https://bootstrapshuffle.com/placeholder/pictures/bg_square.svg?primary=007bff' height='40' width='40' alt=''></a></li>";
                    echo "<li class='nav-item dropdown'>";
                        echo "<a class='nav-link dropdown-toggle' id='navigations-headers-04' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" . $row_u['firstName']." ".$row_u['lastName']." (".$user.")" . "</a>";
                        echo "<div class='dropdown-menu dropdown-menu-right' aria-labelledby='navigations-headers-04'>";
                        echo "<a class='dropdown-item' href='settings.php'>Account settings</a>";
                        echo "<a class='dropdown-item' href='logout.php'>Logout</a>";
                        echo "</div>";

                    echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Outros</a>";
                    echo "<div class='dropdown-menu'>";
                        if(mysqli_num_rows($result_menu5) > 0){
                            while($row_m5 = mysqli_fetch_array($result_menu5)){
                                echo "<a class='dropdown-item' href=" . $row_m5['link'] . ">" . $row_m5['description'] . "</a>";
                            }
                        }
                    echo "</div>";
                    echo "</li>";
                    echo "</ul>";
                echo "</div>";
                echo "</div>";
            echo "</nav>";
            break;

        case 3: /* TREINADOR */
            
            echo "<nav class='navbar navbar-expand-lg navbar-light'><a class='navbar-brand' href='landingpage.php'><img src='images/49464979_2252961474952750_7513931656697217024_n.jpg' alt='Go Up Fitness' width='35'></a>";
                echo "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navigations-04' aria-controls='navigations-04' aria-expanded='false' aria-label='Toggle navigation'><span class='navbar-toggler-icon'></span></button>";
                echo "<div class='collapse navbar-collapse' id='navigations-04'>";
                echo "<div class='d-flex flex-column flex-lg-row align-items-start justify-content-between w-100'>";
                echo "<ul class='navbar-nav order-2 order-lg-1'>";
                    echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Planos</a>";
                    echo "<div class='dropdown-menu'>";
                        if(mysqli_num_rows($result_menu1) > 0){
                            while($row_m1 = mysqli_fetch_array($result_menu1)){
                                echo "<a class='dropdown-item' href=" . $row_m1['link'] . ">" . $row_m1['description'] . "</a>";
                            }
                        }  
                    echo "</div>";

                    echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Avaliações</a>";
                    echo "<div class='dropdown-menu'>";
                        if(mysqli_num_rows($result_menu2) > 0){
                            while($row_m2 = mysqli_fetch_array($result_menu2)){
                                echo "<a class='dropdown-item' href=" . $row_m2['link'] . ">" . $row_m2['description'] . "</a>";
                            }
                        }
                    echo "</div>";
                echo "</ul>";
                echo "<ul class='navbar-nav order-1 order-lg-2'><li class='nav-item d-flex'><a class='nav-link p-0 m-0' href='#'><img class='rounded-circle' src='https://bootstrapshuffle.com/placeholder/pictures/bg_square.svg?primary=007bff' height='40' width='40' alt=''></a></li>";
                    echo "<li class='nav-item dropdown'>";
                        echo "<a class='nav-link dropdown-toggle' id='navigations-headers-04' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>" . $row_u['firstName']." ".$row_u['lastName']." (".$user.")" . "</a>";
                        echo "<div class='dropdown-menu dropdown-menu-right' aria-labelledby='navigations-headers-04'>";
                        echo "<a class='dropdown-item' href='settings.php'>Account settings</a>";
                        echo "<a class='dropdown-item' href='logout.php'>Logout</a>";
                        echo "</div>";

                    echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Outros</a>";
                    echo "<div class='dropdown-menu'>";
                        if(mysqli_num_rows($result_menu5) > 0){
                            while($row_m5 = mysqli_fetch_array($result_menu5)){
                                echo "<a class='dropdown-item' href=" . $row_m5['link'] . ">" . $row_m5['description'] . "</a>";
                            }
                        }
                    echo "</div>";
                    echo "</li>";
                    echo "</ul>";
                echo "</div>";
                echo "</div>";
            echo "</nav>";
            break;

        case 4: /* RECEPCIONISTA */

             echo "<nav class='navbar navbar-expand-lg navbar-light'><a class='navbar-brand' href='landingpage.php'><img src='images/49464979_2252961474952750_7513931656697217024_n.jpg' alt='Go Up Fitness' width='35'></a>";
                echo "<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navigations-04' aria-controls='navigations-04' aria-expanded='false' aria-label='Toggle navigation'><span class='navbar-toggler-icon'></span></button>";
                echo "<div class='collapse navbar-collapse' id='navigations-04'>";
                echo "<div class='d-flex flex-column flex-lg-row align-items-start justify-content-between w-100'>";
                echo "<ul class='navbar-nav order-2 order-lg-1'>";

                    echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Aulas</a>";
                    echo "<div class='dropdown-menu'>";
                        if(mysqli_num_rows($result_menu3) > 0){
                            while($row_m3 = mysqli_fetch_array($result_menu3)){
                               echo "<a class='dropdown-item' href=" . $row_m3['link'] . ">" . $row_m3['description'] . "</a>";
                            }
                        }    
                    echo "</div>";

                    echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Administração</a>";
                    echo "<div class='dropdown-menu'>";
                        if(mysqli_num_rows($result_menu4) > 0){
                            while($row_m4 = mysqli_fetch_array($result_menu4)){
                                echo "<a class='dropdown-item' href=" . $row_m4['link'] . ">" . $row_m4['description'] . "</a>";
                            }
                        }    
                    echo "</div>";

                    echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>Outros</a>";
                    echo "<div class='dropdown-menu'>";
                        if(mysqli_num_rows($result_menu5) > 0){
                            while($row_m5 = mysqli_fetch_array($result_menu5)){
                                echo "<a class='dropdown-item' href=" . $row_m5['link'] . ">" . $row_m5['description'] . "</a>";
                            }
                        }
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
            break;
        
        default: /* UTILIZADOR */
            break;
    }


?>