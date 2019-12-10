@extends('frontend.master.master')
@section('title', 'Giỏ Hàng')
@section('css')
<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
@endsection
@section('content')
<!-- main -->
<div class="colorlib-shop">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-10 col-md-offset-1">
                    <div class="process-wrap">
                        <div class="process text-center active">
                            <p><span>01</span></p>
                            <h3>Giỏ hàng</h3>
                        </div>
                        <div class="process text-center">
                            <p><span>02</span></p>
                            <h3>Thanh toán</h3>
                        </div>
                        <div class="process text-center">
                            <p><span>03</span></p>
                            <h3>Hoàn tất thanh toán</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-pb-md">
                <div class="col-md-10 col-md-offset-1">
                    <div class="product-name">
                        <div class="one-forth text-center">
                            <span>Chi tiết sản phẩm</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Giá</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Số lượng</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Tổng</span>
                        </div>
                        <div class="one-eight text-center">
                            <span>Xóa</span>
                        </div>
                    </div>
                    @foreach ($cart as $product)
                        <div class="product-cart">
                            <div class="one-forth">
                                <div class="product-img" style="margin-right:10px">
                                    <img class="img-thumbnail cart-img" src="/backend/img/{{ $product->options->img }}" style="width:100px;height:100px !important;">
                                </div>
                                <div class="detail-buy">
                                    <h4>{{ $product->name }}</h4>
                                    <div class="row">
                                        @foreach ($product->options->attr as $key => $value)
                                            <div class="col-md-3"><strong>{{ $key }}: {{ $value }}</strong></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span class="price">{{ number_format($product->price, 0, "", ".") }} vnđ</span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <input onChange="update_qty('{{ $product->rowId }}', this.value)" type="number" id="quantity" name="quantity" class="form-control input-number text-center" value="{{ $product->qty }}">
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <span class="price">{{ number_format($product->price*$product->qty, 0, "", ".") }} vnđ</span>
                                </div>
                            </div>
                            <div class="one-eight text-center">
                                <div class="display-tc">
                                    <a href="/product/removecart/{{ $product->rowId }}" onClick="return del_cart('{{ $product->name }}')" class="closed"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="total-wrap">
                        <div class="row">
                            <div class="col-md-8">

                            </div>
                            <div class="col-md-3 col-md-push-1 text-center">
                                <div class="total">
                                    <div class="sub">
                                        <p><span>Tổng:</span> <span>{{ $total }} vnđ</span></p>
                                    </div>
                                    <div class="grand-total">
                                        <p><span><strong>Tổng cộng:</strong></span> <span>{{ $total }} vnđ</span></p>
                                        <a href="/product/checkout" class="btn btn-success">Thanh toán <i class="icon-arrow-right-circle"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end main -->
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
<script>
    function del_cart(name)
    {
        return confirm("Bạn muốn xóa sản phẩm "+name+" không?");
    }
    function update_qty(rowId, qty)
    {
        $.get('/product/updatecart/'+rowId+'/'+qty,
        function()
        {
            window.location.reload();
        }
        );
    }
</script>
@endsection
