@extends('layoutNV.homeLayout')
@section('tittle','Shop')
@section('content')
    <link rel="stylesheet" href="{{ asset('cssbyNamVu/product.css') }}">
    <script src="{{ asset('jsbyNamVu/product.js') }}"></script>
    <?php
            $sum=0;
            $five=0;$four=0;$three=0;$two=0;$one=0;
            if (count($reviewdata)>0) {
                foreach ($reviewdata as $value) {
                $sum+=$value->star;
                switch ($value->star) {
                    case 1:
                        $one++;
                        break;
                    case 2:
                        $two++;
                        break;
                    case 3:
                        $three++;
                        break;
                    case 4:
                        $four++;
                        break;
                    case 5:
                        $five++;
                        break;
                }                
                }
                $sum=$sum/count($reviewdata);
                $sum=round($sum,2);
            }
            
        ?>
<div class="backgrpro">
    <div class="container">
        <div class="headpr">
            <a href="{{ route('shop.cat') }}">Shop</a> > <a href="">{{ $data->name }}</a> > <p>{{ $data->pro_name }}</p>
        </div>
        <div class="bodypr">
                <div class="imgpr">
                    <div class="mainimg" id="mainimg">
                        <img src="{{ asset( $data->img_first) }}" height="100%" alt="">
                    </div>
                    <div class="childimg">
                        <div id="childimg" class="actimg">
                            <img src="{{ asset( $data->img_first) }}" height="100%" alt="">
                        </div>
                        <div id="childimg">
                            <img src="{{ asset( $data->img_second) }}" height="100%" alt="">
                        </div>
                        <div id="childimg">
                            <img src="{{ asset( $data->img_third) }}" height="100%" alt="">
                        </div>
                    </div>
                </div>
                <div class="propertise">
                    <div>
                        <span id='status' class="status"></span>
                        <h2 style="display:inline-block">{{ $data->pro_name }}</h2>
                    </div>
                    <div>
                        <p><span id="sumre" class="rev">{{ $sum }}</span> <i class="fa-solid fa-star"></i> | <span id="counttot" class="rev">{{ count($reviewdata) }}</span> Review | <span class="rev">2k</span> Sold</p>
                        <h1 class="price">Price: {{ $data->pro_price }}$</h1>
                        <p style="font-weight: bold">Detail</p>
                        <div class="detail">
                            <div>
                                <p>Size:</p>
                                <p>{{ $data->size }}</p>
                            </div>
                            <div>
                                <p>Dimention:</p>
                                <p>{{ $data->diment }}</p>
                            </div>
                            <div>
                                <p>Type:</p>
                                <p>{{ $data->name }}</p>
                            </div>
                            <div>
                                <p>Brand:</p>
                                <p>{{ $data->brand }}</p>
                            </div>
                            <div>
                                <p>Origin:</p>
                                <p>{{ $data->origin }}</p>
                            </div>
                            <div>
                                <p>Product ID:</p>
                                <p>{{ $data->pro_id }}</p>
                            </div>
                            
                        </div>
                        <div class="rightside">
                            <h3>More offer</h3>
                            <ul>
                                <li>Extra 5% off for members</li>
                                <li>New Offers for new members</li>
                                <li>10% off for Christmas</li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="addtocart">
                        @if (Auth::guard('customers')->check()==true)
                            <input type="hidden" id="checklogin" value="0">
                        @else
                            <input type="hidden" id="checklogin" value="1">
                        @endif 
                        
                            <input type="hidden" id="prod" name="prod" value="{{ $data->pro_id }}">
                            <button id="btn" class="btn">Add to card</button>         
                    </div>
                    
                </div>
                <div id="cover"></div>
                <div id="display" class="display">
                    <h1>Successfully added to cart</h1>
                    <span class="checkicon">
                        <i class="fa-sharp fa-solid fa-check"></i>
                    </span>
                </div>
                
        </div>
        <div class="despr">
            <h2>Description:</h2>
            <p>{{ $data->descrip }}</p>
        </div>

        {{-- review area --}}
        
        <div class="comment-box">
            <div class="leftcmt">
                <div>
                    <div class="reviewdetail">
                        <div>
                            <h2 style="display:inline-block">Review detail</h2>
                            <span id="status" class="status"></span>
                            <br>
                            <p style="display:inline-block;margin-right:10px;"><span style="color: red">{{ $sum}}</span> <i class="fa-solid fa-star"></i>Star</p>
                            <p style="display:inline-block;margin-right:20px;"><span id="bartot" style="color: red">{{ count($reviewdata) }}</span> <i class="fa-solid fa-user"></i> Review</p>
                        </div>
                        {{-- 5 star --}}
                        <div class="detailstar">
                            <div>
                                <h4>5 <i class="fa-solid fa-star"></i></h4>
                            </div>
                            <div class="blackbar">
                                <div id="barfill" class="blackpoint"></div>
                            </div>
                            <div>
                                <h4> <span id="barvalue">{{ $five }}</span> review</h4>
                            </div>
                        </div>
                        {{-- 4 star --}}
                        <div class="detailstar">
                            <div>
                                <h4>4 <i class="fa-solid fa-star"></i></h4>
                            </div>
                            <div class="blackbar">
                                <div id="barfill" class="blackpoint"></div>
                            </div>
                            <div>
                                <h4> <span id="barvalue">{{ $four }}</span> review</h4>
                            </div>
                        </div>
                        {{-- 3 star --}}
                        <div class="detailstar">
                            <div>
                                <h4>3 <i class="fa-solid fa-star"></i></h4>
                            </div>
                            <div class="blackbar">
                                <div id="barfill" class="blackpoint"></div>
                            </div>
                            <div>
                                <h4> <span id="barvalue">{{ $three }}</span> review</h4>
                            </div>
                        </div>
                        {{-- 2 star --}}
                        <div class="detailstar">
                            <div>
                                <h4>2 <i class="fa-solid fa-star"></i></h4>
                            </div>
                            <div class="blackbar">
                                <div id="barfill" class="blackpoint"></div>
                            </div>
                            <div>
                                <h4> <span id="barvalue">{{ $two }}</span> review</h4>
                            </div>
                        </div>
                        {{-- 1 star --}}
                        <div class="detailstar">
                            <div>
                                <h4>1 <i class="fa-solid fa-star"></i></h4>
                            </div>
                            <div class="blackbar">
                                <div id="barfill" class="blackpoint"></div>
                            </div>
                            <div>
                                <h4> <span id="barvalue">{{ $one }}</span> review</h4>
                            </div>
                        </div>  
                        
                    </div>
                </div>
                <div>
                    <div class="upcmtdetail">
                        <h2>Customers review</h2>
                        <p><span style="color: red">{{ count($reviewdata) }}</span> review</p>
                    </div>
                    @foreach ($reviewdata as $item)
                        <div class="cus_comment">
                            <div class="avtcmt">
                                <img src="/storage/imgNV/avt/user300x300.png" alt="anh" height="50px">
                            </div>
                            <div class="namecmt">
                                <h4>{{ $item->fullname }}</h4>
                                <input type="hidden" id="starinp" value="{{ $item->star }}">
                                <span id="starcmt">
                                    
                                </span>
                            </div>
                            <div class="textcmt">
                                <p>{{ $item->cmt_text }}</p>
                                <p style="font-size: 12px;color:gray">Post on <span>{{ $item->post_at }}</span></p>
                                
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
            <div class="rightcmt">
                <?php
                    if (Auth::guard('customers')->check()==true) {
                        $cus_id=Auth::guard('customers')->id();   
                    }
                    else {
                        $cus_id=false;
                    }
                ?>
                @if ($cus_id!=false)
                    <form action="{{ route('user.review',['pro_id'=>$data->pro_id,'cus_id'=>$cus_id]) }}" method="post">

                        @csrf
                        <div class="yourcmt">
                            
                                <h3>What do you think?</h3>
                                <div>
                                    <i id="starvote" class="fa-regular fa-star"></i>
                                    <i id="starvote" class="fa-regular fa-star"></i>
                                    <i id="starvote" class="fa-regular fa-star"></i>
                                    <i id="starvote" class="fa-regular fa-star"></i>
                                    <i id="starvote" class="fa-regular fa-star"></i>
                                    <h4><span style="font-size: 18px" id="textvote">Vote this product &#128513</span></h4>
                                    <input id="votevalue" type="hidden" name="vote">
                                </div>
                                <textarea name="cusinp" id="cusinp" class="cusinp" cols="30" rows="10" placeholder="Describe your experience"></textarea>
                                <br>
                                <button id="postbtn"></button>
                    
                        
                        </div>
                    </form>
                @else
                    <div class="yourcmt">
                        <h3>What do you think?</h3>
                            
                                <div>
                                    <i id="starvote" class="fa-regular fa-star"></i>
                                    <i id="starvote" class="fa-regular fa-star"></i>
                                    <i id="starvote" class="fa-regular fa-star"></i>
                                    <i id="starvote" class="fa-regular fa-star"></i>
                                    <i id="starvote" class="fa-regular fa-star"></i>
                                    <h4><span style="font-size: 18px" id="textvote">Vote this product &#128513</span></h4>
                                    <input id="votevalue" type="hidden" name="vote">
                                </div>
                                <textarea name="cusinp" id="cusinp" class="cusinp" cols="30" rows="10" placeholder="Describe your experience"></textarea>
                                <br>
                                <button class="btn2-post">POST</button>
                                <div class="disablecmt">
                                    <h2>You must logged in to post your review</h2>
                                    <a href="{{ route('user.login') }}">Login</a>
                                </div>
                    </div>
                @endif
                
            </div>
        </div>

        
    </div>
</div>





<a id="carta" style="display:none" class="carta" href="{{ route('user.cart') }}">
    <div class="cartarea">
        <div  class="nbrcart"><h3 id="nbrcart2">{{ session('cart') }}</h3></div>
        <i class="fa-solid fa-cart-shopping"></i>
        
    </div>
</a>
    {{-- jquery library --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
@endsection