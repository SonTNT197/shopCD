@extends('layoutNV.homeLayout')
@section('tittle','Cart')
@section('content')
    <link rel="stylesheet" href="{{ asset('cssbyNamVu/cart.css') }}">
    <script src="{{ asset('jsbyNamVu/cart.js') }}"></script>
   
    <div class="back">
        
        <div class="container">
            <div class="cartitem hd">
                <div class="row1">
                    <div class="maincart">
                        <img src="storage/imgNV/logo2.png" alt="" height="70px" >
                        <div></div>
                        <h3>Cart</h3>
                    </div>
                </div>
                <div class="cartrow">
                    <p>Price</p>
                </div>
                <div class="cartrow">
                    <p>Quantity</p>
                </div>
                <div class="cartrow">
                    <p>Total</p>
                </div>
                <div class="cartrow ac">
                    <p>Action</p>
                </div>
                {{-- <div class="cartrow tick">
                    <input type="checkbox" name="" id="">
                </div> --}}

            </div>
            <form id="formcart" action="{{ route('user.createorder') }}" method="post">
                @csrf
                @if (!empty($data))
                <input type="hidden" name="user_id" value="{{ $data[0]->cus_id }}">
                @endif
                @if (Auth::guard('customers')->check()==false)
                    <div class="cartitem2">
                        <h3 style="font-weight: 100">You need to be logged in to view your shopping cart</h3>
                        <h2 style="font-size: 40px"><i class="fa-solid fa-circle-exclamation"></i></h2>
                    </div>
                @elseif (Auth::guard('customers')->check()==true && session()->has('cart')==false)
                    <div class="cartitem2">
                        <h3 style="font-weight: 100">Nothing here let's go buy some discs</h3>
                        <a href="{{ route('shop.cat') }}">Here</a>
                    </div>
                @endif
                @foreach ($data as $i=>$item)
                <input type="hidden" name="p{{ $i }}" value="{{ $item->pro_id }}">
                <div class="cartitem bd">
                    <div class="row1 it1">
                        <div>
                            <h4>{{ $i+1 }}</h4>
                        </div>
                        {{-- img product --}}
                        <a href="">
                            <img src="{{ asset($item->img_first) }}" alt="" height="130px">
                        </a>

                        <div>
                            {{-- product name --}}
                            <a href="">
                                <h3>{{ $item->pro_name }}</h3>
                            </a>

                            {{-- product detail : cat and product ID --}}
                            <p>Category: {{ $item->name }}</p>
                            <p>Product ID: {{ $item->pro_id }}</p>
                        </div>
                    </div>
                    <div class="cartrow it2">
                        <p ><span id="price">{{ $item->pro_price }}</span>$</p>
                    </div>
                    <div class="cartrow it2 quan">
                        <div>
                            <a id="btn1" class="btn btn-primary">-</a>
                            <input type="hidden" id="inp" name="{{ $i }}" value="{{ $item->quantity }}">
                            <p id="quan">{{ $item->quantity }}</p>
                            <a id="btn2" class="btn btn-primary">+</a>
                        </div>

                    </div>
                    <div class="cartrow it2">
                        <p><span id="total"></span>$</p>
                    </div>
                    <div class="cartrow it2 ac2">
                        <a href="{{ route('user.delcart',['pro_id'=>$item->pro_id,'cus_id'=>$item->cus_id]) }}">Delete <i class="fa-solid fa-trash"></i></a>
                    </div>

                </div>
                @endforeach
                
                <div id="step2cart" class="step2cart">
                    <div>
                        <h2>Last step</h2>
                    </div>
                    
                    <p>Your address</p>
                    <span style="color: red;font-size:12px;" id="notify"></span>
                    <input type="text" name="address" class="address" id="valaddress" placeholder="Type your address">
                    
                    <br>
                    <p>Payment method</p>
                    <select name="methodpay" class="payment" id="">
                        <option value="2">Payment on delivery</option>
                        <option value="1">Transfer payments</option>
                    </select>
                    <br>
                    <div id="confirmbtn" class="confirm">CONFIRM</div>
                    
                </div>
                <div id="bgstep2" class="bgstep2"></div>

                {{-- foot add to cart --}}
                <div class="footcart">
                    <div>
                        <h3>Total cost:</h3>
                        <h2> <span id="cost">0</span>$</h2>
                        <span class="checkout" id="btn-checkout">CHECKOUT></span>
                    </div>
                </div>
            </form>
            {{-- // items --}}

        </div>
        @if (session('msg'))
            <span class="notifymsg">{{ session('msg') }}</span>
        @endif
    </div>

@endsection
