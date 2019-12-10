<!--top-header-->
<div class="top-header">
	<div class="container">
		<div class="top-header-main">
			<div class="col-md-4 top-header-left">
				<div class="search-bar">
                    <form method="GET" action="/product">
                        <input type="text" value="Nhập tên sản phẩm cần tìm" name="search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nhập tên sản phẩm cần tìm';}">
                        <input type="submit" value="">
                    </form>
				</div>
			</div>
			<div class="col-md-4 top-header-middle">
				<a href="/"><img src="images/logo.png" id="logo" /></a>
			</div>
			<div class="col-md-4 top-header-right">
				<div class="cart box_1">
						<a href="/product/cart">
						<h3> <div class="total">
							<span>{{ Cart::total(0, '', '.') }}  vnđ</span> ({{ Cart::count() }} sản phẩm)</div>
							<img src="images/cart-1.png" alt="" />
                        </a>
                        @if (Cart::count() == 0)
                            <p><a href="javascript:;" class="simpleCart_empty">GIỎ TRỐNG</a></p>
                        @endif
						<div class="clearfix"> </div>
					</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--top-header-->
<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="top-nav">
            <ul class="memenu skyblue"><li class="active"><a href="/">TRANG CHỦ</a></li>
                <li class="grid"><a href="/product">SẢN PHẨM</a></li>
                <li class="grid"><a href="/about">GIỚI THIỆU</a></li>
                <li class="grid"><a href="/contact">LIÊN HỆ</a></li>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!--bottom-header-->
