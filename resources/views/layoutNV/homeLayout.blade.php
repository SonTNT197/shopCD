{{-- ours layout home --}}
<?php
    if (Auth::guard('customers')->check()==true) {
        $id=Auth::guard('customers')->id();
        $name=DB::select('SELECT fullname from customers where id=?',[$id]);
        $name=$name[0]->fullname;

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tittle')</title>
    <link rel="stylesheet" href="{{ asset('cssbyNamVu/homelayout.css') }}">
    <script src="{{ asset('jsbyNamVu/homelayout.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('adminkit/src/img/icons/icon-48x48.png') }}" />
    {{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .search::-webkit-search-cancel-button{
            background:url({{ asset('storage/imgNV/cancelx.PNG') }});
        }
        .search::-webkit-search-cancel-button{
            background-repeat: no-repeat;
            background-size: cover;
            background-position: 10%;
        }
    </style>

   {{-- swiper library --}}
   <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>
<body>
    <section>
        <div class="header">
            <div class="up-header">
                <h1>OCEANGATE</h1>
                <p>The way to get started</p>
                <div class="rightsidemenu">

                    <div class="sign-in">


                        @if (Auth::guard('customers')->check()==true)

                        <a href="{{ route('user.orderinfo') }}">{{ $name }}</a>
                        <a href="{{ route('user.logout') }}" style="font-size: 20px"><i class="fa-solid fa-right-from-bracket"></i></a>
                        {{-- @elseif (Auth::guard('admins')->check()==true)
                            <a href="{{ route('admin.home') }}">ADMIN HOME</a>
                            <a href="{{ route('user.logout') }}" style="font-size: 20px"><i class="fa-solid fa-right-from-bracket"></i></a> --}}
                        @else
                        <a href="{{ route('user.login') }}">Sign in</a>
                        @endif

                        <i class="fa-sharp fa-solid fa-circle-user"></i>

                    </div>

                    <div onclick="searchclick()" id="search" class="search-icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>

                </div>
            </div>
            <div class="down-header">

                <a id="select" href="" class="menu-link">Collections</a>

                <a id="select" href="{{ route('shop.cat') }}" class="menu-link">Shop</a>
                <a id="select" href="{{ route('user.home') }}" class="menu-link">Home</a>
                <a id="select" href="{{ route('user.aboutus') }}" class="menu-link">About us</a>
                <a id="select" href="" class="menu-link">Contact</a>
            </div>
        </div>
        <div class="content">@yield('content')</div>
        <div class="footer">
            <p>adsaskdha@gmaksdjalksjd.com</p>
        </div>
        @if (session('cart'))
        <a class="carta" href="{{ route('user.cart') }}">
            <div class="cartarea">
                <div  class="nbrcart"><h3 id="nbrcart">{{ session('cart') }}</h3></div>
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
        </a>
        @endif
        <div id="layoutdisable" class="layoutdisable">
        </div>
        <div id="searchdisplay" class="searchdisplay">
            <div class="upsearch">
                <input id="searchin" name="search" class="search" type="search" placeholder="Looking for something?">
                <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            <div class="datasearch">
            </div>

        </div>
    </section>

</body>
</html>

