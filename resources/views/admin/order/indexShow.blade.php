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
<!--                                <button type="button" class="btn btn-danger">Thêm hàng có trong kho</button>-->
                                
                                 <a href="{{ route('getOrderDetailStrore', ['id' => $orderId]) }}">Thêm hàng có trong kho</a>
<button type="button" class="btn btn-success">Thêm hàng không có trong kho</button>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên Sản phẩm</th>
                                                <th>Đơn giá</th>
                                                <th>Số lượng</th>
                                                <th>Tiền chưa thanh toán</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $STT=0;?>

                                        @foreach($order as $orders)
                                            <tr>
                                                <td>{{ $STT=$STT+1 }}</td>
                                                <td>{{ $orders->sanpham }}</td>
                                                <td>{{ $orders->dongia }}</td>
                                                <td>{{ $orders->soluong }}</td>
                                                <td>{{ $orders->tienchuathanhtoan }}</td>
                                                <td>{{ $orders->thanhtien }}</td>

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
