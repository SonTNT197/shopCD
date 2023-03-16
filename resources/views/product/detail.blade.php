@extends('layoutNV.admin')

@section('title')
    <title>Product Detail</title>
@endsection

@section('content')

<style>
    td{
        font-size: 20px;
        font-weight: 600;
    }

</style>
    <main class="content">
        <div class="container-fluid p-0">
            <div class="row">
                   <div class="col-md-4">
                    <div class="col-md-12">
                        <div class="card">
                            <img src="{{ asset($proimage[0]->img_first) }}" height="300px" alt="{{ $proimage[0]->img_first }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card ">
                            <img src="{{ asset($proimage[0]->img_second) }}" height="300px" alt="{{ asset($proimage[0]->img_second) }}">
                       </div>
                   </div>
                </div>

                <div class="col-md-8">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Product ID:</td>
                                    <td>{{  $product[0]->id }}</td>
                                </tr>
                                <tr>
                                    <td>Size:</td>
                                    <td>{{ $product[0]->size }}</td>
                                </tr>
                                <tr>
                                    <td>Dimention: </td>
                                    <td>{{ $product[0]->diment }}</td>
                                </tr>
                                <tr>
                                    <td>Type(Connection standard):</td>
                                    <td>{{  $product[0]->type}}</td>
                                </tr>
                                <tr>
                                    <td>Brand: </td>
                                    <td>{{  $product[0]->brand }}</td>
                                </tr>
                                <tr>
                                    <td>Origin: </td>
                                    <td>{{  $product[0]->origin }}</td>
                                </tr>
                                <tr>
                                    <td>Price: </td>
                                    <td>{{  $product[0]->pro_price }}$</td>
                                </tr>
                                <tr>
                                    <td>Product Status: </td>
                                    <td>{{  $product[0]->pro_status }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <h5>Description:</h5>
                            <p>{{  $product[0]->descrip }}</p>
                        </div>
                    </div>
                     <div class="row">
                            <a href="{{ route('product.edit', $product[0]->id) }}" class="btn btn-success m-2" style="width:60px">Edit</a>
                            <a href="{{ route('product.list') }}" class="btn btn-secondary m-2" style="width:60px">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

