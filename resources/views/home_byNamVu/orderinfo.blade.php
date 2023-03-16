@extends('layoutNV.homeLayout')
@section('tittle','Cart')
@section('content')
    <link rel="stylesheet" href="{{ asset('cssbyNamVu/orderlist.css') }}">
{{-- Hiển thị danh sách đã từng orders theo cus_id --}}
<div class="bgorder">
    <div class="container">
        <div class="headtext">
            <h1>Your orders list</h1>
        </div>

        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th class="d-none d-xl-table-cell">Nbr</th>
                    <th class="d-none d-xl-table-cell">Orders Code</th>
                    <th class="d-none d-xl-table-cell">Date</th>
                    <th class="d-none d-md-table-cell">Status</th>
                    <th class="d-none d-xl-table-cell">Method Payment</th>
                    <th class="d-none d-xl-table-cell">View</th>
                    <th colspan="2">Confirm</th>
                </tr>
            </thead>
            <tbody>
                {{-- order list --}}
                @if(!empty($orders))
                @foreach ($orders as $key=>$item)
                   <tr class="bodytable">
                        <td id="nbr" class="d-none d-xl-table-cell">{{ $key+1 }}</td>
                        <td class="d-none d-xl-table-cell">{{ $item->id}}</td>
                        <td class="d-none d-md-table-cell">{{ $item->ord_date}}</td>
                        <td class="d-none d-md-table-cell">{{ $item->ord_status }}</td>
                        <td class="d-none d-md-table-cell">{{ $item->methodpay}}</td>
                        <td><a href="{{ route('user.detailofcus', $item->id) }}" class="badge bg-primary">Detail</a></td>
                        @if($item->ord_status=="Pending")
                        <td><a href="{{ route('user.confirmdone', $item->id) }}" class="btn btn-success">Done</a>
                            <a href="{{ route('user.confirmcan', $item->id) }}" class="btn btn-warning">Cancel Orders</a></td>
                        {{-- <td></td> --}}
                        @else
                        <td>You have responded</td>
                        @endif
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <h5> You have <span id="shownbr"></span> Orders</h5>
    </div>
    <script>
        var nbr = document.querySelectorAll('#nbr');
        shownbr.innerText=nbr[nbr.length-1].innerText;
    </script>
</div>
@endsection
