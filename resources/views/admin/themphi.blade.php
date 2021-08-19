@extends('hienthi')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Thêm phí vận chuyển
    </div>
    <div class="card-body">
        <form action="" method="POST">
            @csrf 
            <div class="form-group">
                <label for="exampleInputPassword1">Chọn thành phố</label>
                    <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                
                        <option value="" disabled selected>--Chọn tỉnh thành phố--</option>
                        
                    @foreach($city as $key => $ci)
                        <option value="{{$ci->matp}}">{{$ci->name}}</option>
                    @endforeach
                        
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Chọn quận huyện</label>
                    <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                        <option value="" disabled selected>--Chọn quận huyện--</option>
                </select>
            </div>
                <div class="form-group">
                <label for="exampleInputPassword1">Chọn xã phường</label>
                    <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                        <option value="" disabled selected>--Chọn xã phường--</option>   
                </select>
            </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Phí vận chuyển</label>
                <input type="text" name="fee_ship" class="form-control fee_ship" id="exampleInputEmail1" placeholder="Tên danh mục">
            </div>
            
            <button type="button" name="add_delivery" class="btn btn-info add_delivery">Thêm phí vận chuyển</button>
            </form>     
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif     
    </div>
</div>
<div class="card mb-4">
    <div class="card-header">
        Bảng phí ship
    </div>
    <div class="card-body">
        <div id="load_delivery">
            <div class="table-responsive">  
                <table class="table table-bordered">
                    <thread> 
                        <tr>
                            <th>Tên thành phố</th>
                            <th>Tên quận huyện</th> 
                            <th>Tên xã phường</th>
                            <th>Phí ship</th>
                            <th></th>
                            <th></th>
                        </tr>  
                    </thread>
                    <tbody>
                        @foreach ($feeship as $fee )
                            <tr>
                                <td>{{ $fee->city->name }}</td>
                                <td>{{ $fee->province->name }}</td>
                                <td>{{ $fee->wards->name }}</td>
                                <td>{{ number_format($fee->phi) }}</td>
                                <td><button class="btn btn-success" onclick="location.href='/editphi/{{ $fee->id }}'">Sửa</button></td>
                                <td><button class="btn btn-danger" onclick="location.href='/xoaphi/{{ $fee->id }}'">Xóa</button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>             
        </div>          
    </div>
</div>
@endsection
