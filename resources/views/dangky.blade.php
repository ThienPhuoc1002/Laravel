<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng ký</title>
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
<div style="border: black"></div>
    <div class="container">
        <div class="row" style="background-color: rgb(117, 116, 116);font-size: 25px;">
            <a class="list-group-item list-group-item-secondary bi-house-fill" style="color: black" href="/trangchu">    Đăng ký thành viên</a>
        </div>
        <br>
        <div class="row justify-content-end">
            <div class="col-sm-6">
                <div class="mb-3">
                    <h4><i class="bi-person-plus-fill">&emsp;ĐĂNG KÝ</i></h4>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{$errors->first()}}
                        </div>
                    @endif 
                    @if(session('thanhcong'))
                        <div class="alert alert-success">
                            {{ session('thanhcong') }}
                        </div>
                    @endif
                </div>

                <form action="{{ route('register') }}">
                    <div class="mb-3">
                        <label for="username" class="form-label">Họ và tên</label>
                        <input type="text" name="username" class="form-control" id="name" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Không hợp lệ.</div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Không hợp lệ.</div>
                    </div>

                    <div class="mb-3">
                        <label for="input1" class="form-label">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="p1" pattern="[A-Z,a-z]{1-255}" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Không hợp lệ.</div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Nhập lại mật khẩu</label>
                        <input type="password" name="re_password" class="form-control" id="p2" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Không hợp lệ.</div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Địa chỉ</label>
                        <input type="text" name="address" class="form-control" id="p2" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Không hợp lệ.</div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" id="p2" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Không hợp lệ.</div>
                    </div>

                    <button type="submit" class="btn btn-secondary" name="btn-dangnhap">Đăng ký</button>
                </form>
                <br>
            </div>
        </div>
    </div>

    @include('footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/owl.carousel.js"></script>
</body>
