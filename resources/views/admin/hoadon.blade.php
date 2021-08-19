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
                    <th>Khách hàng mua</th>
                    <th>Thành tiền</th>
                    <th>Thời gian đặt</th>
                    <th style="width: 50%">Ghi chú</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bills as $sp)
                        <tr>             
                            @foreach ($users as $kh)
                                @if ($kh->id == $sp->id_user)
                                    <td>{{ $kh->full_name }}</td> 
                                @endif
                            @endforeach
                            
                            <td>{{ number_format($sp->total) }} Đ</td>   
                            <td>{{ $sp->created_at }}</td>
                            <td>{{ $sp->note }}</td>
                            <td><a class="btn btn-success" href="/xemhoadon/{{ $sp->id }}">Xem</a></td>
                        </tr>
                @endforeach                   
            </tbody>
        </table>
    </div>
</div>
@endsection

