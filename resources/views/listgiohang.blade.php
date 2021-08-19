@if (Session::has("Cart") != null)
@foreach (Session::get("Cart")->products as $item)
<tr>
    <td><img src="hinhanh/{{ $item['ttin']->image }}" style="height: auto;width:80px;"alt=""></td>
    <td>Doe</td>
    <td>
      <div class="input-group mb-3" style="width: 200px">
          <input type="number" class="form-control" name=""  min="1" value="{{ $item['sluong'] }}" aria-label="Recipient's username" aria-describedby="button-addon2">
          <a class="btn btn-outline-secondary bi-arrow-repeat" type="button" id="button-addon2" href="/giohang"></a>
        </div>
      </td>
    <td>{{ $item['ttin']->promotion_price }}</td>
    <td>{{ $item['gia'] }}</td>
    <td><i class="btn btn-danger bi-trash-fill" style="font-size: 20px; color:black"></i></td>
</tr>
<tr>
    <td colspan="4" align="right">Tổng cộng:</td>
    <td>{{ number_format(25000)}}</td>
    <td></td>
</tr>
@endforeach