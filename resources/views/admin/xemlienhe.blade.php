@extends('hienthi')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div class="bi bi-envelope-fill justify-content-start"> {{ $tk0->name }}</div>
            <div>{{ $tk0->tieude }}</div>
            <div>{{ $tk0->created_at }}</div>
        </div>
    </div>
    <div class="card-body">
        {{ $tk0->noidung }}
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis quis saepe eaque omnis fuga cumque natus consectetur provident eligendi, similique incidunt reprehenderit perferendis! At eveniet odit doloribus, consequuntur fugiat architecto.
    </div>
    <div class="card-footer">
        <button class="badge bg-primary md-4" onclick="location.href='/adminlienhe'">Quay lại</button>
    </div>
</div>
@endsection

