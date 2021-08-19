<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chi tiết</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="../css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="../css/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="../style.css">

  
  
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
            <h2>Thông tin sản phẩm</h2>
            <hr style="color: yellow ; height:5px">
            <div class="row row-cols-sm-auto">
                <div class="col-sm-4" style="padding-bottom: 20px">
                    <a class="card" style="width: 260px;" href="">
                        <img class="card-img-top" src="../hinhanh/{{ $products->image }}" alt="Card image cap">
                    </a>
                </div>
                <div class="col-sm-4" style="padding-bottom: 20px">
                    <p style="font-size: 25px; color:gray">{{ $products->name }}</p>
                    <span style="float: left"><b>Giá</b></span>
                    <p style="float: right">{{number_format( $products->promotion_price )}} Đ</p>
                    <br><hr>
                    <span style="float: left"><b>Giá cũ</b></span>
                    <p style="float: right"><strike>{{number_format($products->unit_price )}} Đ</strike></p>
                    <br><br>
                    <a href="" style="float: right">{{ $products->name }}</a>
                </div>
                <div class="col-sm-4" style="padding-bottom: 20px">
                    @if ( $products->quanty == 0)
                      <span class="badge bg-danger" style="width:100%">Hết hàng</span><br>
                    @else
                      <span class="badge bg-success" style="width:100%">Còn hàng<span class="float-end">Số lượng: {{ $products->quanty }}</span></span><br>
                      <label for="email" class="form-label">Số lượng</label>
                      <input id="quanty_item" type="number" class="form-control" id="email" min="0" max="{{ $products->quanty }}" value="1">
                      <a onclick="AddCart1({{ $products->id }});" type="submit" class="btn btn-success">Thêm vào giỏ</a><br>
                      <a onclick="AddCart2({{ $products->id }});" type="submit" class="btn btn-danger">Mua ngay</a>
                    @endif
                    <br>
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=241110544128";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <div class="fb-share-button" data-href="http://shopcaphe.com/chitiet/{{ $products->id }}" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fshopcaphe.com%2Fchitiet%2F{{ $products->id }}&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div></div>
            </div>
            <div class="row">
                <div class="col" style="padding: 20px">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab"><b>Chi tiết</b></a>
                        </li>
                      </ul>
                    <div class="tab-content card">
                        <div id="home" class="container tab-pane active"><br>
                            <small>{{ $products->description }}</small><br><br>
                            <img class="col-sm-5" src="../hinhanh/{{ $products->image }}" alt=""><br><br>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>   
        
    </div>
    </div>


    @include('footer')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/owl.carousel.js"></script>

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
<script>
  function AddCart2(id){
            $.ajax({
                url: '../addcart1/'+id+'/'+$("#quanty_item").val(),
                type: 'GET',
            }).done(function(response){
              alertify.success('Đã thêm vào giỏ hàng');
              window.setTimeout(function(){location.replace('/thanhtoan')},1000);
            }); 
        }  
        function AddCart1(id){
            $.ajax({
                url: '../addcart1/'+id+'/'+$("#quanty_item").val(),
                type: 'GET',
            }).done(function(response){
              alertify.success('Đã thêm vào giỏ hàng');
              window.setTimeout(function(){location.reload()},1000);
            }); 
        }   
</script>

    
