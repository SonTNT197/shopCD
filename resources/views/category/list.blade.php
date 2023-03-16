@extends('layoutNV.admin')

@section('title')
    <title>Category List</title>
@endsection

@section('content')


<main class="content">
    <div class="col-md-12">
        <h1 class="h3 mb-3"><strong>Category List</strong></h1>
            <div class="col-md-4">
                <form class="d-flex" method="GET">
                    <input class="form-control me-2" name="keyword" type="search" placeholder="Category Name" aria-label="Search" value="{{ old('keyword') }}">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    <div class="container-fluid p-0">
            @if(session('msg'))
                <div style="font-size:20px; font-weight:bolder; color: rgb(250, 3, 3); text-align:center">
                 {{ session('msg') }}
                </div>
            @endif

        <div class="row">
            <div class="col-md-12 ">
                <a href="{{ route('category.add') }}" class="btn btn-success float-end">Add</a>
            </div>
            <div class="col-md-12">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th class="d-none d-xl-table-cell">Numberical</th>
                            <th class="d-none d-xl-table-cell">Name</th>
                            <th class="d-none d-xl-table-cell">Parent Category</th>
                            <th class="d-none d-xl-table-cell">Create_at</th>
                            <th class="d-none d-md-table-cell">Update_at</th>
                            <th class="d-none d-xl-table-cell" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($category))
                        @foreach ($category as $key=>$item)
                           <tr>
                                <td class="d-none d-xl-table-cell">{{ $key+1 }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->name }}</td>
                                @if($item->parent_id==0)
                                <td ><span class="badge bg-warning">Largest Category</span></td>
                                @else
                                <td class="d-none d-xl-table-cell">{{ $item->parent_id }}</td>
                                @endif
                                <td class="d-none d-md-table-cell">{{ $item->create_at }}</td>
                                <td class="d-none d-md-table-cell">{{ $item->update_at }}</td>
                                <td><a href="{{ route('category.edit', $item->id) }}" class="badge bg-secondary">Edit</a></td>
                                <td><a onclick="return confirm('Are you sure delete?')" href="{{ route('category.delete', $item->id) }}" class="badge bg-danger">Delete</a></td>
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

