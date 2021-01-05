<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	 <div id="chartshow" style="height:400px;"></div>
                    <!-- Charting library -->
                    <!-- <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
                    Chartisan
                    <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script> -->
                    <!-- Your application script -->
                    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
                    <!-- Chartisan -->
                    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
                    <script>
                      const chart = new Chartisan({
                        el: '#chartshow',
                        url: "@chart('marketchart')",
                        hooks: new ChartisanHooks()
                        .colors()
                        .responsive()
                        .beginAtZero()
                        .title('This is a sample chart using chartisan!')
                        .datasets(['bar','bar','bar']),
                      });
                    </script>
</body>
</html>