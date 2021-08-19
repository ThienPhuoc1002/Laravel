@extends('hienthi')
@section('content')
    <div class="container">
        <form action="/chitiet/{{ $products->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="1">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="" name="1" value="{{$products->name}}" required>
                <div class="valid-feedback">Hợp lệ.</div>
                <div class="invalid-feedback">Không hợp lệ.</div>
            </div>
            <div class="form-group">
                <label for="2">Loại Sản Phẩm</label>
                <select name="2" class="form-control" id="2">
                    @foreach($types as $item)
                    <option  value="{{$item->id}}"
                        @if ($products->type_product_id == $item->id)
                            selected
                        @endif>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="3">Mô tả:</label>
                <input type="text" class="form-control" id="" name="3" value="{{$products->description}}" required>
                <div class="valid-feedback">Hợp lệ.</div>
                <div class="invalid-feedback">Không hợp lệ.</div>
            </div>
            <div class="form-group">
                <label for="4">Giá gốc:</label>
                <input type="num" class="form-control" id="" name="4" value="{{$products->unit_price}}" required>
                <div class="valid-feedback">Hợp lệ.</div>
                <div class="invalid-feedback">Không hợp lệ.</div>
            </div>
            <div class="form-group">
                <label for="5" class="form-label">Giá đã giảm:</label>
                <input type="number" class="form-control" id="5" name="5" value="{{$products->promotion_price}}" required>
                <div class="valid-feedback">Hợp lệ.</div>
                <div class="invalid-feedback">Không hợp lệ.</div>
            </div>
            <div class="form-group">
                <label for="6">Hình ảnh:</label><br>
                <input type="file" class="form-control-file border" name="6" required>
            </div>
            <div class="form-group">
                <label for="7">Đơn vị:</label>
                <input type="text" class="form-control" id="" name="7" value="{{$products->unit}}" required>
                <div class="valid-feedback">Hợp lệ.</div>
                <div class="invalid-feedback">Không hợp lệ.</div>
            </div>
            <div class="form-group">
                <label for="8">Mới || Cũ</label>
                <select name="8" class="form-control" id="8">
                    <option value="1"
                    @if (1==$products->id)
                        selected
                    @endif>Mới</option>
                    <option value="2"
                    @if (2==$products->id)
                        selected
                    @endif>Cũ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="9">Số lượng:</label>
                <input type="number" class="form-control" id="" name="9" value="{{$products->quanty}}" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
@endsection