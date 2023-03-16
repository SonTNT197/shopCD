@extends('layoutNV.admin')

@section('title')
    <title>Order Detail</title>
@endsection

@section('content')
<style>
    .inforders{
        color: rgb(12, 1, 11);
        font-weight: 600;
        font-size: 16px;
        min-width: 100px;
        height: 20px;
    }
    .order{
        border: 1px solid rgb(255, 191, 0);
        padding: 10px;
        border-radius: 7px;
    }

</style>
<main class="content">
    <div class="col-md-12">
        <h1 class="h3 mb-3"><strong>Order Detail</strong></h1>
    </div>
    <div class="col-md-12">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-12 order">
                {{-- @if(!empty($order)) --}}
                <div class="row">
                    <table class="table" style="width:600px; height:70px">
                        <tbody>
                           <tr>
                                <td class="inforders">Order ID:</td>
                                <td class="inforders">{{ $order[0]->id }}</td>
                            </tr>
                            <tr>
                                <td class="inforders">Customer: </td>
                                <td class="inforders">{{ $order[0]->fullname }}</td>
                            </tr>
                            <tr>
                                <td class="inforders">Date: </td>
                                <td class="inforders">{{ $order[0]->ord_date }}</td>
                            </tr>
                            <tr>
                                <td class="inforders">Address Shipping:</td>
                                <td class="inforders">{{ $order[0]->address }}</td>
                            </tr>
                            <tr>
                                <td class="inforders">Method Payment:</td>
                                <td class="inforders">{{ $order[0]->methodpay }}</td>
                            </tr>
                            <tr>
                                <td class="inforders">Status:</td>
                                <td class="inforders">{{ $order[0]->ord_status }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- @endif --}}
                    <div class="col-md-12">
                   <table class="table table-warning">
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
                        @if(!empty($orderdetail))
                        @foreach ($orderdetail as $key=>$item)
                           <tr>
                                <td class="d-none d-xl-table-cell">{{ $key+1 }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->pro_name}}</td>
                                <td class="d-none d-md-table-cell">{{ $item->pro_price}}$</td>
                                <td class="d-none d-md-table-cell">{{ $item->quantity}}</td>
                                <td class="d-none d-md-table-cell">{{ $item->total}}$</td>
                            </tr>

                        @endforeach
                        @endif
                        @if(!empty($total))
                        <tr>
                            <td style="text-align: right; color:rgb(22, 1, 19); font-weight:600" colspan="4">Subtotal:</td>
                            <td style="color: rgba(17, 0, 16, 0.988); font-weight:600">{{ $total[0]->subtotal }}$</td>
                        </tr>
                        @endif
                    </tbody>
                   </table>
                    <a target="blank" href="{{ route('order.exportPDF',$order[0]->id )}}" class="btn btn-secondary float-end">ExportPDF</a>
                   </div>
                </div>

            </div>

        </div>
    </div>

</main>

@endsection
