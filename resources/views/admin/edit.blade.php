@extends('layoutNV.admin')

@section('title')
    <title>Change Password Admin</title>
@endsection

@section('content')
<style>

</style>
<main class="content">
             @if(session('msg'))
                <div style="font-size:20px; font-weight:bolder; color: rgb(250, 8, 24); text-align:center">
                 {{ session('msg') }}
                </div>
            @endif
    <div class="col-md-12">
        <h1 class="h3 mb-3"><strong>Change Password Admin</strong></h1>
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-md-6">
                   <form method="POST" action="{{ route('admin.postedit', $admin[0]->id) }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">You are changing password account with Email:</label>
                        <input type="text" class="form-control" value="{{ $admin[0]->email }}" disabled>
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Old Password</label>
                      <input type="password" class="form-control" name="password_old">
                      @error('password_old')
                          <span style="color: red">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                          <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Password confirm</label>
                        <input type="password" class="form-control" name="password_confirm">
                        @error('password_confirm')
                        <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Change</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </form>
                </div>

            </div>
        </div>
    </div>
</main>

@endsection

