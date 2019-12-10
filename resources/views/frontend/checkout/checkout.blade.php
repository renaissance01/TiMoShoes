@extends('frontend.master.master')
@section('title', 'Thanh toán')
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
							<div class="process text-center active">
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
				<div class="row">
					<div class="col-md-7">
						<form method="post" class="colorlib-form">
                            @csrf
							<h2>Chi tiết thanh toán</h2>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="fname">Họ & Tên</label>
                                        <input name="name" type="text" id="fname" class="form-control" placeholder="First Name">
                                        @if ($errors->has('name'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @endif
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="address">Địa chỉ</label>
                                        <input name="address" type="text" id="address" class="form-control" placeholder="Nhập địa chỉ của bạn">
                                        @if ($errors->has('address'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </div>
                                        @endif
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-6">
										<label for="email">Địa chỉ email</label>
                                        <input name="email" type="email" id="email" class="form-control" placeholder="Ex: youremail@domain.com">
                                        @if ($errors->has('email'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        @endif
									</div>
									<div class="col-md-6">
										<label for="Phone">Số điện thoại</label>
                                        <input name="phone" type="text" id="zippostalcode" class="form-control" placeholder="Ex: 0123456789">
                                        @if ($errors->has('phone'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </div>
                                        @endif
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-12">

									</div>
								</div>
							</div>

					</div>
					<div class="col-md-5">
						<div class="cart-detail">
							<h2>Tổng Giỏ hàng</h2>
							<ul>
								<li>

									<ul>
                                        @foreach ($cart as $product)
                                            <li><span>{{ $product->qty }} x {{ $product->name }}
                                            @foreach ($product->options->attr as $key => $value)
                                                ({{ $key }}:{{ $value }})
                                            @endforeach
                                            </span><span>{{ number_format($product->price*$product->qty, 0, "", ".") }} vnđ</span></li>
                                        @endforeach
									</ul>
								</li>

								<li><span>Tổng tiền đơn hàng</span> <span>{{ $total }} vnđ</span></li>
							</ul>
						</div>

						<div class="row">
							<div class="col-md-12">
								<p><button class="btn btn-success">Thanh toán</button></p>
							</div>
						</div>
                    </div>
                </form>
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
@endsection
