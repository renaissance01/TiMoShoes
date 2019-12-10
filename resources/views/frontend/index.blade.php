@extends('frontend.master.master')
@section('title', 'TiMo Shoes - Hệ Thống Bán Giày Online Uy Tín Số 1 Việt Nam')
@section('content')
<!--banner-starts-->
<div class="bnr" id="home">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <div class="banner-1"></div>
            </li>
            <li>
                <div class="banner-2"></div>
            </li>
            <li>
                <div class="banner-3"></div>
            </li>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<!--banner-ends-->
<!--Slider-Starts-Here-->
<script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
        auto: true,
        pager: true,
        nav: false,
        speed: 500,
        namespace: "callbacks",
        before: function () {
            $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
            $('.events').append("<li>after event fired.</li>");
        }
        });

    });
    </script>
<!--End-slider-script-->
<!--start-banner-bottom-->
<div class="banner-bottom">
    <div class="container">
        <div class="banner-bottom-top">

            @foreach ($product_fe as $row)
                <div class="col-md-6 col-sm-6 col-xs-12 banner-bottom-left">
                    <div class="bnr-one">
                        <div class="bnr-left">
                            <h1 style="white-space: nowrap; overflow: hidden;"><a href="/{{ $row->slug }}.html">{{ $row->name }}</a></h1>
                            <p>{{ $row->info }}</p>
                            <div class="b-btn">
                                <a href="/{{ $row->slug }}.html">XEM NGAY</a>
                            </div>
                        </div>
                        <div class="bnr-right">
                            <a href="/{{ $row->slug }}.html"><img src="/backend/img/{{ $row->img }}" alt="{{ $row->name }}" width="200px" height="150px"/></a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            @endforeach

            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--end-banner-bottom-->
<!--start-shoes-->
<div class="shoes">
    <div class="container">
        <div class="product-one">
            @foreach ($product_new as $row)
                <div class="col-md-3 product-left">
                    <div class="p-one simpleCart_shelfItem">
                            <a href="/{{ $row->slug }}.html">
                                <img src="/backend/img/{{ $row->img }}" alt="{{ $row->name }}" width="238px" height="248px"/>
                                <div class="mask">
                                    <span>XEM NGAY</span>
                                </div>
                            </a>
                        <h4 style="white-space: nowrap; overflow: hidden;">{{ $row->name }}</h4>
                        <p><a class="item_add" href="/{{ $row->slug }}.html"><i></i> <span class=" item_price">{{ number_format($row->price,0,"",".") }} vnđ</span></a></p>

                    </div>
                </div>
            @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--end-shoes-->
<!--start-abt-shoe-->
<!--<div class="abt-shoe">
    <div class="container">
        <div class="abt-shoe-main">
            <div class="col-md-4 abt-shoe-left">
                <div class="abt-one">
                    <a href="single.html"><img src="images/abt-1.jpg" alt="" /></a>
                    <h4><a href="single.html">Cras dolor ligula</a></h4>
                    <p>Phasellus auctor vulputate egestas. Nulla facilisi. Cras dolor ligula, pharetra vitae efficitur ac, tempus vitae nisl. Aliquam erat volutpat. </p>
                </div>
            </div>
            <div class="col-md-4 abt-shoe-left">
                <div class="abt-one">
                    <a href="single.html"><img src="images/abt-2.jpg" alt="" /></a>
                    <h4><a href="single.html">Cras dolor ligula</a></h4>
                    <p>Phasellus auctor vulputate egestas. Nulla facilisi. Cras dolor ligula, pharetra vitae efficitur ac, tempus vitae nisl. Aliquam erat volutpat. </p>
                </div>
            </div>
            <div class="col-md-4 abt-shoe-left">
                <div class="abt-one">
                    <a href="single.html"><img src="images/abt-3.jpg" alt="" /></a>
                    <h4><a href="single.html">Cras dolor ligula</a></h4>
                    <p>Phasellus auctor vulputate egestas. Nulla facilisi. Cras dolor ligula, pharetra vitae efficitur ac, tempus vitae nisl. Aliquam erat volutpat. </p>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>-->
<!--end-abt-shoe-->
@endsection
