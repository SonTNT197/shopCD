<?php
    if(Auth::guard('admins')->check()){
        $id   = Auth::guard('admins')->id();
        $user = DB::select("SELECT * FROM admins WHERE id = ?", [$id]);
        $name = $user[0]->fullname;

    }
?>
<nav class="navbar navbar-expand navbar-light navbar-bg">

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">

            </li>

            <li class="nav-item dropdown">

            </li>

            <li class="nav-item dropdown">
                <i class="fa fa-id-badge" aria-hidden="true" style="font-size: 20px; color:rgb(226, 147, 43)"></i>
                 @if(!empty($name))
                 <span style="font-size: 20px; font-weight:600">{{ $name }}</span>
                 @endif
                <a href="{{ route('user.logoutadmin') }}" class="btn btn-secondary">Logout</a>
            </li>
        </ul>
    </div>
</nav>
