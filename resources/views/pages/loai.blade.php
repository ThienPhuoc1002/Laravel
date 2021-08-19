<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tin tức</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="../css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="../css/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="../style.css">

 
</head>
<body>

	@include('header')
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
            <h2>{{ $types->name }}</h2>
            <hr style="color: yellow ; height:5px">
            <div class="row row-cols-sm-auto">

                @forelse ($types->products as $sp)
                    <div class="col" style="padding-bottom: 20px">
                      <a class="card" style="width: 260px;">
                          <a href="../chitiet/{{ $sp->id }}"><img class="card-img-top" src="../hinhanh/{{ $sp['image'] }}" style="height: 260px; width: 260px" alt="Card image cap"></a>
                          <div class="card-body">
                            <a href="../chitiet/{{ $sp->id }}" style="color: black"><h5 class="card-title" style="text-align: center;">{{ $sp['name'] }}</h5></a>
                          </div>
                          <div class="card-footer bg-transparent border-dark" style="height: 70px;">
                              <table style="width:100%;">
                                <tr>
                                  <td class="fw-bold fs-5">{{ number_format($sp['promotion_price']) }}Đ</td>
                                  @if ($sp->quanty == 0)
                                    <td rowspan="2"><a class="btn btn-danger bi-cart3 float-end"> Hết hàng</a></td>  
                                  @else
                                    <td rowspan="2"><a href="javascript:" onclick="AddCart({{ $sp->id }})" class="btn btn-dark bi-cart3 float-end"> Thêm vào giỏ</a></td>  
                                  @endif  
                                </tr>
                                <tr>       
                                  <td><small class="text-decoration-line-through">{{ number_format($sp['unit_price']) }}Đ</small></td>
                                </tr>
                              </table>
                          </div>
                      </a>
                  </div>

                @empty
                  <tr>
                    <td><h2>Chưa có sản phẩm</h2></td>
                  </tr>
                @endforelse

            </div>
        </div>   
        
    </div>
    </div>


    @include('footer')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/owl.carousel.js"></script>
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
    
