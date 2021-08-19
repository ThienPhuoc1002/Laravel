<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trang chủ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="style.css">

 
</head>
<body>

  @include('header')
  <div id="myCarousel1" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel1" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel1" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="hinhanh/sliderlon1.png" alt="">
      </div>
      <div class="carousel-item">
        <img src="hinhanh/sliderlon2.png" alt="">
      </div>
      <div class="carousel-item">
        <img src="hinhanh/sliderlon3.png" alt="">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel1" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel1" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container-fluid" style="background-color: #ffddcc;">
    <br><br>
    <div class="row">
      <div class="col">
          <img src="hinhanh/logocf.png" class="mx-auto d-block"><br>
          <p class="text_slide">"Đi cà phê" từ lâu không đơn thuần chỉ là uống một tách cà phê mà còn là dịp gặp mặt và trò chuyện cùng bạn bè. Tại The Coffee Shop, chúng tôi trân trọng và đề cao giá trị kết nối giữa con người và trải nghiệm của khách hàng. Chúng tôi tin tưởng mạnh mẽ rằng thức uống với chất lượng tốt nhất được phục vụ trong không gian thân thiện bởi những nhân viên tận tâm tại The Coffee Shop sẽ mang lại những niềm vui bạn có thể chia sẻ cùng bạn bè và gia đình. The Coffee Shop luôn luôn chào đón bạn.</p><br><br>
          <a class="btn float-end" href='./gioithieu' type="submit" style="background-color: #993300; color: white;">Xem chi tiết</a>
      </div>
      <div class="col">
        <div id="myCarousel2" class="carousel slide" data-bs-ride="carousel">

          <!-- Indicators -->
          <ul class="carousel-indicators">
            <li type="button" data-bs-target="#myCarousel2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></li>
            <li type="button" data-bs-target="#myCarousel2" data-bs-slide-to="1" aria-label="Slide 2"></li>
            <li type="button" data-bs-target="#myCarousel2" data-bs-slide-to="2" aria-label="Slide 3"></li>
          </ul>
          
          <!-- The slideshow -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="hinhanh/slider1.png" alt="">
            </div>
            <div class="carousel-item">
              <img src="hinhanh/slider2.png" alt="">
            </div>
            <div class="carousel-item">
              <img src="hinhanh/slider3.png" alt="">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel2" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel2" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <br><br>
      </div>
    </div>
  </div>
  <div class="container">
    
    <div id="1" class="owl-carousel owl-theme owl-loaded">

      <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1 bd-highlight fw-bold" style="font-size: 30px;">Thức uống khuyến mãi</div>
        <div class="p-2 bd-highlight owl-prev1 bi-arrow-left-circle-fill fw-bold" type="button" style="font-size: 30px;"></div>
        <div class="p-2 bd-highlight owl-next1 bi-arrow-right-circle-fill fw-bold" type="button" style="font-size: 30px;"></div>
      </div>

      <div class="owl-stage-outer">
        <div class="owl-stage">
          @foreach ($products as $sp)
          @if ($sp->id>=1 && $sp->id<=4)
          <div class="owl-item">
            <div class="card" style="width: 260px;">
              <a href="./chitiet/{{ $sp->id }}" style="color: black">
              <img class="card-img-top" src="hinhanh/{{ $sp->image }}" style="height: 260px; width: 260px" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title" style="text-align: center;">{{ $sp->name }}</h5>
              </div>
            </a>
              <div class="card-footer bg-transparent border-dark" style="height: 70px;">
                  <table style="width:100%;">
                    <tr>
                      <td class="fw-bold fs-5">{{ number_format($sp->promotion_price )}}Đ</td>
                      <td rowspan="2"><a href="javascript:" onclick="AddCart({{ $sp->id }})" class="btn btn-dark bi-cart3 float-end">Thêm vào giỏ</a></td>  
                    </tr>
                    <tr>       
                      <td><small class="text-decoration-line-through">{{ number_format($sp->unit_price )}}Đ</small></td>
                    </tr>
                  </table>
              </div>
            </div>
          </div>
          @endif
          @endforeach          
        </div>
      </div>
    </div>
  </div>
  <br>

  <div class="container">
    
    <div id="2" class="owl-carousel owl-theme owl-loaded">

      <div class="d-flex bd-highlight">
        <div class="p-2 flex-grow-1 bd-highlight fw-bold" style="font-size: 30px;">Thức uống mới</div>
        <div class="p-2 bd-highlight owl-prev2 bi-arrow-left-circle-fill fw-bold" type="button" style="font-size: 30px;"></div>
        <div class="p-2 bd-highlight owl-next2 bi-arrow-right-circle-fill fw-bold" type="button" style="font-size: 30px;"></div>
      </div>

      <div class="owl-stage-outer">
        <div class="owl-stage">
          @foreach ($products as $sp)
          @if ($sp->id>=5 && $sp->id<=8)
          <div class="owl-item">
            <div class="card" style="width: 260px;">
              <a href="./chitiet/{{ $sp->id }}" style="color: black">
              <img class="card-img-top" src="hinhanh/{{ $sp->image }}" style="height: 260px; width: 260px" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title" style="text-align: center;">{{ $sp->name }}</h5>
              </div>
              </a>
              <div class="card-footer bg-transparent border-dark" style="height: 70px;">
                  <table style="width:100%;">
                    <tr>
                      <td class="fw-bold fs-5">{{ number_format($sp->promotion_price )}}Đ</td>
                      @if ($sp->quanty == 0)
                        <td rowspan="2"><a class="btn btn-danger bi-cart3 float-end"> Hết hàng</a></td>  
                      @else
                        <td rowspan="2"><a href="javascript:" onclick="AddCart({{ $sp->id }})" class="btn btn-dark bi-cart3 float-end"> Thêm vào giỏ</a></td>  
                      @endif
                    </tr>
                    <tr>       
                      <td><small class="text-decoration-line-through">{{ number_format($sp->unit_price )}}Đ</small></td>
                    </tr>
                  </table>
              </div>
            </div>
          </div>
          @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <br>

  <div class="container">
    <div class="row">
      <img src="hinhanh/cf1.png" class="col-sm-4">
      <img src="hinhanh/cf2.png" class="col-sm-8">
    </div>
  </div>
  <br>
  <div class="container-fluid" style="background-color: #e7e7e4; height: 220px;">
    <div class="container">   
      <div id="3" class="owl-carousel owl-theme owl-loaded">
        <div class="owl-stage-outer">
            <div class="owl-stage">
              <div class="owl-item">
                <img src="hinhanh/logo5.png">
              </div>
              <div class="owl-item">
                <img src="hinhanh/logo4.png">
              </div>
              <div class="owl-item">
                <img src="hinhanh/logo3.png">
              </div>
              <div class="owl-item">
                <img src="hinhanh/logo2.png">
              </div>
              <div class="owl-item">
                <img src="hinhanh/logo1.png">
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <br>

  @include('footer')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/owl.carousel.js"></script>
  <script type="text/javascript" src="script.js"></script>

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

  <script>
    

  </script>

</body>

