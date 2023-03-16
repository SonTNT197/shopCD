@extends('layoutNV.homeLayout')
@section('tittle','Shop')
@section('content')
<script src="{{ asset('jsByNamVu/shop.js') }}"></script>
<link rel="stylesheet" href="{{ asset('cssbyNamVu/shop.css') }}">
<div class="backgrshop">
    <div class="container">
        <div class="headshop">
            <div>              
                <a href="{{ route('shop.floppydisk') }}">
                    <div class="bl">                       
                    </div>
                    <img class="imga1" src="{{ asset('storage/imgNV/floppydisk/floppydisk2.jpg') }}" alt="anh" height="410px">
                    <div class="titleimg">
                        <h3 >Floppy disk</h3>
                    </div>                    
                </a>
            </div>
            <div>             
                <a href="">
                    <div class="bl">                     
                    </div>
                    <img class="imga2" src="{{ asset('storage/imgNV/opticaldisk/od2.jpg') }}" alt="anh" width="110%">
                    <div class="titleimg">
                        <h3 >Optical disk</h3>
                    </div>                  
                </a>
            </div>
            <div>               
                <a href="">
                    <div class="bl">                     
                    </div>
                    <img class="imga3" src="{{ asset('storage/imgNV/ssd/3ssd1.jpg') }}" alt="anh" height="410px">
                    <div class="titleimg">
                        <h3 >SSD hard drive</h3>
                    </div>  
                </a>
            </div>
            <div> 
                <a href="">
                    <div class="bl"> 
                    </div>
                    <img class="imga4" src="{{ asset('storage/imgNV/hdd/hdd2.jpg') }}" alt="anh" height="410px">
                    <div class="titleimg">
                        <h3 >HDD hard drive</h3>
                    </div>                  
                </a>
            </div>
            <span class="titlehead"><h2>All products</h2></span>
            
        </div>
        <div class="bodyshop">
            <div class="filter">
                <p><i class="fa-solid fa-filter"></i> Filter</p>
                
                <select name="branch" id="">
                        <option value="" class="">Branch--</option>
                        <option value="">Kingston</option>
                        <option value="">Samsung</option>
                        <option value="">Samsung</option>
                </select>
                <select name="price" id="">
                    <option value="">Price--</option>
                    <option value="">Kingston</option>
                    <option value="">Samsung</option>
                    <option value="">Samsung</option>
                </select>
                <select name="price" id="">
                    <option value="">Categories--</option>
                    <option value="">SSD hard drive</option>
                    <option value="">HDD hard drive</option>
                    <option value="">Samsung</option>
                </select>
                <div>
                    <a href="" class="btn" style="text-decoration: none">Confirm</a>
                </div>
                
            </div>
            {{-- list here --}}
            <div class="list">
                @foreach ($data as $item)
                    <div class="card"> 
                        {{-- img product --}}
                        <a href="{{ route('shop.getpro',['id'=>$item->pro_id]) }}">
                            <img src="{{ asset($item->img_first) }}" alt="anh" height="200px">
                        </a>
                        
                        {{-- name product --}}
                        <h4>{{ $item->pro_name }}</h4>
                        
                        {{-- description --}}
                        <div class="des-menu">
                            <div>
                                <p>Brand:</p>
                                <p>Dimensions:</p>
                                <p>Size:</p>
                            </div>
                            <div>
                                <p>{{ $item->brand }}</p>
                                <p>{{ $item->diment }}</p>
                                <p>{{ $item->size }}</p>
                            </div>
                        </div>
                        <span style="color: rgb(88, 88, 88)" id="countstar" class="review">{{ $item->sum }}</span>
                        <span id="starspan"></span>
                        <p>Price: {{ $item->pro_price }}$</p>
                        <br>
                        <a class="btn" href="{{ route('shop.getpro',['id'=>$item->pro_id]) }}" class="learn-more">Learn more</a>
                        <a class="compare" href=""><i class="fa-solid fa-circle-plus"></i> Compare</a>
                    </div>
                @endforeach
                
                {{-- <div class="card"></div>
                <div class="card"></div>
                <div class="card"></div> --}}
                

                
            </div>
            
        </div>
    </div>
</div>
@endsection