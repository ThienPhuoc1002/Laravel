@extends('hienthi')
@section('content')
    <div class="container">
        <form action="/suatintuc/{{ $new->id }}" method="POST">
            @csrf
            @method('GET')
            <div class="form-group">
                <label for="1">Nội dung:</label>
                <input type="text" class="form-control" id="" value="{{ $new->noidung }}" placeholder="Enter loại" name="noidung" required>
            </div>
            <div class="form-group">
                <label for="2">Chi tiết:</label>
                <input type="text" class="form-control" id="" value="{{ $new->chitiet }}" placeholder="Enter loại" name="chitiet" required>
            </div>
            <div class="form-group">
                <label for="2">Hình ảnh:</label><br>
                <input type="file" class="form-control-file border" name="hinhanh" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <br>
    </div>
@endsection