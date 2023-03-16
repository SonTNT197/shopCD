<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Online</title>
    <style>
        /* *{
            margin: 0;
            padding: 0;
        } */
        body {
            margin: 0;
            size: A4;
        }

        .container {
            width: 100%;
        }

        .head {
            /* position: fixed; */
            width: 100%;
            /* top: 0; */
            /* margin: 20px 0; */
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        table {
            width: 70%;
            margin: 20px;
            border-collapse: collapse;
        }

        .head_right {
            width: 30%;
            float: left
        }

        /* .head_left h1{
            height: 40px;
        } */

        .head_left {
            float: left;
            width: 70%;
        }
        .head_left div{
            font-size: 40px;
            font-weight: 600;
        }

        .head_right div{
            font-size: 40px;
        }
        .infocus {
            margin-top: 100px;
            text-align: center;
            width: 100%;
        }
        .infocus h3{
            /* text-align: center; */
            width: 50%;
            text-align: center;
            margin: 0 auto;
        }

        .infocus table tbody tr td{
            border: none;
            margin-right: 20px;
        }
        .infocus table{
            border: none;
            width: 300px;
            margin: 0 auto;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class=" head">
            <div class="head_left">
                <div style="color: rgb(0, 123, 255)">OceanGate</div>
                <span>Oceangate.org.vn</span>
            </div>
            <div class="head_right">
                <div style="font-size: 16px; color:rgb(255, 110, 6); font-weight:700">#{{ $order[0]->id }}</div>
                <span>Date: {{ $order[0]->ord_date }}</span>
            </div>

        </div>
        <div class="infocus">
            <h3>ORDER DETAIL</h3>
            <table>
                <tbody>
                    <tr>
                        <td>Customer:</td>
                        <td>{{ $order[0]->fullname }}</td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td>{{ $order[0]->phone }}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{{ $order[0]->email }}</td>
                    </tr>
                    <tr>
                        <td>Address Shipping:</td>
                        <td>{{ $order[0]->address }}</td>
                    </tr>
                    <tr>
                        <td>Method Payment:</td>
                        <td>{{ $order[0]->methodpay }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table">
            <table >
                <thead>
                    <tr>
                        <th class="d-none d-xl-table-cell">NBR</th>
                        <th class="d-none d-xl-table-cell">Product name</th>
                        <th class="d-none d-xl-table-cell">Product price</th>
                        <th class="d-none d-xl-table-cell">Quantity</th>
                        <th class="d-none d-md-table-cell">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($orderdetail))
                        @foreach ($orderdetail as $key => $item)
                            <tr>
                                <td class="d-none d-xl-table-cell">{{ $key + 1 }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->pro_name }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->pro_price }}$</td>
                                <td class="d-none d-md-table-cell">{{ $item->quantity }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->total }}$</td>
                            </tr>
                        @endforeach
                    @endif
                    {{-- @if (!empty($total)) --}}
                    <tr>
                        <td style="text-align: right; color:rgb(22, 1, 19); font-weight:600" colspan="4">Subtotal:
                        </td>
                        <td style="color: rgba(17, 0, 16, 0.988); font-weight:600">{{ $total[0]->subtotal }}$</td>

                        {{-- @endif --}}
                </tbody>
            </table>
            <h4>Tax:</h4>
            <h4>The total amount payable: </h4>
        </div>
        <hr>
        <div class="footer">
            <span>THIS STORE IS OFFERING REMOTE SELLING FACILITIES</span><br>
            <span>Aptech Education Building, 285 Doi Can,Lieu Giai, Ba Dinh, Ha Noi city, Viet Nam</span><br>
            <span>Email: namvu042k11@gmail.com</span><br>
            <span>T:+84.39.362.482</span>
            <h4>Thank you verymuch!</h4>
        </div>

    </div>
</body>

</html>
