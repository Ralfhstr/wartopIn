<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee List</title>
    <style>
        html {
            font-size: 12px;
        }

        .table {
            border-collapse: collapse !important;
            width: 100%;
        }

        .table-bordered th,
        .table-bordered td {
            padding: 0.5rem;
            border: 1px solid black !important;
        }
    </style>
</head>
<body>
    <h1>Employee List</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>User Name</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $index => $transaction)
            <tr>
                <td align="center">{{ $index + 1 }}</td>
                <td>{{ $transaction->user->name }}</td>
                <td>{{ $transaction->product->pname }}</td>
                <td align="center">{{ $transaction->tqty }}</td>
                <td>{{ $transaction->tprice }}</td>
                <td>{{ $transaction->payment->pyname }}</td>
                <td>{{ $transaction->status->stname }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
