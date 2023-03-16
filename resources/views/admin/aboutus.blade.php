@extends('layoutNV.homeLayout')
@section('tittle','About us')
@section('content')
    
    <script src="{{ asset('jsByNamVu/aboutus.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('cssbyNamVu/aboutus.css') }}">
    <div class="backgr">
        <div class="container">
            <div class="imghead">
                <img src="{{ asset('storage/imgNV/other/fixbuilding.png') }}" alt="" width="100%">
                <div class="texthead">
                    <p>Leadership & Mission</p>
                    <h1>Our mission & <br> values</h1>
                    <p style="font-size:12px;color:rgb(95, 95, 95)">Oceangate company</p>
                </div>
            </div>
            <div class="textcard">
                <div class="leftside">
                    <h3>Company credibility</h3>
                    <p>Oceangate is committed to complying with local laws and regulations as well as applying a strict global code of conduct to all employees. It believes that ethical management is not only a tool for responding to the rapid changes in the global business environment, but also a vehicle for building trust with its various stakeholders including customers, shareholders, employees, business partners and local communities. With an aim to become one of the most ethical companies in the world, Oceangate continues to train its employees and operate monitoring systems, while practicing fair and transparent corporate management.</p>
                </div>
                <div class="rightside">
                    <img src="{{ asset('storage/imgNV/other/abus1.png') }}" alt="" width="100%">
                </div>
            </div>
            <div class="card1">
                <img src="{{ asset('storage/imgNV/other/abus3.jpg') }}" alt="" width="130%">
                <div>
                    <h1>Our mission & approach</h1>
                    <p>
                        
                        Oceangate follows a simple business philosophy: to devote its talent and technology to creating superior products and services that contribute to a better global society. To achieve this, Oceangate sets a high value on its people and technologies.</p>
                </div>
            </div>

            <div class="card">
                <img src="{{ asset('storage/imgNV/other/abus2.png') }}" alt="" width="100%">
                <div class="leftcard">
                    <h1>The values that define <br>Oceangate's spirit</h1>
                    <p>
                        Oceangate believes that living by strong values is the key to good business. That’s why these core values, along with a rigorous code of conduct, are at the heart of every decision the company makes.</p>
                </div>
            </div>
            
            <div class="blackabus">
                <div>
                    <img src="{{ asset('storage/imgNV/swiperimg/swiper5.jpg') }}" alt="" width="100%" style="border-radius: 20px">
                </div>
                <div>
                    <h1 style="margin-bottom:20px;font-size:30px">Introduction</h1>
                
                    <p style="color: rgb(180, 180, 180);font-size:14px">OceanGate Limited is a company was established in 2019 which deals in various
                        data storage products right from floppy disk to optical storage devices. It has state
                        of the Art machinery for production of the storage devices/disks which are becoming
                        popular as days pass by due to the excellent quality, fast delivery on purchases and
                        efficient after sales Services.<br><br>
                        With the success of its business, Ocean has been recognized globally as an industry leader and now ranked as a top 10 global deal.
                    </p>
                </div>
            </div>
            <div class="footabus">
                <div style="text-align: center"><h1>Get to know our creator</h1></div>
                <div class="creator">
                    <div>
                        <div class="avt">
                            <img src="{{ asset('storage/imgNV/avt/myavt.jpg') }}" width="100%" alt="">
                        </div>
                        <div class="pro">
                            <h2>Vu Hai Nam</h2>
                            <p>President & CEO 2022 to Present</p>
                            <p>22 age and no girl friend</p>
                            <p>He still hasn't received his salary</p>
                            <p>He love world cup</p>
                            <p>And he think this year aghentina will be the champion</p>
                            <p>The about us view look so amazing made by me</p>
                        </div>
                    </div>
                    <div>
                        <div class="avt">
                            <img src="{{ asset('storage/imgNV/avt/user300x300.png') }}" width="100%" alt="">
                        </div>
                        <div class="pro">
                            <h2>Pham Ngoc Minh</h2>
                            <p>President & CEO 2022 to Present</p>
                            <p>27 age and no girl friend</p>
                            <p>He still hasn't received his salary</p>
                            <p>He love world cup</p>
                            <p>And he think this year France will be the champion</p>
                        </div>
                    </div>
                    <div>
                        <div class="avt">
                            <img src="{{ asset('storage/imgNV/avt/user300x300.png') }}" width="100%" alt="">
                        </div>
                        <div class="pro">
                            <h2>Lai Gia Khanh</h2>
                            <p>President & CEO 2022 to Present</p>
                            <p>19 age and no girl friend</p>
                            <p>He still hasn't received his salary</p>
                            <p>He love world cup</p>
                            <p>And he think this year England will be the champion</p>
                        </div>
                    </div>
                    <div>
                        <div class="avt">
                            <img src="{{ asset('storage/imgNV/avt/user300x300.png') }}" width="100%" alt="">
                        </div>
                        <div class="pro">
                            <h2>Eddy Nghiem</h2>
                            <p>President & CEO 2022 to Present</p>
                            <p>xx age and no girl friend</p>
                            <p>He still hasn't received his salary</p>
                            <p>He love world cup</p>
                            <p>And he think this year Brazil will be the champion</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection