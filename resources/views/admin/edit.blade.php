@extends('hienthi')
@section('content')
    <div class="container">
        <form action="/loai/{{ $types->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="1">Tên loại:</label>
                <input type="text" class="form-control" id="" value="{{ $types->name }}" name="1" required>
                <div class="valid-feedback">Hợp lệ.</div>
                <div class="invalid-feedback">Không hợp lệ.</div>
            </div>
            <div class="form-group">
                <label for="2">Mô tả:</label>
                <input type="text" class="form-control" id="" name="2" value="{{ $types->description }}" required>
                <div class="valid-feedback">Hợp lệ.</div>
                <div class="invalid-feedback">Không hợp lệ.</div>
            </div>
            <div class="form-group">
                <input type="file" class="form-control-file border" name="3" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection