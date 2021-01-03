<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Income Report</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <br>
        <h1 class="text-white bg-dark text-center">
            Income List

        </h1><br>
        <table class="table table-striped">
            <thead>
                <tr>

                    <th class="table-plus datatable-nosort">Year</th>
                    <th>Month</th>
                    <th>Income</th>
                </tr>
            </thead>
            <tbody>

                {{-- @for ($i = 0; $i < count($orders); $i++)
                    <tr>
                        <td class="table-plus">{{ $orders[$i]['Year'] }}</td>


                        <td>{{ $orders[$i]['Month'] }}</td>
                        <td>{{ $orders[$i]['Income'] }}</td>




                    </tr>
                @endfor --}}
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->Year }}</td>
                        <td>{{ $order->Month }}</td>
                        <td>{{ $order->Income }}</td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</body>

</html>
