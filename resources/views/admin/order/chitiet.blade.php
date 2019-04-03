@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Chi tiết đơn hàng
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>Mã sân bay đi</th>
                                <th>Tên sân bay đi</th>
                                <th>Tên đầy đủ</th>
                                <th>Mã sân bay đến</th>
                                <th>Tên sân bay đến</th>
                                <th>Tên đầy dủ</th>
                                <th>Ngày khởi hành</th>
                                <th>Giờ khởi hành</th>
                                <th>Ngày hạ cánh</th>
                                <th>Giờ hạ cánh</th>
                                <th>ID vé</th>
                                <th>Giá</th>
                                @if($order->ticket_type=='roundway')
                                <th>Lượt về</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="odd gradeX" align="center">
                                <td>{{$order->dep_code}}</td>
                                <td>{{$order->dep_name}}</td>
                                <td>{{$order->dep_airport}}</td>
                                <td>{{$order->arv_code}}</td>
                                <td>{{$order->arv_name}}</td>
                                <td>{{$order->arv_airport}}</td>
                                <td>{{$order->dep_date}}</td>
                                <td>{{$order->dep_time}}</td>
                                <td>{{$order->arv_date}}</td>
                                <td>{{$order->arv_time}}</td>
                                <td>{{$order->flight_no}}</td>
                                <td>{{$order->base_price}}</td>
                                @if($order->ticket_type=='roundway')
                                    <td class="center"><i class="fas fa-info"></i><a href="admin/ManagerOrder/chitietluotve/{{$order->id}}"> Lượt về</a></td>
                                @endif


                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection