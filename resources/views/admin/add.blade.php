@extends('layoutNV.admin')

@section('title')
    <title>Create Admin</title>
@endsection

@section('content')
<style>

</style>
<main class="content">
    <div class="col-md-12">
        <h1 class="h3 mb-3"><strong>Create Admin</strong></h1>
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-6">
                   <form method="POST" action="{{ route('admin.postadd') }}">
                    @csrf
                    <div class="mb-3">
                        <label  class="form-label">Fullname</label>
                        <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}">
                        @error('fullname')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label  class="form-label">Email</label>
                      <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" class="form-control" name="password">
                        @error('password')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </form>
                </div>

            </div>
        </div>
    </div>
</main>

@endsection

