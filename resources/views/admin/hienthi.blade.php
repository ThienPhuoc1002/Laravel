@extends('hienthi')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
    </div>
    <div class="card-body">
        <table id="example" class="display" style="width:100%" border="1">
            <thead>
                <tr>
                    <th>Tên</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Ngày tạo</th>
                    <th>Ngày sửa</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($types as $sp)
                        <tr>                    
                            <td><a href="/loai/{{ $sp['id'] }}">{{ $sp['name'] }}</a></td>
                            <td>{{ $sp['description'] }}</td>    
                            <td><img src="hinhanh/{{ $sp['image'] }}" style="weight:40px; height: 40px;" alt=""></td>
                            <td>{{ $sp['created_at'] }}</td>
                            <td>{{ $sp['updated_at'] }}</td>
                            <td><a class="btn btn-success" href="loai/{{ $sp->id }}/edit">Sửa</a></td>
                            <td>
                                <form action="loai/{{ $sp->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach                   
            </tbody>
        </table>
    </div>
</div>
@endsection

