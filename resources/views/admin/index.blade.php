@extends('hienthi')
@section('content')
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
    </div>
    <div class="card-body">
        <h1 class="mt-4">Chào mừng đến với trang quản trị</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Hôm nay bạn thế nào...</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="md-6 float-start">
                            Tổng thu nhập
                            <br>{{ number_format($tien) }}
                        </div>
                        <div class="bi-currency-dollar float-end" style="font-size: 35px" ></div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <div class="md-6 float-start">
                            Khách hàng
                            <br>{{ number_format($khach) }}
                        </div>
                        <div class="bi-people-fill float-end" style="font-size: 35px" ></div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <div class="md-6 float-start">
                            Liên hệ
                            <br>{{ number_format($lienhe) }}
                        </div>
                        <div class="bi-chat float-end" style="font-size: 35px" ></div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/adminlienhe">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <div class="md-6 float-start">
                            Quản lý
                            <br>{{ number_format($quanly) }}
                        </div>
                        <div class="bi-person-square float-end" style="font-size: 35px" ></div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="/adminlienhe">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Biểu đồ doanh thu
                    </div>
                    <div class="card-body">
                        {!! $chart->container() !!}
                        {!! $chart->script() !!}
                                
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Thống kê
                    </div>
                    <div class="card-body">
                        <form action="/thongke">
                            <div class="form-group col-md-4">
                                <label class="control-label">Chọn thời gian</label>
                                <input type="date" class="form-control col-md-4" name="choose" required>
                            </div>
                            <br><button class="btn btn-dark" type="submit">Thống kê</button>
                        </form>
                        @if (\Session::has('success'))
                        <br>
                            <div class="alert alert-success">
                                Tổng tiền ngày là {!! \Session::get('success') !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Biểu đồ lượng sản phẩm đã bán
                    </div>
                    <div class="card-body">
                        {!! $chart2->container() !!}
                        {!! $chart2->script() !!}
                                
                    </div>
                </div>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Kết toán
                    </div>
                    <div class="card-body">
                        <form action="/kettoan">
                            <div class="form-group col-md-4">
                                <label class="control-label">Chọn thời gian</label>
                                <input type="date" class="form-control col-md-4" name="choose1" required>
                            </div>
                            <br><button class="btn btn-dark" type="submit">Kết toán</button>
                        </form>
                        @if (\Session::has('success1'))
                        <br>
                            <div class="alert alert-success">
                                Tổng tiền ngày là {!! \Session::get('success1') !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection