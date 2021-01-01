<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="main-container">
        
            
                <!--testing-->
                    
                    <div id="chartshow" style="height:400px; padding-top: 100px;"></div>
                    <!-- Charting library -->
                    <!-- <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
                    Chartisan
                    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script> -->
                    <!-- Your application script -->
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
                    <script type="text/javascript">
                       var analytics = <?php echo $gender; ?>

                       google.charts.load('current', {'packages':['corechart']});

                       google.charts.setOnLoadCallback(drawChart);

                       function drawChart()
                       {
                        var data = google.visualization.arrayToDataTable(analytics);
                        var options = {
                         title : 'Percentage of leads,customer and potentials'
                        };
                        var chart = new google.visualization.PieChart(document.getElementById('chartshow'));
                        chart.draw(data, options);
                       }
                    </script>
                 
            
        
    </div>
</body>
</html>