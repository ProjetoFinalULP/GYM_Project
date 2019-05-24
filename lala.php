<?php

    //include 'config.inc';

    $sql = "SELECT description FROM weekday";
    $sql_result = mysqli_query($link, $sql);
    $sql_row = mysqli_fetch_array($sql_query);

    print_r($sql_row);


?>