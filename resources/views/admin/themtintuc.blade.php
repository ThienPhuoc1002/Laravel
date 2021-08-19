@extends('hienthi')
@section('content')
    <div class="container">
        <form action="/addtintuc" method="POST">
            @csrf
            @method('GET')
            <div class="form-group">
                <label for="1">Nội dung:</label>
                <input type="text" class="form-control" id="" placeholder="Enter loại" name="noidung" required>
            </div>
            <div class="form-group">
                <label for="2">Chi tiết:</label>
                <input type="text" class="form-control" id="" placeholder="Enter loại" name="chitiet" required>
            </div>
            <div class="form-group">
                <label for="2">Hình ảnh:</label><br>
                <input type="file" class="form-control-file border" name="hinhanh" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        <br>
        @if($errors->any())
            <div class="col-sm-4 alert alert-success">
                {{$errors->first()}}
            </div>
        @endif  
    </div>
@endsection
