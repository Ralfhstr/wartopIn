<table>
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
                <td>{{ $index + 1 }}</td>
                <td>{{ $transaction->user->name }}</td>
                <td>{{ $transaction->product->pname }}</td>
                <td>{{ $transaction->tqty }}</td>
                <td>{{ $transaction->tprice }}</td>
                <td>{{ $transaction->payment->pyname }}</td>    
                <td>{{ $transaction->status->stname }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
