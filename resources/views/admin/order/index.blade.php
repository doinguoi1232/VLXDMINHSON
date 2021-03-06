@extends('admin.master')
@section('content')
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên khách hàng</th>
                                                <th>Tổng tiền</th>
                                                <th>Tiền đã thanh toán</th>
                                                <th>Tiền chưa thanh toán</th>
                                                <th>Lợi nhuận</th>
                                                <th>Ngày mua hàng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $STT=0;?>

                                        @foreach($order as $orders)
                                            <tr>
                                                <td>{{ $STT=$STT+1 }}</td>
                                                <td>
                                                    <a href="{{ route('OrederShow', ['id' => $orders->id]) }}">{{ $orders->tenkhachhang }}</a>
                                                </td>
                                                <td>{{ $orders->tongtien }}</td>
                                                <td>{{ $orders->tiendathanhtoan }}</td>
                                                <td>{{ $orders->tienchuathanhtoan }}</td>
                                                <td>{{ $orders->loinhuan }}</td>
                                                <td>{{ $orders->created_at }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                  
                      
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
        </div>
@endsection
