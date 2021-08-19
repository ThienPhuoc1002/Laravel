@extends('hienthi')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Thông tin
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-xl-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Ảnh đại diện
                    </div>
                    <div class="card-body text-center">
                        @if(session()->get('admintk')->hinhanh != "")
                        <img src="/hinhanh/{{ session()->get('admintk')->hinhanh }}" height="100px" width="100px" alt=""><br><br>
                        @else
                            <br><br>
                        @endif
                        <form action="/addimg" method="POST">
                            @csrf
                            @method('GET')
                            <div class="form-group">
                                <label for="6"></label><br>
                                <input type="file" class="form-control-file border" name="hinhanh">
                            </div>
                            <br><button class="btn btn-dark">Lưu ảnh đại diện</button>
                        </form>
                            
                            
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Thông tin
                    </div>
                    <div class="card-body">
                        <form action="/addtt" method="POST">
                            @csrf
                            @method('GET')
                            <label for="">Tên</label>
                            <input class="form-control" name="name" value="{{ session()->get('admintk')->full_name }}" type="text">
                            <label for="">Email</label>
                            <input class="form-control" name="email" value="{{ session()->get('admintk')->email }}" type="text">
                            <label for="">Số điện thoại</label>
                            <input class="form-control" name="phone" value="{{ session()->get('admintk')->phone }}" type="text">
                            <label for="">Địa chỉ</label>
                            <input class="form-control" name="address" value="{{ session()->get('admintk')->address }}" type="text">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Tỉnh/Thành</label>
                                    <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                    @foreach($city as $key => $ci)
                                        @if (session()->get('admintk')->matp == $ci->matp)
                                            <option value="{{ $ci->matp }}" selected>{{ $ci->name }}</option>
                                        @else
                                            <option value="{{$ci->matp}}">{{$ci->name}}</option>
                                        @endif
                                    @endforeach
                                        
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Quận/Huyện</label>
                                    <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                        @foreach($province as $pro)
                                            @if (session()->get('admintk')->maqh == $pro->maqh)
                                                <option value="{{ $pro->maqh }}" selected>{{ $pro->name }}</option>
                                            @else
                                                <option value="{{ $pro->maqh }}">{{ $pro->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Xã/Phường</label>
                                    <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                        @foreach($wards as $wa)
                                            @if (session()->get('admintk')->xaid == $wa->xaid)
                                                <option value="{{ $wa->xaid }}" selected>{{ $wa->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>
                            <br><button class="btn btn-dark">Lưu thay đổi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection