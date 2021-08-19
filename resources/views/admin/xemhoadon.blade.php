@extends('hienthi')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Thông tin giao hàng
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                Người đặt :<br>
                Thời gian đặt : <br>
                Địa chỉ: 
            </div>
            <div class="col-md-10">
                {{ $bill->user->full_name }} <br>
                {{ $bill->date_order }} <br>
                {{ $bill->user->address }}, {{ $bill->user->wards->name }}, {{ $bill->user->province->name }}, {{ $bill->user->city->name }}
            </div>
        </div>
        <table class="table" style="width:100%" border="1">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bill_details as $bd)
                    <tr>  
                        <td>{{ $bd->product->name }}</td>
                        <td>{{ $bd->quanty}}</td>
                        <td>{{ number_format($bd->unit_price) }}</td>
                    </tr>
                @endforeach 
                    <tr>
                        <td colspan="2">Tổng tiền :</td>
                        <td>{{ number_format($bill->total) }}</td>
                    </tr>    
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <button class="badge bg-primary md-4" onclick="location.href='/hoadon'">Quay lại</button>
    </div>
</div>
@endsection

