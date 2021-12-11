@extends('frontend.layouts.layout')
@section('content')

    <div id="slides" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
            <li data-target="#slides" data-slide-to="3"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="Trangchu1.html">
                    <img src="./images/carousel0.jpg"/>
                    <div class="carousel-caption">
                        <h3>WELCOME TO ONLINE EXAMINATION SYSTEM</h3>
                        <p>BÃI BIỂN</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="Tramgchu1.html">
                    <img src="./images/carousel1.jpg"/>
                    <div class="carousel-caption">
                        <h3>WELCOME TO ONLINE EXAMINATION SYSTEM</h3>
                        <p>BÃI BIỂN</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="Trangchu1.html">
                    <img src="./images/carousel2.jpg"/>
                    <div class="carousel-caption">
                        <h3>WELCOME TO ONLINE EXAMINATION SYSTEM</h3>
                        <p>BÃI BIỂN</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="Trangchu1.html">
                    <img src="./images/carousel3.jpg"/>
                    <div class="carousel-caption">
                        <h3>WELCOME TO ONLINE EXAMINATION SYSTEM</h3>
                        <p>NÚI CAO</p>
                    </div>
                </a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#slides" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#slides" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

@endsection





