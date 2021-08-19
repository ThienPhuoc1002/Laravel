<div class="fixed-top">
    <header class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container-fluid">
          <div class="d-flex flex-wrap align-items-center" >
              <a href="/trangchu" class="navbar-brand">
              <i class="text_avatar">Coffee Shop  </i>
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" placeholder="menu" ></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                  <li>
                      <a href="/trangchu" class="nav-link text-white">
                        <b><i class="bi-house-door"></i>
                        Trang chủ</b>
                      </a>
                  </li>
                  <li>
                    <a href="/gioithieu" class="nav-link text-white">
                      <b>Giới thiệu</b>
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false"><b>Sản phẩm</b></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown">
						<li><a class="dropdown-item" href="/sanpham">Tất cả</a></li>
						@if (Session::has("Loai") != null)
							@foreach (Session::get("Loai") as $types)
							<li><a class="dropdown-item" href="/loai/{{ $types->id }}">{{ $types->name }}</a></li>
							@endforeach
						@endif
                    </ul>
                  </li>
                  <li>
                    <a href="/tintuc" class="nav-link text-white">
                      <b>Tin tức</b>
                    </a>
                  </li>
                  <li>
                    <a href="/lienhe" class="nav-link text-white">
                      <b><i class="bi-person-circle"></i>
                      Liên hệ</b>
                    </a>
                  </li>
              </ul>
          </div>
        </div>
        <div class="navbar d-flex flex-wrap align-items-center justify-content-center justify-content-lg-end">
          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0">
			@if (Session::has('admintk'))
			<li>
				<div class="nav-link text-white">
				 	Xin chào
				</div>
			</li>
			<li>
				<div class="nav-link text-white">
					{{ session()->get('admintk')->full_name }}
			   </div>
			</li>
			@else
				<li>
					<a href="/dangky" class="nav-link text-white">
						<i class="bi-person"></i>
						Đăng ký thành viên
					</a>
				</li>
				<li>
					<a href="/dangnhap" class="nav-link text-white">
						<i class="bi-key"></i>
						Đăng nhập
					</a>
				</li>
			@endif
            
            <li>
              <a href="/giohang" class="nav-link text-white">
                <i class="bi-bag"></i>
                Giỏ hàng
              </a>
            </li>          
          </ul>
        
        </div>
		<div class="inner-header">
			<div class="row">				
				<div class="text-right">
					<ul class="nav-right">
						<li class="heart-icon"><a href="#">
								<i class="bi-heart"></i>
								<span>1</span>
							</a>
						</li>
						<li class="cart-icon"><a href="#">
								<i class="bi-bag"></i>
								@if (Session::has("Cart") != null)
									<span id="soluong_show">{{ Session::get("Cart")->totalQuanty }}</span>
								@else
									<span id="soluong_show">0</span>
								@endif       
							</a>
							<div class="cart-hover">
								<div class="change__item__cart">
									@if (Session::has("Cart") != null)
										<div class="select-items">
											<table>
												<tbody>
													@foreach (Session::get("Cart")->products as $item)
													<tr>
														<td class="si-pic"><img src="/hinhanh/{{ $item['ttin']->image }}" alt=""></td>
														<td class="si-text">
															<div class="product-selected">
																<p>{{ number_format($item['ttin']->promotion_price) }}₫ x {{ $item['sluong'] }}</p>
																<h6>{{ $item['ttin']->name }}</h6>
															</div>
														</td>
														<td class="si-close">
															<a class="ti-close" style="color: black" href="javascript:" onclick="DelCart({{ $item['ttin']->id }});">X</a>
														</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
										<div class="select-total">
											<span>total:</span>
											<h5>{{ number_format(Session::get("Cart")->totalPrice) }}₫</h5>
										</div>
									@endif

								</div>
								
								
								<div class="select-button">
									<a href="{{ url('/giohang') }}" class="primary-btn view-card">GIỎ HÀNG</a>
									<a href="{{ url('/thanhtoan') }}" class="primary-btn checkout-btn">THANH TOÁN</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
      </div>
    </header>	
</div>

  <script>
	  function AddCart(id){
        $.ajax({
            url: '/addcart/'+id,
            type: 'GET',
        }).done(function(response){
            alertify.success('Đã thêm vào giỏ hàng');
            window.setTimeout(function(){location.reload()},1000);
        }); 
    }
     
    function DelCart(id){
        $.ajax({
            url: '/delcart/'+id,
            type: 'GET',
        }).done(function(response){
            alertify.success('Đã xóa sản phẩm');
            window.setTimeout(function(){location.reload()},1000);
        }); 
    }   
	
  </script>

