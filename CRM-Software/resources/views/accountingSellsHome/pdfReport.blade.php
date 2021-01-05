<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
</head>
<body>
	<h1>{{$title}}</h1>
    <h3>Customer Information</h3>
	<p>
        Total Customer: {{$totalCustomer}}
        <br>
        Active Customer: {{$activeCustomer}}
        <br>
        Male Customer: {{$maleCustomer}}
        <br>
        Female Customer: {{$femaleCustomer}}
        <br>
    </p>

    <h3>Product Information</h3>
    <p>
        Total Product: {{$totalProduct}}
        <br>
        Total product in Stock: {{$totalProductInStock}}
        <br>
    </p>
</body>
</html>