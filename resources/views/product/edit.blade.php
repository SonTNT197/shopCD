@extends('layoutNV.admin')

@section('title')
    <title>Edit Product</title>
@endsection

@section('content')
<style>
    .form-label{
        color: rgb(5, 17, 241);
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        font-weight: 600;
    }
</style>
<main class="content">
    <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>Edit Product</strong></h1>
            <div class="row">
                <form class="row" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">ID(This field cannot edit!)</label>
                      <input type="text" class="form-control" name="pro_id" value="{{ $pro[0]->id }}" disabled>
                      @error('pro_id')
                          <small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" name="pro_name" value="{{ $pro[0]->pro_name }}">
                      @error('pro_name')
                          <small style="color: red">{{ $message }}</small>
                      @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-control" name="cat_id">
                            <option value="">Please select category</option>
                            {!! $htmlOption !!}
                        </select>
                        @error('cat_id')
                          <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" class="form-control" name="pro_price" value="{{ $pro[0]->pro_price }}">
                        @error('pro_price')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="text" class="form-control" name="pro_quantity" value="{{ $pro[0]->pro_quantity }}">
                        @error('pro_quantity')
                        <small style="color: red">{{ $message }}</small>
                         @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Image fist</label>
                        <input type="file" class="form-control" name="img_1">
                        @error('img_1')
                        <small style="color: red">{{ $message }}</small>
                         @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Image second</label>
                        <input type="file" class="form-control" name="img_2">
                        @error('img_2')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Image third</label>
                        <input type="file" class="form-control" name="img_3">
                        @error('img_3')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Size</label>
                        <input type="text" class="form-control" name="size" value="{{ $pro[0]->size }}">
                        @error('size')
                          <small>{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Brand</label>
                        <input type="text" class="form-control" name="brand" value="{{ $pro[0]->brand }}">
                        @error('brand')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Made in</label>
                        <input type="text" class="form-control" name="origin" value="{{ $pro[0]->origin }}">
                        @error('origin')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Type</label>
                        <input type="text" class="form-control" name="type" value="{{ $pro[0]->type }}">
                        @error('type')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Dimention</label>
                        <input type="text" class="form-control" name="dimention" value="{{ $pro[0]->diment }}">
                        @error('dimention')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" id="editor1" name="description" cols="30" rows="9">{{ $pro[0]->descrip}}</textarea>
                        @error('description')
                        <small style="color: red">{{ $message }}</small>
                        @enderror
                      </div>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('product.list') }}" class="btn btn-secondary float-end m-2">Back</a>
                    <button type="submit" class="btn btn-primary float-end m-2">Update</button>
                </div>
            </form>
            </div>
    </div>
</main>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
     CKEDITOR.replace('editor1');
</script>
@endsection
