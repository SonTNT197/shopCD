@extends('layoutNV.admin')

@section('title')
    <title>Revenue</title>
@endsection

@section('content')


<main class="content">
<a href="{{ route('statistic.saleday') }}" class="badge bg-success">Revenue by day</a>
<a href="{{ route('statistic.salemonth') }}" style="margin: 0 10px" class="badge bg-secondary">Revenue by month</a>
<style>
.khung{
    margin: 10px;
    padding: 10px;
    border: 1px solid rgb(13, 255, 0);
    border-radius: 7px;
}
h3{
    text-align: right;
}
</style>
    <div class="row khung">
            <div class="col-md-3">
                <h3><strong style="color: rgb(252, 120, 4); text-align:right; font-size:18px">Revenue by day: </strong></h3>
            </div>
            <div class="col-md-4">
                <h2 style="color: red">{{ $subtotalday[0]->subtotal }}$</h2>
            </div>
            <div class="col-md-4">
                <form class="d-flex" method="GET">
                    <input class="form-control me-2" name="keyword" type="date" aria-label="Search" required>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    <div class="container-fluid p-0">
            @if(session('msg'))
                <div style="font-size:20px; font-weight:bolder; color: rgb(8, 181, 250); text-align:center">
                 {{ session('msg') }}
                </div>
            @endif

        <div class="row">
            <div class="col-md-12">
                <fieldset >
                <span><strong style="color: rgb(255, 0, 140); font-size:16px">List Orders: {{ $keyword }} </strong></span>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">NBR</th>
                            <th class="d-none d-xl-table-cell">Order ID</th>
                            <th class="d-none d-xl-table-cell">Customer</th>
                            <th class="d-none d-xl-table-cell">Date</th>
                            <th class="d-none d-md-table-cell">Total</th>
                            <th class="d-none d-md-table-cell">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($listorderday))
                        @foreach ($listorderday as $key=>$item)
                           <tr>
                                <td class="d-none d-xl-table-cell">{{ $key+1 }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->id }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->fullname }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->ord_date }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->total }}$</td>
                                <td><a href="{{ route('order.detail', $item->id) }}" class="badge bg-primary">Detail</a></td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
              </fieldset>
        </div>
        </div>
    </div>
</main>
@endsection

