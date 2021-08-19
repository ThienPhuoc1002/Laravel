<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập</title>
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
            <a class="list-group-item list-group-item-secondary bi-house-fill" href="/trangchu">    Đăng nhập</a>
        </div>
        <br>
        <div class="row justify-content-end">
            <div class="col-sm-6">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    @method('GET')
                    <div class="mb-3">
                        <label for="email" class="form-label">Email đăng nhập</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email đăng nhập" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Không hợp lệ.</div>
                    </div>

                    <div class="mb-3">
                        <label for="input1" class="form-label">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="input1" pattern="[A-Z,a-z]{1-255}" placeholder="Mật khẩu" required>
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Không hợp lệ.</div>
                    </div>
                    <div class="mb-3">
                        <a href="" style="text-decoration: none;color: black;">Quên mật khẩu?</a> | <a href="/dangky" style="text-decoration: none;color:black;">Chưa có tài khoản?</a>
                    </div>
                    <button type="submit" class="btn btn-secondary" name="btn-dangnhap">Đăng nhập</button>
                </form>
                <br>
                @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                @endif               
            </div>
        </div>
    </div>

    @include('footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/owl.carousel.js"></script>
</body>
