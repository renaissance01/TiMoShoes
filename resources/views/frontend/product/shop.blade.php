@extends('frontend.master.master')
@section('title', 'Sản Phẩm')
@section('content')
<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="/">Trang Chủ</a></li>
                <li class="active">Sản Phẩm</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--start-product-->
<div class="product">
    <div class="container">
        <div class="product-main">
            <div class="col-md-9 p-left">
            <div class="product-one">
            @foreach ($products as $row)
                <div class="col-md-4 product-left single-left">
                    <div class="p-one simpleCart_shelfItem">
                        <a href="/{{ $row->slug }}.html">
                                <img src="/backend/img/{{ $row->img }}" alt="{{ $row->name }}" width="213px" height="221px"/>
                                <div class="mask mask1">
                                    <span>XEM NGAY</span>
                                </div>
                            </a>
                        <h4 style="white-space: nowrap; overflow: hidden;">{{ $row->name }}</h4>
                        <p><a class="item_add" href="/{{ $row->slug }}.html"><i></i> <span class=" item_price">$329</span></a></p>
                    </div>
                </div>
            @endforeach
            </div>
            <div style="text-align:center">{{ $products->links() }}</div>
            <div class="clearfix"> </div>
        </div>
        <div class="col-md-3 p-right single-right">
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

            @foreach ($attrs as $attr)
                <ul class="product-categories">
                    <h3>{{ $attr->name }}</h3>
                    <ul class="product-categories">
                    @foreach ($attr->values as $row)
                        <li><a href="/product?value={{ $row->id }}">{{ $row->value }}</a></li>
                    @endforeach
                </ul>
            @endforeach
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
</div>
<!--end-product-->
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
