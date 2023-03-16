@extends('layoutNV.admin')

@section('title')
    <title>Home Page</title>
@endsection

@section('content')

<style>
    .icon{
        /* text-shadow: 2px 4px 6px rgb(255, 85, 0); */
        color: rgb(251, 75, 6);
        margin: 10px;
        font-size: 50px;
    }
    .card{
        height: 250px;
    }
    .customers{
        background-color: rgb(236, 233, 64);
    }
    .products{
        background-color: rgb(61, 255, 122)
    }
    .orders{
        background-color: rgb(106, 235, 255)
    }
    h2{
        text-align: right;
        font-size: 50px;
        margin: 10px;
    }
    .more_info{
        width: 100%;
        text-align: center;
        height: 40px;
        text-decoration: none;
        font-size: 20px;
        background-color: rgb(237, 254, 255);
        color: rgb(242, 1, 246);
        font-weight: 600;
    }
</style>
    <main class="content">
        <div class="container-fluid p-0">
            {{-- <h1 class="h3 mb-3"><strong>OceanGate</strong></h1> --}}
        <div class="row">
            {{-- <img src="{{ asset('adminkit\src\img\photos\swiper5.jpg') }}" alt=""> --}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="card customers">
                            <i class="fa fa-user icon" aria-hidden="true"></i>
                            <h1>CUSTOMERS</h1>
                            <h2>{{ $tongcus[0]->tong }}</h2>
                            <span class="more_info"><a href="{{ route('customer.list') }}" class="more_info">More Info</a></span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card products">
                            <i class="fa fa-window-restore icon" aria-hidden="true"></i>
                            <H1>PRODUCTS</H1>
                            <h2>{{ $tongpro[0]->tong }}</h2>
                            <span class="more_info"><a href="{{ route('product.list') }}" class="more_info">More Info</a></span>
                       </div>
                   </div>
                    <div class="col-md-4">
                        <div class="card orders">
                            <i class="fa fa-shopping-basket icon" aria-hidden="true"></i>
                            <h1>ORDERS</h1>
                            <h2>{{ $tongorder[0]->tong }}</h2>
                            <span class="more_info"><a href="{{ route('order.list') }}" class="more_info">More Info</a></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h1>List New Orders(today)</h1>
                        <table class="table table-success table-striped">
                            <thead>
                                <tr>
                                    <th class="d-none d-xl-table-cell">Nbr</th>
                                    <th class="d-none d-xl-table-cell">ID</th>
                                    <th class="d-none d-xl-table-cell">Customer</th>
                                    <th class="d-none d-xl-table-cell">Date</th>
                                    <th class="d-none d-md-table-cell">Status</th>
                                    <th class="d-none d-xl-table-cell">View</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($ordertoday))
                                @foreach ($ordertoday as $key=>$item)
                                   <tr>
                                        <td class="d-none d-xl-table-cell">{{ $key+1 }}</td>
                                        <td class="d-none d-xl-table-cell">{{ $item->id}}</td>
                                        <td class="d-none d-md-table-cell">{{ $item->cus_id}}</td>
                                        <td class="d-none d-md-table-cell">{{ $item->ord_date }}</td>
                                        @if($item->ord_status=='Pending')
                                        <td ><span class="btn btn-secondary">{{ $item->ord_status }}</span>
                                        @elseif($item->ord_status=='Complete')
                                        <td ><span class="btn btn-success">{{ $item->ord_status }}</span></td>
                                        @elseif($item->ord_status=='Cancel')
                                        <td ><span class="btn btn-warning">{{ $item->ord_status }}</span></td>
                                        @endif
                                        <td><a href="{{ route('order.detail', $item->id) }}" class="badge bg-primary">Detail</a></td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
        </div>
        </div>
    </main>
@endsection

