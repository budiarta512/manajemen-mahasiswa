<?php
$con = mysqli_connect("localhost","root","","bd203_db_uts");

?>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date',  'Point'],
          <?php
          $sql = "SELECT * FROM behavior WHERE nim LIKE '%200030289%'";
          $fire = mysqli_query($con,$sql);
          while ($result = mysqli_fetch_assoc($fire)){
            echo"['".$result['tanggal']."', ".$result['point']."],";
          }
          ?>

        ]);

        var options = {
          title: 'Student Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>
