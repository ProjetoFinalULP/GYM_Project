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

    <?php 
     
      session_start();
      include 'config.inc';

      $user = $_SESSION['user'];
      
    ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {packages: ['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var jsonData = $.ajax({
          url:"getData.php",
          dataType: "json",
          async: false
        }).responseText;
        
        var data = new google.visualization.DataTable(jsonData);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom'}
        };
       
        //var chart = new google.charts.Line(document.getElementById('chart_div'));
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

        chart.draw(data, options);
        //chart.draw(data, google.charts.Line.convertOptions(options));
      }
    
    </script>



  </head>
  
  
  
  <body>

    <div class="container-fluid">
      <?php
        include 'menu.inc';
      ?>
  
    
      <div id="chart_div" style="width: 900px; height: 500px;"></div>
    </div>

  
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
  </body>
</html>




<!--https://jsfiddle.net/api/post/library/pure/
https://jsfiddle.net/api/post/library/pure/
http://www.techjunkgigs.com/google-charts-in-php-with-mysql-database-using-google-api/-->