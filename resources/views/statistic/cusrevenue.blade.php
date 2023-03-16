@extends('layoutNV.admin')

@section('title')
    <title>Customers List Revenue</title>
@endsection

@section('content')
<main class="content">
    <a href="{{ route('statistic.proselling') }}" class="badge bg-warning">Product Selling</a>
    <a href="{{ route('statistic.prorevenue') }}" class="badge bg-warning">Product Revenue</a>
    <a href="{{ route('statistic.cusrevenue') }}" class="badge bg-success">Customer by revenue</a>
        <h1 class="h3 mb-3" style="margin: 10px"><strong>Customers List by Revenue</strong></h1>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">NBR</th>
                            <th class="d-none d-xl-table-cell">Customers ID</th>
                            <th class="d-none d-xl-table-cell">Customers Name</th>
                            <th class="d-none d-xl-table-cell">Phone</th>
                            <th class="d-none d-xl-table-cell">Email</th>
                            <th class="d-none d-xl-table-cell">Total Revenue</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($listcusrevenue))
                        @foreach($listcusrevenue as $key=>$item)
                        <tr>
                            <td class="d-none d-xl-table-cell">{{ $key+1 }}</td>
                            <td><button class="badge bg-dark">{{ $item->id }}</button></td>
                            <td class="d-none d-xl-table-cell">{{ $item->fullname }}</td>
                            <td class="d-none d-xl-table-cell">{{ $item->phone}}</td>
                            <td class="d-none d-md-table-cell">{{ $item->email }}</td>
                            <td class="d-none d-md-table-cell">{{ $item->Doanhthu }}</td>
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

