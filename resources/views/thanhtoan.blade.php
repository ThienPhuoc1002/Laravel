<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thanh toán</title>
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
            <form action="/dathang" class="row">
                <div class="col-md-8 py-4">
                    <h4>Thông tin giao hàng</h4>
                    <hr>
                    <div class="py-2">
                        <label for="username" class="form-label">Họ tên</label>
                        <input disabled type="text" value="{{ session()->get('admintk')->full_name }}" name="username" class="form-control" id="name" required>
                    </div>
                    <div class="py-2">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input disabled type="text" value="{{ session()->get('admintk')->phone }}" name="phone" class="form-control" id="name" required>
                    </div>
                    <div class="py-2">
                        <label for="username" class="form-label">Email</label>
                        <input disabled type="email" value="{{ session()->get('admintk')->email }}" name="email" class="form-control" id="name" required>
                    </div>
                    <div class="py-2">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input disabled type="text" value="{{ $tk->address }}, {{ $tk->wards->name }}, {{ $tk->province->name }}, {{ $tk->city->name }}" name="address" class="form-control" id="name" required>
                    </div>
                    <div class="py-2">
                        <label for="username" class="form-label">Ghi chú</label>
                        <textarea class="col-12" name="note" id="3" cols="" rows="2"></textarea>
                    </div>
                    {{-- <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"> --}}
                        <button type="button" class="btn btn-dark" onclick="location.href='/khachhang'">
                    Sửa thông tin
                    </button>
                </div>
                {{-- <div class="col-md-4 py-4">
                    <h4>Vận chuyển</h4>
                    <hr>
                    <label class="py-2" for="2">Chọn phương thức vận chuyển</label>
                    <select name="vanchuyen" class="form-control" id="vanchuyen" aria-placeholder="123" required>  
                        <option value="" disabled selected hidden>Please Choose...</option>                         
                        <option value="40000">Giao hàng tận nơi : {{ number_format(40000) }}Đ</option>
                    </select>
                    <br>
                    <h4>Thanh toán</h4>
                    <hr>
                    <input type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                    <label for="flexRadioDefault1">Thanh toán khi giao hàng (COD)</label>
                    <br>
                    <input type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label for="flexRadioDefault1">Chuyển khoản qua ngân hàng</label>         
                </div> --}}
                <div class="col-md-4 py-4">
                    <h4>Đơn hàng</h4>
                    <hr>
                    @if (Session::has("Cart") != null)
                    <div class="card">
                        <div class="card-body">
                            
                                @foreach (Session::get("Cart")->products as $item)
                                    <div class="float-start">{{ $item['ttin']->name }} (x{{ $item['sluong'] }})</div>
                                    <div class="float-end">{{ number_format($item['gia'] )}}Đ</div>
                                    <br><hr>
                                @endforeach                           
                            {{-- <div class="float-start"><b>Tạm tính</b></div>
                            <div class="float-end"><b>{{ number_format(Session::get("Cart")->totalPrice) }}Đ</b></div>
                            <br><hr> --}}
                            <div class="float-start">Phí vận chuyển</div>
                            
                                <div class="float-end">{{ number_format($fee->phi) }}Đ</div>
                                <br><hr>
                            
                            
                            {{-- <label for="username" class="form-label">Mã giảm giá</label>
                            <input type="text" name="username" class="form-control" id="name">
                            <div class="btn btn-dark my-2">Áp dụng</div> --}}
                            
                        </div>
                        @endif
                        @if (Session::has("Cart") != null)
                        <div class="card-footer">
                            <div class="float-start"><h5>Tổng cộng</h5></div>
                            <div class="float-end"><h5>{{ number_format(Session::get("Cart")->totalPrice + $fee->phi) }}Đ</h5></div>
                        </div>
                        @endif
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark float-end" name="btn-dathang">Đặt hàng</button>
                    <br><br><br>
                    @if($errors->any())
                        <div class="alert alert-success">
                            {{$errors->first()}}
                        </div>
                    @endif 
                </div>
            </form>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Thông tin khách hàng</h5>
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
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
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
    <script type="text/javascript" src="script.js"></script>
    
</body>
</html>
