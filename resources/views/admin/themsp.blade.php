@extends('hienthi')
@section('content')
    <div class="container">
        <form action="/chitiet" method="POST">
            @csrf
            <div class="form-group">
                <label for="1">Tên sản phẩm:</label>
                <input type="text" class="form-control" id="" name="1" required>
                <div class="valid-feedback">Hợp lệ.</div>
                <div class="invalid-feedback">Không hợp lệ.</div>
            </div>
            <div class="form-group">
                <label for="2">Loại Sản Phẩm</label>
                <select name="2" class="form-control" id="2">
                    @foreach($types as $item)
                    <option  value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="3">Mô tả:</label>
                <input type="text" class="form-control" id="" name="3" required>
                <div class="valid-feedback">Hợp lệ.</div>
                <div class="invalid-feedback">Không hợp lệ.</div>
            </div>
            <div class="form-group">
                <label for="4">Giá đã giảm:</label>
                <input type="num" class="form-control" id="" name="4" required>
                <div class="valid-feedback">Hợp lệ.</div>
                <div class="invalid-feedback">Không hợp lệ.</div>
            </div>
            <div class="form-group">
                <label for="5" class="form-label">Giá gốc:</label>
                <input type="number" class="form-control" id="5" name="5" required>
                <div class="valid-feedback">Hợp lệ.</div>
                <div class="invalid-feedback">Không hợp lệ.</div>
            </div>
            <div class="form-group">
                <label for="6">Hình ảnh:</label><br>
                <input type="file" class="form-control-file border" name="6">
            </div>
            <div class="form-group">
                <label for="7">Đơn vị:</label>
                <input type="text" class="form-control" id="" name="7" required>
                <div class="valid-feedback">Hợp lệ.</div>
                <div class="invalid-feedback">Không hợp lệ.</div>
            </div>
            <div class="form-group">
                <label for="8">Mới || Cũ</label>
                <select name="8" class="form-control" id="8">
                    <option value="1">Mới</option>
                    <option value="2">Cũ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="9">Số lượng:</label>
                <input type="number" class="form-control" id="" name="9" min="0" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
@endsection