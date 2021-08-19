<!DOCTYPE html>
<html lang="en">
<head>
    <title>Khách hàng</title>
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
    <div class="container">
        <h4 style="float: left;" class="py-10">Thông tin giao hàng</h4>
        
        <div class="btn float-end" onclick="javascript:location.href='/logout'" style="background-color: rgb(228, 142, 156)"><b>Đăng xuất</b></div>
        <button class="btn btn-dark float-end" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Sửa thông tin</button>
        <table class="table table-striped table-bordered border-dark">  
            @if (Session::has('admintk'))   
            <tr>
                <td class="bi-person-fill" style="width: 30%"> Tên</td>
                <td>{{ $tk->full_name }}</td>
            </tr>
            <tr>
                <td class="bi-telephone-fill"> SĐT</td>
                <td>{{ $tk->phone }}</td>
            </tr>
            <tr>
                <td class="bi-envelope-fill"> Email</td>
                <td>{{ $tk->email }}</td>
            </tr>
            <tr>
                <td class="bi-geo-alt-fill"> Địa chỉ</td>
                <td>{{ $tk->address }}, {{ $tk->wards->name }}, {{ $tk->province->name }}, {{ $tk->city->name }}</td>
            </tr>
            @endif 
        </table>@if($errors->any())
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div>
        @endif 
        @if (\Session::has('success'))
            <div class="alert alert-success">
                {!! \Session::get('success') !!}
            </div>
        @endif
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Thông tin khách hàng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/editcus">
                            <label for="">Tên</label>
                            <input class="form-control" name="name1" value="{{ session()->get('admintk')->full_name }}" type="text">
                            <label for="">Email</label>
                            <input class="form-control" name="email1" value="{{ session()->get('admintk')->email }}" type="text">
                            <label for="">Số điện thoại</label>
                            <input class="form-control" name="phone1" value="{{ session()->get('admintk')->phone }}" type="text">
                            <label for="">Địa chỉ</label>
                            <input class="form-control" name="address1" value="{{ session()->get('admintk')->address }}" type="text">
                            <label for="">Thành phố</label>
                            <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                @foreach ($city as $ci)
                                    @if ($ci->matp == $tk->matp)
                                        <option value="{{ $tk->matp }}" selected>{{ $ci->name }}</option>
                                    @else
                                        <option value="{{ $ci->matp }}">{{ $ci->name }}</option>
                                    @endif  
                                @endforeach
                            </select>
                            <label for="">Quận/Huyện</label>
                            <select name="province" id="province" class="form-control input-sm m-bot15 choose province">
                                @foreach ($province as $pro)
                                    @if ($pro->maqh == $tk->maqh)
                                        <option value="{{ $pro->maqh }}" selected>{{ $pro->name }}</option>
                                    @else
                                        <option value="{{ $pro->maqh }}">{{ $pro->name }}</option>
                                    @endif  
                                @endforeach
                            </select>
                            <label for="">Xã/Phường</label>
                            <select name="wards" id="wards" class="form-control input-sm m-bot15 city">
                                @foreach ($wards as $wa)
                                    @if ($wa->xaid == $tk->xaid)
                                        <option value="{{ $tk->xaid }}" selected>{{ $wa->name }}</option>
                                    @endif  
                                @endforeach
                            </select>
                            <br><button type="submit" class="btn btn-dark">Lưu thông tin</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-dark" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Đổi mật khẩu</button>
                    </div>
                </div>
            </div>
          </div>
        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Đổi mật khẩu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/savepass" method="POST">
                            @csrf
                            @method('GET')
                            <label for="">Mật khẩu cũ</label>
                            <input class="form-control" name="old" type="password" required>
                            <label for="">Mật khẩu mới</label>
                            <input class="form-control" name="new" type="password" required>
                            <label for="">Nhập lại mật khẩu mới</label>
                            <input class="form-control" name="re_new" type="password" required> 
                            <br><button class="btn btn-dark">Lưu thay đổi</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-dismiss="modal">Thoát</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/owl.carousel.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                // alert(action);
                // alert(ma_id);
                // alert(_token);

                if(action=='city'){
                    result = 'province';
                }else{
                    result = 'wards';
                }
                $.ajax({
                    url : '{{url('/select-delivery')}}',
                    method: 'POST',
                    data:{action:action,ma_id:ma_id,_token:_token},
                    success:function(data){
                    $('#'+result).html(data);     
                    }
                });
            }); 
        })
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