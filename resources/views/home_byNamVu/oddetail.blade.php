@extends('layoutNV.homeLayout')
@section('tittle','Cart')
@section('content')
    <link rel="stylesheet" href="{{ asset('cssbyNamVu/orderlist.css') }}">
{{-- Hiển thị danh sách đã từng orders theo cus_id --}}
<div class="bgorder">
    <div class="container">
        <div class="headtext">
            <h1>Your order detail: {{ $order[0]->id }}</h1>
        </div>

        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th class="d-none d-xl-table-cell">NBR</th>
                    <th class="d-none d-xl-table-cell">Product name</th>
                    <th class="d-none d-xl-table-cell">Image</th>
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
                        <td class="d-none d-xl-table-cell" ><img src="{{ asset($item->img_first) }}" alt="" height="100px"></td>
                        <td class="d-none d-md-table-cell">{{ $item->pro_price}}$</td>
                        <td class="d-none d-md-table-cell">{{ $item->quantity}}</td>
                        <td class="d-none d-md-table-cell">{{ $item->total}}$</td>
                    </tr>

                @endforeach
                @endif
                @if(!empty($total))
                <tr>
                    <td style="text-align: right; color:rgb(22, 1, 19); font-weight:600" colspan="5">Subtotal:</td>
                    <td style="color: rgba(17, 0, 16, 0.988); font-weight:600">{{ $total[0]->subtotal }}$</td>
                </tr>
                @endif
            </tbody>
        </table>
        {{-- <h5> You have <span id="shownbr"></span> Orders</h5> --}}
    </div>
    <script>
        var nbr = document.querySelectorAll('#nbr');
        shownbr.innerText=nbr[nbr.length-1].innerText;
    </script>
</div>
@endsection
