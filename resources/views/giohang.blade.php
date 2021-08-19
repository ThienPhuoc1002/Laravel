<!DOCTYPE html>
<html lang="en">
<head>
    <title>Giỏ hàng</title>
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
    <br><br><br>
    <div class="container">
        <h2>Giỏ hàng của bạn</h2>      
        <table class="table table-striped table-bordered border-dark">
          <thead>
            <tr class="table table-secondary table-bordered border-dark">
              <th>Ảnh</th>
              <th>Sản phẩm</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Thành tiền</th>
              <th style="width: 5%"></th>
            </tr>
          </thead>
          <tbody id="list_cart">
            @if (Session::has("Cart") != null)
            @foreach (Session::get("Cart")->products as $item)
            <tr>
                <td><img src="hinhanh/{{ $item['ttin']->image }}" style="height: auto;width:150px;"alt=""></td>
                <td>{{ $item['ttin']->name }}</td>
                <td>
                  <div class="input-group mb-3" style="width: 200px">
                      <input id="quanty_item_{{ $item['ttin']->id }}" type="number" class="form-control" name=""  min="1" max="{{ $item['ttin']->quanty }}" value="{{ $item['sluong'] }}" aria-label="Recipient's username" aria-describedby="button-addon2">
                      <a class="btn btn-outline-secondary bi-arrow-repeat" type="button" id="button-addon2" onclick="SaveListItemCart({{ $item['ttin']->id }});"></a>
                    </div>
                  </td>
                <td>{{ number_format($item['ttin']->promotion_price) }}Đ</td>
                <td>{{ number_format($item['gia'] )}}Đ</td>
                <td><i onclick="DeleteListItemCart({{ $item['ttin']->id }});" class="btn btn-danger bi-trash-fill" style="font-size: 20px; color:black"></i></td>
            </tr>
            
            @endforeach
            
            <tr>
              <td colspan="4" align="right">Tổng cộng:</td>
              <td>{{ number_format(Session::get("Cart")->totalPrice) }}₫</td>
              <td></td>
          </tr>
          @else
            <tr>
              <td colspan="6" style="text-align: center">Bạn chưa có sản phẩm nào, hãy đặt hàng</td>
            </tr>
          @endif
          </tbody>
        </table>
        <a href="/trangchu" type="submit" class="bi-arrow-left btn btn-success float-start"><b> Tiếp tục mua hàng</a></b>
        <a href="/thanhtoan" type="submit" class="bi-box-arrow-right btn btn-primary float-end"><b> Thanh toán</a></b>
        <br><br><br>
      </div>

    @include('footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/owl.carousel.js"></script>

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
  function SaveListItemCart(id){
            $.ajax({
                url: 'savelist/'+id+'/'+$("#quanty_item_"+id).val(),
                type: 'GET',
            }).done(function(response){
              alertify.success('Đã cập nhật sản phẩm');
              window.setTimeout(function(){location.reload()},1000);
            }); 
        }
  function DeleteListItemCart(id){
            $.ajax({
                url: 'dellist/'+id,
                type: 'GET',
            }).done(function(response){
              alertify.success('Đã xóa sản phẩm');
              window.setTimeout(function(){location.reload()},1000);
            }); 
        }
</script>