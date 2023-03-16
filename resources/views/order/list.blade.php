@extends('layoutNV.admin')

@section('title')
    <title>Orders list</title>
@endsection

@section('content')
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
<style>
   form{
        padding: 5px 0px;
   }

   .icon{
    font-size: 2rem;
   }
   select{
        min-width: 150px;
        border-radius: 5px;
        border-color:rgb(161, 158, 158);
   }
   .find{
        min-width: 70px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: 600;
   }

   #btn-complete, #btn-cancel{
        border: none;
        background: none;
   }
   #btn-complete{
        color: rgb(0, 47, 255);
   }
   #btn-cancel{
        color: rgb(248, 1, 104);
   }

</style>
<main class="content">
    <div class="col-md-12">
        <h1 class="h3 mb-3"><strong>Orders List</strong></h1>
        <div class="row">
            <div class="col-md-8">
                <form class="d-flex" method="GET">
                    <span class="find">Find by</span>
                    <select class="me-1" name="key_select">
                        <option value="1">Order ID</option>
                        <option value="2">Customer ID</option>
                        <option value="3">Order Status</option>
                    </select>
                    <input class="form-control me-2" type="search" aria-label="Search" name="key_word" placeholder="Enter your selection">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <div class="container-fluid p-0">
            {{-- @if(session('msg'))
            <div style="font-size:20px; font-weight:bolder; color: rgb(8, 250, 36); text-align:center">
             {{ session('msg') }}
            </div>
            @endif --}}
            <div style="font-size:20px; font-weight:bolder; color: rgb(8, 250, 36); text-align:center"></div>
            <div class="row">
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
                        @if(!empty($orders))
                        @foreach ($orders as $key=>$item)
                           <tr>
                                <td class="d-none d-xl-table-cell">{{ $key+1 }}</td>
                                <td class="d-none d-xl-table-cell">{{ $item->id}}</td>
                                <td class="d-none d-md-table-cell">{{ $item->cus_id}}</td>
                                <td class="d-none d-md-table-cell">{{ $item->ord_date }}</td>
                                @if($item->ord_status=='Pending')
                                <td ><span id="pending" class="btn btn-secondary">{{ $item->ord_status }}</span>
                                <span id="complete" style="display: none" class="btn btn-success">Complete</span>
                                <span id="cancel" style="display: none" class="btn btn-warning">Cancel</span>
                                <button type="button" value="{{ $item->id }}"  id="btn-complete"  class="icon fa-solid fa-circle-check">
                                <button type="button" value="{{ $item->id }}" id="btn-cancel" class="icon fa-solid fa-trash"></td>
                                {{-- <a href="{{route('order.complete', $item->id)}}" style="color: rgb(21, 180, 0)"><i class="icon fa-solid fa-circle-check"></i></a> --}}
                                {{-- <a href="{{route('order.cancel', $item->id)}}" style="color: rgb(255, 4, 0)"><i class="icon fa-solid fa-trash"></i></a></td> --}}
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
    <script src="{{ asset('adminkit/src/js/jquery.js') }}"></script>
<script>
    var ord_id = document.getElementById('btn-complete').value;
    var id = document.getElementById('btn-cancel').value;
    var pending = document.getElementById('pending');
    var btn_xoa = document.getElementById('btn-complete');
    var btn_tc = document.getElementById('btn-cancel');
    var complete = document.getElementById('complete');
    var cancel   = document.getElementById('cancel');
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    $(document).ready(function(){
        $('#btn-complete').click(function(){
        // Update thành complete
            $.ajax({
                url: "/admin/order/complete",
                method: "GET",
                data: {
                    'ord_id': ord_id,
                },
                success: function(data){
                    if(data==1){
                        pending.style.display = 'none';
                        btn_xoa.style.display = 'none';
                        btn_tc.style.display = 'none';
                        complete.style.display = 'block';
                        complete.style = 'weight:50px';
                    }
                    console.log(data);
                }
            });
        });
        // Update thành cancel
        $('#btn-cancel').click(function(){
            $.ajax({
                url: "/admin/order/cancel",
                method: "GET",
                data: {
                    'ord_id': id,
                },
                success: function(data){
                    if(data==1){
                        pending.style.display = 'none';
                        btn_xoa.style.display = 'none';
                        btn_tc.style.display = 'none';
                        cancel.style.display = 'block';
                        cancel.style = 'weight:50px';
                    }
                    console.log(data);
                }
            });
        });

    });

</script>
</main>

@endsection

