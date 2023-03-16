@extends('layoutNV.homeLayout')
@section('tittle','Home')
@section('content')
   <link rel="stylesheet" href="{{ asset('cssbyNamVu/home.css') }}">
   <script src="{{ asset('jsbyNamVu/home.js') }}"></script>

    <style>
        .ad-home{
            background: url('storage/imgNV/floppydisk/menu2copy.jpg');
            background-size: cover;
        }

    </style>
    <div class="container">
        <div class="ad-home">
            <div class="fontad">
                <h4>Shop limited edition </h4>
                <p>The old things but never passed away </p>
                <h1>Classic disc for Collections</h1>
                <a href="">Learn more ></a>
            </div>


            <div class="what-new" id="whatnew">
                <p class="menu-cat" id="menu-cat">New's product!!!</p>
                <div class="newcards">


                    <div class="insidenewcards">
                        {{-- img product --}}
                        <a href="">
                            <img src="{{ asset($products[0]->img_first) }}" alt="anh" height="200px">
                        </a>
                        {{-- name product --}}
                        <h4>{{ $products[0]->pro_name }}</h4>
                        {{-- description --}}
                        <div class="des-menu">
                            <div>
                                <p>Store:</p>
                                <p>Brand:</p>
                                <p>Dimensions:</p>
                                <p>Size:</p>
                            </div>
                            <div>
                                <p>{{ $products[0]->name }}</p>
                                <p>{{ $products[0]->brand }}</p>
                                <p>{{ $products[0]->diment }}</p>
                                <p>{{ $products[0]->size }}</p>
                            </div>
                        </div>
                        {{-- <button href="{{ route('shop.getpro', $products[0]->id) }}" class="button-50" role="button">Buy</button> --}}
                        <a class="button-50" href="{{ route('shop.getpro', $products[0]->id) }}" class="learn-more">Learn more></a>
                    </div>

                    <div class="insidenewcards">
                        {{-- img product --}}
                        <a href="">
                            <img src="{{ asset($products[1]->img_first) }}" alt="anh" height="200px">
                        </a>
                        {{-- name product --}}
                        <h4>{{ $products[1]->pro_name }}</h4>
                        {{-- description --}}
                        <div class="des-menu">
                            <div>
                                <p>Store:</p>
                                <p>Brand:</p>
                                <p>Dimensions:</p>
                                <p>Size:</p>
                            </div>
                            <div>
                                <p>{{ $products[1]->name }}</p>
                                <p>{{ $products[1]->brand }}</p>
                                <p>{{ $products[1]->diment }}</p>
                                <p>{{ $products[1]->size }}</p>
                            </div>
                        </div>
                        {{-- <button href="{{ route('shop.getpro', $products[1]->id) }}" class="button-50" role="button">Buy</button> --}}
                        <a class="button-50"  href="{{ route('shop.getpro', $products[1]->id) }}" class="learn-more">Learn more></a>
                    </div>

                    <div class="insidenewcards">
                        {{-- img product --}}
                        <a href="">
                            <img src="{{ asset($products[2]->img_first) }}" alt="anh" height="200px">
                        </a>
                        {{-- name product --}}
                        <h4>{{ $products[2]->pro_name }}</h4>
                        {{-- description --}}
                        <div class="des-menu">
                            <div>
                                <p>Store:</p>
                                <p>Brand:</p>
                                <p>Dimensions:</p>
                                <p>Size:</p>
                            </div>
                            <div>
                                <p>{{ $products[2]->name }}</p>
                                <p>{{ $products[2]->brand }}</p>
                                <p>{{ $products[2]->diment }}</p>
                                <p>{{ $products[2]->size }}</p>
                            </div>
                        </div>
                        {{-- <button href="{{ route('shop.getpro', $products[2]->id) }}" class="button-50" role="button">Buy</button> --}}
                        <a class="button-50" href="{{ route('shop.getpro', $products[2]->id) }}" class="learn-more">Learn more></a>
                    </div>

                    <div class="insidenewcards">
                        {{-- img product --}}
                        <a href="">
                            <img src="{{ asset($products[3]->img_first) }}" alt="anh" height="200px">
                        </a>
                        {{-- name product --}}
                        <h4>{{ $products[3]->pro_name }}</h4>
                        {{-- description --}}
                        <div class="des-menu">
                            <div>
                                <p>Store:</p>
                                <p>Brand:</p>
                                <p>Dimensions:</p>
                                <p>Size:</p>
                            </div>
                            <div>
                                <p>{{ $products[3]->name }}</p>
                                <p>{{ $products[3]->brand }}</p>
                                <p>{{ $products[3]->diment }}</p>
                                <p>{{ $products[3]->size }}</p>
                            </div>
                        </div>
                        {{-- <button href="{{ route('shop.getpro', $products[3]->id) }}" class="button-50" role="button">Buy</button> --}}
                        <a class="button-50" href="{{ route('shop.getpro', $products[3]->id) }}" class="learn-more">Learn more></a>
                    </div>


                </div>
            </div>
        </div>
        <div class="downcard">
            <div class="space"></div>
            <p class="menu-cat cat2" id="menu-cat">Categories</p>
            <div class="categories">
                <div class="ch1">
                    <div class="ch2 c1">
                        <a href="">
                            <img class="imgfeatured" src="{{ asset('storage/imgNV/hdd/menuhdd1.jpg') }}" height="650px" alt="anh">
                            <div>
                                <h3>Hard disk for 2023 </h3>
                                <p>Comming soon</p>
                            </div>

                        </a>
                    </div>
                    <div class="ch2 c2">
                        <div>
                            <a href="{{ route('shop.floppydisk') }}">
                                <img class="imgfeatured" src="{{ asset('storage/imgNV/menu1.jpg') }}" height="320px" alt="anh">
                                <div class="childc2">
                                    <h4>Floppy disk</h4>
                                    <p>All we have for your collections</p>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="">
                                <img class="imgfeatured" src="{{ asset('storage/imgNV/opticaldisk/od1.jpg') }}" height="320px" alt="anh">
                                <div class="childc2 whitecard">
                                    <h4>Optical disk</h4>
                                    <p>Learn more></p>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="">
                                <img class="imgfeatured" src="{{ asset('storage/imgNV/ssd/samsung2ssd1.jpg') }}" height="320px" alt="anh">
                                <div class="childc2 whitecard">
                                    <h4>SSD card</h4>
                                    <p>Leading technology</p>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="">
                                <img class="imgfeatured" src="{{ asset('storage/imgNV/hdd/hdd1.jpg') }}" height="320px" alt="anh">
                                <div class="childc2">
                                    <h4>HDD card</h4>
                                    <p>Learn more></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="featured">
            <div class="headf">
                <p class="menu-cat" id="menu-cat">Featured</p>
            </div>

                <div class="featured-swiper">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img src="{{ asset('storage/imgNV/swiperimg/swiper1.jpg') }}" alt="">
                          </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/imgNV/swiperimg/swiper2.jpg') }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/imgNV/swiperimg/swiper3.jpg') }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/imgNV/swiperimg/swiper4.jpg') }}" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/imgNV/swiperimg/swiper5.jpg') }}" alt="">
                        </div>

                        </div>
                        <button class="swiper-button-next"></button>
                        <button class="swiper-button-prev"></button>
                        <div class="swiper-pagination"></div>
                      </div>
                </div>


        </div>
        <div class="maps">
            <div class="upmap">
                <div>
                    <span>THIS STORE IS OFFERING REMOTE SELLING FACILITIES</span>
                    <br>
                    <p>Aptech Education Building, 285 Doi Can,Lieu Giai, Ba Dinh, Ha Noi city, Viet Nam<br>
                        aptechvietnam.com<br>
                        T:+84.39.362.482<br>
                        namvu042k11@gmail.com</p>
                    <a href="https://www.google.com/maps/dir//Aptech+Computer+Education,+T%C3%B2a+nh%C3%A0+APTECH,+%C4%90%E1%BB%99i+C%E1%BA%A5n,+Li%E1%BB%85u+Giai,+Ba+%C4%90%C3%ACnh,+Hanoi/@21.0303739,105.8073856,13.25z/data=!4m8!4m7!1m0!1m5!1m1!1s0x3135ab0d6e603741:0x208a848932ac2109!2m2!1d105.8189506!2d21.0356244" target="_blank">Get direction <strong>></strong></a>
                </div>
                <div>
                    <h4 style="line-height: 50px">OPENING HOURS</h4>
                    <p>All day: 8:30 am - 09:00pm</p>
                </div>
            </div>
            <div>
                <div class="headermap">
                    <p class="menu-cat" id="menu-cat">Map</p>

                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2214.257275885464!2d105.81888638778487!3d21.03580629529516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab0d6e603741%3A0x208a848932ac2109!2sAptech%20Computer%20Education!5e0!3m2!1sen!2s!4v1669967574316!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </div>

@endsection
