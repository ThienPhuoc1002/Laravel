@extends('hienthi')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
    </div>
    <div class="card-body">
        <table id="example" class="display" style="width:100%" border="1">
            <thead>
                <tr style="background-color: gray">
                    <th>Nội dung</th>
                    <th>Hình ảnh</th>
                    <th style="width: 50%">Chi tiết</th>
                    <th>Ngày đăng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $new)
                    <tr>                    
                        <td>{{ $new->noidung }}</td>
                        <td><img src="/hinhanh/{{ $new->hinhanh }}" style="width: 100px" alt=""></td>
                        <td>{{ $new->chitiet }}</td>
                        <td>{{ $new->ngay }}</td>
                        <td class="btn btn-dark align-middle" onclick="location.href='/edittintuc/{{ $new->id }}'">Sửa</td>
                    </tr>
                @endforeach                   
            </tbody>
        </table>
        @if($errors->any())
            <div class="col-sm-4 alert alert-success">
                {{$errors->first()}}
            </div>
        @endif  
    </div>
</div>
@endsection

