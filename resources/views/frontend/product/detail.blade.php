@extends('frontend.master.master')
@section('title')
    {{ $product->name }} - TiMo Shoes
@endsection
@section('content')
<!--start-breadcrumbs-->
<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="/">Trang Chủ</a></li>
					<li class="active">Giày Nữ</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
    <!--start-single-->
    <div class="single contact">
            <div class="container">
                <div class="single-main">
                    <div class="col-md-9 single-main-left">
                    <div class="sngl-top">
                        <div class="col-md-5 single-top-left">
                            <div class="flexslider">
                                <ul class="slides">
                                    <li data-thumb="/backend/img/{{ $product->img }}">
                                        <img src="/backend/img/{{ $product->img }}" />
                                    </li>
                                    <li data-thumb="/backend/img/{{ $product->img }}">
                                        <img src="/backend/img/{{ $product->img }}" />
                                    </li>
                                    <li data-thumb="/backend/img/{{ $product->img }}">
                                        <img src="/backend/img/{{ $product->img }}" />
                                    </li>
                                    <li data-thumb="/backend/img/{{ $product->img }}">
                                        <img src="/backend/img/{{ $product->img }}" />
                                    </li>
                                </ul>
                            </div>
    <!-- FlexSlider -->
    <script defer src="js/jquery.flexslider.js"></script>
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

    <script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });
    });
    </script>
    </div>
        <div class="col-md-7 single-top-right">
            <div class="details-left-info simpleCart_shelfItem">
                <form action="/product/addcart" method="get">
                    <h3>{{ $product->name }}</h3>
                    <p class="availability">Còn hàng: <span class="color">Trong kho</span></p>
                    <div class="price_single">
                        <span class="reducedfrom">{{ number_format($product->price, 0, "",",") }} vnđ</span>
                        <span class="actual item_price">{{ number_format($product->price, 0, "",",") }} vnđ</span>
                    </div>
                    <h2 class="quick">MÔ TẢ:</h2>
                    <p class="quick_desc"> {{ $product->describe }}</p>

                    <div class="row">
                        @foreach (attr_values($product->values) as $key => $value)
                            <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{ $key }}:</label>
                                        <select class="form-control " name="attr[{{ $key }}]" id="">
                                            @foreach ($value as $item)
                                                <option value="{{ $item }}"> {{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        @endforeach
                    </div>

                    <div class="row row-pb-sm">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100" style="text-align:center">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                    </div>
                    <div class="clearfix"> </div>
                    <div class="single-but item_add">
                    <input type="hidden" name="id_product" value="{{ $product->id }}">
                    <input type="submit" value="Thêm Vào Giỏ"/>
                    </div>
                </form>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
					<div class="latest products">
						<div class="product-one">
                            @foreach ($product_new as $row)
                                <div class="col-md-4 product-left single-left">
                                    <div class="p-one simpleCart_shelfItem">

                                        <a href="/{{ $row->slug }}.html">
                                    <img src="/backend/img/{{ $row->img }}" alt="{{ $row->name }}" width="213px" height="221px"/>
                                    <div class="mask mask1">
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
				<div class="col-md-3 single-right">
					<h3>DANH MỤC</h3>
					<ul class="product-categories">
                        @foreach ($category as $cate)
                            @if ($cate->parent == 0)
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="/{{ $row->slug }}.html#menu{{ $cate->id }}" aria-expanded="true" aria-controls="collapseOne">
                                            {{ $cate->name }}
                                        </a>
                                    </h4>
                                </div>
                                <div id="menu{{ $cate->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        @foreach ($category as $cate2)
                                            @if ($cate2->parent == $cate->id)
                                                <li><a href="/product?category={{ $cate2->id }}">{{ $cate2->name }}</a></li>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
					</ul>
					<h3>KHOẢNG GIÁ</h3>
					<ul class="product-categories">
                        <form action="/product" method="get" class="colorlib-form-2">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">Từ:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="start" id="people" class="form-control">
                                                <option value="100000">100.000 VNĐ</option>
                                                <option value="200000">200.000 VNĐ</option>
                                                <option value="300000">300.000 VNĐ</option>
                                                <option value="500000">500.000 VNĐ</option>
                                                <option value="1000000">1.000.000 VNĐ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="guests">Đến:</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select name="end" id="people" class="form-control">
                                                <option value="2000000">2.000.000 VNĐ</option>
                                                <option value="4000000">4.000.000 VNĐ</option>
                                                <option value="6000000">6.000.000 VNĐ</option>
                                                <option value="8000000">8.000.000 VNĐ</option>
                                                <option value="10000000">10.000.000 VNĐ</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" style="width: 100%;border: none;height: 40px;">Tìm kiếm</button>
                        </form>
                    </ul>

                    @foreach (attr_values($product->values) as $key => $value)
                        <ul class="product-categories">
                            <h3>{{ $key }}</h3>
                            <ul class="product-categories">
                            @foreach ($value as $item)
                                <li><a href="/product?value={{ get_idvalue($product->values, $item) }}">{{ $item }}</a></li>
                            @endforeach
                        </ul>
                    @endforeach

				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<!--end-single-->
@endsection
    @section('script')
    @parent
    <script>
        $(document).ready(function () {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function (e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function (e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
@endsection
