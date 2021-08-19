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
                    <th>Giá gốc</th>
                    <th>Giá đã giảm</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $sp)
                        <tr>                    
                            <td><a href="/chitiet/{{ $sp['id'] }}">{{ $sp['name'] }}</a></td>
                            <td>{{ $sp['description'] }}</td>    
                            <td><img src="hinhanh/{{ $sp['image'] }}" style="width:100px; height: 80px;" alt=""></td>
                            <td>{{ number_format($sp['unit_price']) }}</td>
                            <td>{{ number_format($sp['promotion_price']) }}</td>
                            <td><a class="btn btn-success" href="chitiet/{{ $sp->id }}/edit">Sửa</a></td>
                            <td>
                                <form action="chitiet/{{ $sp->id }}" method="POST">
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
        