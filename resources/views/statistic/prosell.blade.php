@extends('layoutNV.admin')

@section('title')
    <title>Product List Selling</title>
@endsection

@section('content')
<main class="content">
    <a href="{{ route('statistic.proselling') }}" class="badge bg-success">Product Selling</a>
    <a href="{{ route('statistic.prorevenue') }}" class="badge bg-warning">Product Revenue</a>
    <a href="{{ route('statistic.cusrevenue') }}" class="badge bg-warning">Customer by revenue</a>
        <h1 class="h3 mb-3" style="margin: 10px"><strong>Product List Selling</strong></h1>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">NBR</th>
                            <th class="d-none d-xl-table-cell">ID</th>
                            <th class="d-none d-xl-table-cell">Product Name</th>
                            <th class="d-none d-xl-table-cell">Category</th>
                            <th class="d-none d-xl-table-cell">Total quantity selling</th>
                            <th class="d-none d-xl-table-cell">view</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($listprosell))
                        @foreach($listprosell as $key=>$item)
                        <tr>
                            <td class="d-none d-xl-table-cell">{{ $key+1 }}</td>
                            <td><button class="badge bg-dark">{{ $item->id }}</button></td>
                            <td class="d-none d-xl-table-cell">{{ $item->pro_name }}</td>
                            <td class="d-none d-xl-table-cell">{{ $item->category}}</td>
                            <td class="d-none d-md-table-cell">{{ $item->totalquantity }}</td>
                            <td><a href="{{ route('product.detail', $item->id) }}" class="badge bg-primary"><i>Read more</i></a></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                {{-- {{ $paginate->onEachSide(5)->links('vendor.pagination.bootstrap-5') }} --}}
            </div>

        </div>
    </div>

</main>

@endsection

