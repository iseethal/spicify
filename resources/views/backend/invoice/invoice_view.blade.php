<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<style>
    table,
    td,
    th {
        border: 1px solid black;
        border-collapse: collapse;
    }

    table {
        width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    td,
    caption {
        padding: 16px;
    }

    th {
        padding: 16px;
        background-color: lightblue;
        text-align: left;
    }
</style>

<body>
    @php
        $id = $order->id;
    @endphp

    <table>
        <caption><b> Invoice </b></caption>
        <tr>
            <th colspan="3">Invoice #{{ $id}}</th>
            <th>{{ \Carbon\Carbon::parse(now())->format('d M Y')}}</th>
        </tr>
        <tr>
            <td colspan="2">
                <strong>Invoice Form:</strong> <br>
                Kriztle Gallery, P.T Usha Road <br>
                Cochin - 682 011 <br>
                Thrippunithura<br>
                Kerala State, India<br>
                +9947053222, 9961492022
            </td>
            <td colspan="2">
                <strong>Invoice To:</strong> <br>
                {{ $order->billing_firstname }} {{ $order->billing_lastname }}<br>
                {{ $order->billing_phone }} <br>
                @if( $order->billing_address1 != null)
                {{ $order->billing_address1 }}<br>
                @endif
                @if( $order->billing_address2 != null)
                {{ $order->billing_address2 }}<br>
                @endif
                @if( $order->country != null)
                {{ $order->country }},
                @endif
                @if( $order->billing_state != null)
                {{ $order->billing_state }},
                @endif
                @if( $order->billing_city != null)
                {{ $order->billing_city }}<br>
                @endif
                @if( $order->billing_zip_code != null)
                {{ $order->billing_zip_code }}<br>
                @endif
            </td>
        </tr>


         @php $i=1; @endphp

        @foreach ($order_items as $items)
            <tr>
                <td> {{ $i++ }} </td>
                <td> {{ $items->product_name }} </td>
                <td> {{ $items->quantity }} </td>
                <td> {{ $items->amount }} </td>
            </tr>
        @endforeach

        <tr>
            <th colspan="3">Subtotal:</th>
            <td>{{$order->total}}</td>
        </tr>
        {{-- <tr>
            <th colspan="2">Tax</th>
            <td>10%</td>
            <td>180</td>
        </tr> --}}
        <tr>
            <th colspan="3">Grand Total:</th>
            <td>{{$order->total}}</td>

        </tr>
    </table>
</body>

</html>
