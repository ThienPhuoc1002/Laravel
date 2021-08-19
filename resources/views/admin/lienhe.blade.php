@extends('hienthi')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="bi bi-envelope-fill"> Thư chưa đọc</i>
    </div>
    <div class="card-body">
        <table id="example" class="display" style="width:100%" border="1">
            <thead>
                <tr>
                    <th>Người gửi</th>
                    <th>Email</th>
                    <th>Thời gian gửi</th>
                    <th>Số điện thoại</th>
                    <th>Tiêu đề</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tk0s as $tk0)
                    <tr>
                        <td>{{ $tk0->name }}</td>
                        <td>{{ $tk0->email }}</td>
                        <td>{{ $tk0->created_at }}</td>
                        <td>{{ $tk0->phone }}</td>
                        <td>{{ $tk0->tieude }}</td>
                        <td><a href="/adminlienhe/{{ $tk0->id }}">Xem</a></td>
                    </tr>
                @endforeach     
            </tbody>
        </table>
    </div>
</div><br><br><br>
<div class="card mb-4">
    <div class="card-header">
        <i class="bi bi-envelope-open-fill"> Thư đã đọc</i>
    </div>
    <div class="card-body">
        <table id="example1" class="display" style="width:100%" border="1">
            <thead>
                <tr>
                    <th>Người gửi</th>
                    <th>Email</th>
                    <th>Thời gian gửi</th>
                    <th>Số điện thoại</th>
                    <th>Tiêu đề</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tk1s as $tk1)
                    <tr>
                        <td>{{ $tk1->name }}</td>
                        <td>{{ $tk1->email }}</td>
                        <td>{{ $tk1->created_at }}</td>
                        <td>{{ $tk1->phone }}</td>
                        <td>{{ $tk1->tieude }}</td>
                        <td><a href="/adminlienhe/{{ $tk1->id }}">Xem</a></td>
                    </tr>
                @endforeach     
            </tbody>
        </table>
    </div>
</div>
@endsection

