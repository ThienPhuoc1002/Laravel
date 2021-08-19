<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tin tức</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="./css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="./css/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="./css/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="./style.css">

 
</head>
<body>

  @include('header')
  	<br><br><br><br>
  @include('nav')  
	<br><br><br>

    <div class="container">
        <div class="row">
            <div class="container" style="width: 25%;float: left;font-family: 'roboto';font-size: 20px;">
                <div class="card">
                    <div class="list-group" style="padding: 10px;">
                        <a>Danh mục sản phẩm
                        <div class="bi-list-ul" style="float: right;font-size: 25px"></div>
                        </a>
                    </div>
                    <div class="list-group dropend">
                      @if (Session::has("Loai") != null)
                        @foreach (Session::get("Loai") as $loai)
                        <a href="/loai/{{ $loai->id }}" class="list-group-item-action" style="text-decoration-line: none;height:40px;">
                          <span>&emsp;{{ $loai->name }}</span>
                          <div class="dropdown-toggle" style="padding:1px 10px;float:right;">    
                          </div>
                        </a>
                        @endforeach
                      @endif
                    </div>
                </div>
                <br><br>
                
          </div>
          
        <div class="container" style="width: 75%; float: right">
            <div class="row">
              <form class="input-group" action="/timsanpham">
                <span style="font-size: 25px;" class="col-md-6"><b>Tất cả sản phẩm</b></span>
                <input name="name" type="text" class="form-control" placeholder="Nhập tên sản phẩm">
                <button type="submit" class="btn btn-outline-success">Tìm kiếm</button>
              </form>
            </div>
            
            <hr style="color: yellow ; height:5px">
            <div class="row">
              @foreach ($products as $sp)
                <div class="col-sm-auto" style="padding-bottom: 20px">
                  <a class="card" style="width: 260px;">
                      <a href="./chitiet/{{ $sp->id }}" style="color: black"><img class="card-img-top" src="./hinhanh/{{ $sp->image }}" style="height: 260px; width: 260px" alt="Card image cap"></a>
                      <div class="card-body">
                        <a href="./chitiet/{{ $sp->id }}" style="color: black"><h5 class="card-title" style="text-align: center;">{{ $sp->name }}</h5></a>
                      </div>
                      <div class="card-footer bg-transparent border-dark" style="height: 70px;">
                          <table style="width:100%;">
                            <tr>
                              <td class="fw-bold fs-5">{{ $sp->promotion_price }}Đ</td>
                              @if ($sp->quanty == 0)
                                <td rowspan="2"><a class="btn btn-danger bi-cart3 float-end"> Hết hàng</a></td>  
                              @else
                                <td rowspan="2"><a href="javascript:" onclick="AddCart({{ $sp->id }})" class="btn btn-dark bi-cart3 float-end"> Thêm vào giỏ</a></td>  
                              @endif
                              </tr>
                            <tr>       
                              <td><small class="text-decoration-line-through">{{ $sp->unit_price }}Đ</small></td>
                            </tr>
                          </table>
                      </div>
                  </a>
                </div>
              @endforeach
            </div>
        </div>   
        
    </div>
    </div>


    <div class="container-fluid" style="background-color: #1a0d00; color: gray;">
        <div class="container">   
          <div class="row">
            <div class="col-sm-6" style="margin-top: 10px;">
              <b style="font-size: 20px;">Tin tức</b>
              <hr>
              <img src="./hinhanh/puddingdau.png" style="float: left;width: 150px;height: 100px;margin-right: 10px;">
              <b>Pudding xoài dâu tây thơm mát ngày hè</b><br>
              Hương vị thơm mát của pudding xoài dâu tây chắc chắn sẽ khiến mọi người thích thú. 1 Pudding xoài dâu tây thơm mát ngày hè<br><br>
              <img src="./hinhanh/sinhtodau.png" style="float: left;width: 150px;height: 100px;margin-right: 10px;">
              <b>Ngọt mát sinh tố dâu tây</b><br>
              Dâu tây kết hợp với chuối, sữa chua và mật ong thành món sinh tố ngon, bổ với nhiều chất xơ, vitamin, chất chống oxy hóa cho bạn hè này.
            </div>
            <div class="col-sm-3" style="margin-top: 10px;">
              <b style="font-size: 20px;">Danh mục sản phẩm</b>
              <hr>
              <ul style="list-style-type: square;">
                @if (Session::has("Loai") != null)
                  @foreach (Session::get("Loai") as $loai)
                  <li><a href="/loai/{{ $loai->id }}" style="color: gray; text-decoration-line: none;">{{ $loai->name }}</a></li>
                  @endforeach
                @endif
              </ul>
            </div>
            <div class="col-sm-3">
              <i class="text_avatar" style="background-color: #1a0d00;">Coffee Shop</i><br><br>
              <a style="text-decoration: none; color: gray" href="https://goo.gl/maps/M8dckrw5cGtG8JGk6"><b><i class="bi-geo-alt-fill"></i> Địa chỉ:</b> Thôn Tân Bình 3, xã Điện Trung, thị xã Điện Bàn, tỉnh Quảng Nam</a><br>
              <a style="text-decoration: none; color: gray" href="tel:0898239223"><b><i class="bi-telephone-fill"></i> Liên hệ:</b> 0898239223</a><br>
              <a style="text-decoration: none; color: gray" href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to=htphuoc.18i@cit.udn.vn"><b><i class="bi-envelope-fill"></i> Mail:</b> htphuoc.18i@cit.udn.vn</a><br>
            </div>
          </div>
        </div>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script type="text/javascript" src="./js/owl.carousel.js"></script>
  <script type="text/javascript">
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

  <!-- JavaScript -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <!-- Default theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
  <!-- Semantic UI theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

</body>