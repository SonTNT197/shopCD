@extends('layoutNV.admin')

@section('title')
    <title>Customers List</title>
@endsection

@section('content')


<main class="content">
<style>
    form{
        margin: 10px;
    }
</style>
    <div class="col-md-12">
        <h1 class="h3 mb-3"><strong>Customers List</strong></h1>
            <div class="col-md-4">
                <form class="d-flex" method="GET">
                    <input class="form-control me-2" type="search" name="key_word" placeholder="Enter Customer Name" aria-label="Search" >
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">NBR</th>
                            <th class="d-none d-xl-table-cell">CustomersID</th>
                            <th class="d-none d-xl-table-cell">Name</th>
                            <th class="d-none d-xl-table-cell">Email</th>
                            <th class="d-none d-xl-table-cell">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($customers))
                        @foreach ($customers as $key=>$item)
                           <tr>
                                <td class="d-none d-xl-table-cell">{{ $key+1 }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->id }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->fullname }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->email }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->phone}}</td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

@endsection

