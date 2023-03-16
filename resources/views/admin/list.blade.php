@extends('layoutNV.admin')

@section('title')
    <title>Admin List</title>
@endsection

@section('content')
<style>

</style>
<main class="content">
    <div class="col-md-12">
        <h1 class="h3 mb-3"><strong>Admin List</strong></h1>


    <div class="container-fluid p-0">
            @if(session('msg'))
                <div style="font-size:20px; font-weight:bolder; color: rgb(8, 181, 250); text-align:center">
                 {{ session('msg') }}
                </div>
            @endif

        <div class="row">
            <div class="col-md-12 ">
                <a href="{{ route('admin.add') }}" class="btn btn-success float-end">Create</a>
            </div>
            <div class="col-md-12">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">Numberical</th>
                            <th class="d-none d-xl-table-cell">FullName</th>
                            <th class="d-none d-xl-table-cell">Email</th>
                            <th class="d-none d-xl-table-cell">Phone</th>
                            <th class="d-none d-md-table-cell">Create_at</th>
                            <th class="d-none d-xl-table-cell" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($admins))
                        @foreach ($admins as $key=>$item)
                           <tr>
                                <td class="d-none d-xl-table-cell">{{ $key+1 }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->fullname }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->email }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->phone}}</td>
                                <td class="d-none d-md-table-cell">{{ $item->create_at }}</td>
                                <td><a href="{{route('admin.edit', $item->id) }}" class="badge bg-secondary">Change pass</a></td>
                                <td><a onclick="return confirm('Are you sure delete?')" href="{{ route('admin.delete', $item->id) }}" class="badge bg-danger">Delete</a></td>
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

