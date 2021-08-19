<div class="container-fluid" style="background-color: #1a0d00; color: gray;">
    <div class="container">   
      <div class="row">
        <div class="col-sm-6" style="margin-top: 10px;">
          <b style="font-size: 20px;">Tin tức</b>
          <hr>
          <img src="/hinhanh/puddingdau.png" style="float: left;width: 150px;height: 100px;margin-right: 10px;">
          <b>Pudding xoài dâu tây thơm mát ngày hè</b><br>
          Hương vị thơm mát của pudding xoài dâu tây chắc chắn sẽ khiến mọi người thích thú. 1 Pudding xoài dâu tây thơm mát ngày hè<br><br>
          <img src="/hinhanh/sinhtodau.png" style="float: left;width: 150px;height: 100px;margin-right: 10px;">
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