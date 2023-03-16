@extends('layoutNV.homeLayout')
@section('tittle','Shop')
@section('content')
<script src="{{ asset('jsByNamVu/shop.js') }}"></script>
<link rel="stylesheet" href="{{ asset('cssbyNamVu/floppydisk.css') }}">
    <div class="container">
        <div class="headshop">
            <div>              
                <a href="{{ route('shop.cat') }}">
                    <div class="bl"></div> 
                    <div class="backall"><h2 style="color: white;font-size:60px">All</h2></div>
                    <div class="titleimg">
                        <h3 >< Back to all</h3>
                    </div>                    
                </a>
            </div>
            <div>             
                <a href="">
                    <div class="bl"></div>
                    <img class="imga2" src="{{ asset('storage/imgNV/opticaldisk/od2.jpg') }}" alt="anh" width="110%">
                    <div class="titleimg">
                        <h3 >Optical disk</h3>
                    </div>                  
                </a>
            </div>
            <div>               
                <a href="">
                    <div class="bl"></div>
                    <img class="imga3" src="{{ asset('storage/imgNV/ssd/3ssd1.jpg') }}" alt="anh" height="410px">
                    <div class="titleimg">
                        <h3 >SSD hard drive</h3>
                    </div>  
                </a>
            </div>
            <div> 
                <a href="">
                    <div class="bl"></div>
                    <img class="imga4" src="{{ asset('storage/imgNV/hdd/hdd2.jpg') }}" alt="anh" height="410px">
                    <div class="titleimg">
                        <h3 >HDD hard drive</h3>
                    </div>                  
                </a>
            </div>
            <span class="titlehead"><h2>Floppy disk</h2></span>
            
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
                
                <div class="card"> 
                    
                    {{-- img product --}}
                    <a href="">
                        <img src="{{ asset('storage/imgNV/product/samsung1ssd1.jpg') }}" alt="anh" height="200px">
                    </a>
                    
                    {{-- name product --}}
                    <h4>SSD Samsung 870 EVO</h4>
                    
                    {{-- description --}}
                    <div class="des-menu">
                        <div>
                            <p>Brand:</p>
                            <p>Dimensions:</p>
                            <p>Size:</p>
                        </div>
                        <div>
                            <p>Samsung</p>
                            <p>2.5 Inch</p>
                            <p>500gb</p>
                        </div>
                    </div>
                    <span class="review">***** 5</span>
                    <p>Price: 199$</p>
                    <a class="compare" href=""><i class="fa-solid fa-circle-plus"></i> Compare</a>
                    <br>
                    <button class="btn" role="button">Add to cart</button>
                    <a href="" class="learn-more">Learn more></a>
                </div>
                <div class="card"></div>
                <div class="card"></div>
                <div class="card"></div>
                
            </div>
        </div>
    </div>
@endsection