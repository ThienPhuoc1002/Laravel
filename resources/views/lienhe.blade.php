<!DOCTYPE html>
<html lang="en">
<head>
  <title>Liên hệ</title>
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
    <br><br><br><br>
    @include('nav')
    <br><br><br>

    <div class="container" style="font-size: 15px;">
        <div class="row">
            <div class="col-sm-6">
                <div class="content">
                    <span>
                        <i class="bi-geo-alt-fill"></i><strong> Địa chỉ: </strong>
                        <a style="text-decoration: none;" href="https://goo.gl/maps/M8dckrw5cGtG8JGk6" target="_blank" rel="noopener noreferrer">Thôn Tân Bình 3, xã Điện Trung, thị xã Điện Bàn, tỉnh Quảng Nam</a>
                    </span><br> 
                        
                    <span>
                        <i class="bi-telephone-fill"></i><strong> Hotline: </strong>
                        <a style="text-decoration: none;" href="tel:0898239223">0898239223</a> 
                    </span><br> 
                    <span>
                        <i class="bi-envelope-fill"></i><strong> Mail: </strong>
                        <a style="text-decoration: none;" href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;to=htphuoc.18i@cit.udn.vn" target="_blank" rel="noopener noreferrer">htphuoc.18i@cit.udn.vn
                        </a>
                        <br><br><br>
                    </span>       
                    <iframe width="100%" height="380" frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3227.283635478271!2d108.21924231726481!3d15.86139721078992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142055fc0baeb83%3A0x3f842330ea13c41!2zVGjDtG4gVMOibiBCw6xuaCAz!5e0!3m2!1svi!2s!4v1622597759741!5m2!1svi!2s" allowfullscreen="">
                    </iframe>    
                </div>
            </div>

            <div class="col-sm-6">
                @if(session('thanhcong'))
                        <div class="alert alert-success">
                            {{ session('thanhcong') }}
                        </div>
                    @endif
                <form action="/guilienhe">
                    <div class="mb-3">
                        <label for="input1" class="form-label">Họ tên</label>
                        <input type="text" class="form-control" name="name" id="input1" pattern="[A-Z,a-z]{1-255}" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Không hợp lệ.</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Không hợp lệ.</div>
                    </div>  
                    
                    <div class="mb-3">
                        <label for="sdt" class="form-label">Điện thoại</label>
                        <input type="tel" class="form-control" name="phone" pattern="0[0-9]{9}" id="sdt" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Không hợp lệ.</div>
                    </div> 

                    <div class="mb-3">
                        <label for="tieude" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" name="tieude" id="tieude" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Không hợp lệ.</div>
                    </div> 

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Nội dung</label>
                        <textarea class="form-control" name="noidung" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Không hợp lệ.</div>
                    </div>
                    <button type="submit" class="btn btn-secondary" name="btn-submit-contact">Gửi liên hệ</button>
                </form>
                <br><br><br>
            </div>
        </div>
    </div>


  @include('footer')

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/owl.carousel.js"></script>
</body>
