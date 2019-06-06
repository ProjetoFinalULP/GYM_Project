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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
    google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        <?php
        include 'config.inc';
        session_start();
        $user = $_SESSION['user'];
        $sql_af = "SELECT weight, dateCreation 
          FROM physicalEvaluation 
          WHERE userUsername = '$user' ";
          $result_af = mysqli_query($conn, $sql_af);
          while ($row_af = mysqli_fetch_array($result_af)){
            echo "['".$row_af['dateCreation']."',".$row_af['weight']."],";
          }
        ?>
      ]);

      var options = {
        title: 'Population of Largest U.S. Cities',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Total Population',
          minValue: 0
        },
        vAxis: {
          title: 'City'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
    
    </script>
    
  <div id="chart_div"></div>
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>




https://jsfiddle.net/api/post/library/pure/
https://jsfiddle.net/api/post/library/pure/
http://www.techjunkgigs.com/google-charts-in-php-with-mysql-database-using-google-api/