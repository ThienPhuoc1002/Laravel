@extends('hienthi')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Thay đổi mật khẩu
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header bg-dark">
                        Profile Picture
                    </div>
                    <div class="card-body text-start">
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
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    {{$errors->first()}}
                                </div>
                            @endif 
                            @if (\Session::has('success'))
                                <div class="alert alert-success">
                                    {!! \Session::get('success') !!}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card mb-4">
                    <div class="card-header bg-dark">
                        Profile Picture
                    </div>
                    <div class="card-body text-start">
                        Viết gì đó
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection