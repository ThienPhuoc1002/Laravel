@extends('hienthi')
@section('content')
    <div class="container">
        <form action="/suaphi/{{ $fee_ship->id }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="1">Thành phố:</label>
                <input type="text" class="form-control" id="" value="{{$fee_ship->city->name}}" disabled required>
            </div>
            <div class="form-group">
                <label for="1">Quận/Huyện:</label>
                <input type="text" class="form-control" id="" value="{{$fee_ship->province->name}}" disabled required>
            </div>
            <div class="form-group">
                <label for="1">Xã/Phường:</label>
                <input type="text" class="form-control" id="" value="{{$fee_ship->wards->name}}" disabled required>
            </div>
            <div class="form-group">
                <label for="1">Phí ship:</label>
                <input type="text" class="form-control" id="" name="phi" value="{{$fee_ship->phi}}" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
@endsection