<style>
	.nav-item{
		position: relative;
	}

	.nav-item a {
	position: relative;
	display: inline-block;
	}
	.nav-item:hover .dropdown-menu{
	top: 40px;
	opacity: 1;
	visibility: visible;
	}

	.nav-item .dropdown-menu{
	position: absolute;
	width: 100%;
	background: #fff;
	left: 0;
	top: 62px;
	opacity: 0;
	visibility: hidden;
	padding-bottom: 10px;
	-webkit-box-shadow: 0 13px 32px rgba(51, 51, 51, 0.1);
	box-shadow: 0 13px 32px rgba(51, 51, 51, 0.1);
	-webkit-transition: all 0.3s;
	-o-transition: all 0.3s;
	transition: all 0.3s;
	}

  .inner-header {
	padding: 0;
}

.inner-header .nav-right {
	padding: 10px 0;
}

.inner-header .nav-right li {
	list-style: none;
	display: inline-block;
	font-size: 20px;
	margin-left: 15px;
}

.inner-header .nav-right li.heart-icon a {
	color: white;
	position: relative;
	display: inline-block;
}

.inner-header .nav-right li.heart-icon a span {
	position: absolute;
	right: -8px;
	top: -1px;
	height: 15px;
	width: 15px;
	background: #e7ab3c;
	color: #ffffff;
	border-radius: 50%;
	font-size: 11px;
	font-weight: 700;
	text-align: center;
	line-height: 15px;
}

.inner-header .nav-right li.cart-icon {
	position: relative;
}

.inner-header .nav-right li.cart-icon:hover .cart-hover {
	opacity: 1;
	visibility: visible;
	top: 60px;
}

.inner-header .nav-right li.cart-icon a {
	color: white;
	position: relative;
	display: inline-block;
}

.inner-header .nav-right li.cart-icon a span {
	position: absolute;
	right: -8px;
	top: -1px;
	height: 15px;
	width: 15px;
	background: #e7ab3c;
	color: #ffffff;
	border-radius: 50%;
	font-size: 11px;
	font-weight: 700;
	text-align: center;
	line-height: 15px;
}

.inner-header .nav-right li.cart-icon .cart-hover {
	position: absolute;
	right: -10px;
	top: 100px;
	width: 350px;
	background: #ffffff;
	z-index: 99;
	text-align: left;
	padding: 30px;
	opacity: 0;
	visibility: hidden;
	-webkit-box-shadow: 0 13px 32px rgba(51, 51, 51, 0.1);
	box-shadow: 0 13px 32px rgba(51, 51, 51, 0.1);
	-webkit-transition: all 0.3s;
	-o-transition: all 0.3s;
	transition: all 0.3s;
}

.inner-header .nav-right li.cart-icon .cart-hover .select-items table {
	width: 100%;
}

.inner-header .nav-right li.cart-icon .cart-hover .select-items table tr td {
	padding-bottom: 20px;
}

.inner-header .nav-right li.cart-icon .cart-hover .select-items table tr td.si-pic img {
	border: 1px solid #ebebeb;
	width: 100px;
	height: 100px;
}

.inner-header .nav-right li.cart-icon .cart-hover .select-items table tr td.si-text {
	padding-left: 18px;
}

.inner-header .nav-right li.cart-icon .cart-hover .select-items table tr td.si-text .product-selected p {
	color: #e7ab3c;
	line-height: 30px;
	margin-bottom: 7px;
}

.inner-header .nav-right li.cart-icon .cart-hover .select-items table tr td.si-text .product-selected h6 {
	color: #232530;
}

.inner-header .nav-right li.cart-icon .cart-hover .select-items table tr td.si-close {
	color: #252525;
	font-size: 16px;
	cursor: pointer;
}

.inner-header .nav-right li.cart-icon .cart-hover .select-total {
	overflow: hidden;
	border-top: 1px solid #e5e5e5;
	padding-top: 26px;
	margin-bottom: 30px;
}

.inner-header .nav-right li.cart-icon .cart-hover .select-total span {
	font-size: 14px;
	color: #e7ab3c;
	text-transform: uppercase;
	letter-spacing: 0.5px;
	float: left;
}

.inner-header .nav-right li.cart-icon .cart-hover .select-total h5 {
	color: #e7ab3c;
	float: right;
}

.inner-header .nav-right li.cart-icon .cart-hover .select-button .view-card {
	font-size: 12px;
	letter-spacing: 2px;
	display: block;
	text-align: center;
	background: #191919;
	color: #ffffff;
	padding: 15px 30px 12px;
	margin-bottom: 10px;
}

.inner-header .nav-right li.cart-icon .cart-hover .select-button .checkout-btn {
	font-size: 12px;
	letter-spacing: 2px;
	display: block;
	text-align: center;
	background: #191919;
	color: #ffffff;
	padding: 15px 30px 12px;
}

.inner-header .nav-right li.cart-price {
	font-size: 18px;
	font-weight: 700;
	color: #252525;
}

</style>