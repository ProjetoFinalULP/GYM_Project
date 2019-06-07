<?php
    session_start();
    include 'config.inc';

    $sql_af = "SELECT leanBodyMassPercent,
                        waistHipRatio,
                        dateCreation 
            FROM physicalEvaluation";
    $result_af = mysqli_query($conn, $sql_af);
    
    $rows = array();
    while($r = mysqli_fetch_array($result_af)){
        $rows[] = $r;
    }

    print json_encode($rows);
    echo ",";
    print json_encode($rows);

    /*$string = json_encode($rows);
    echo $string;*/

?>