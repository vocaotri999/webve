@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    @if(session('thongbao'))
                        <div class="alert alert-danger">
                            {{session('thongbao')}}
                        </div>
                @endif
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Loại vé</th>
                                <th>Người lớn/Trẻ em/Trẻ sơ sinh</th>
                                <th>ID người mua</th>
                                <th>Thông tin hành lý</th>
                                <th>Hãng bay</th>
                                <th>Số lượng vé đặt</th>
                                <th>Tổng giá</th>
                                <th>Thời gian đặt</th>
                                <th>Chi tiết</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($order as $od)
                            <tr class="odd gradeX" align="center">
                                <td>{{$od->id}}</td>
                                <td>{{$od->ticket_type}}</td>
                                <td>{{$od->adt."/".$od->chd."/".$od->inf}}</td>
                                <td>{{$od->id_user}}</td>
                                <td class="center"><i class="fas fa-suitcase-rolling"></i><a href="admin/ManagerOrder/hanhly/{{$od->id}}"> Xem</a></td>
                                <td>{{$od->flight_name}}</td>
                                <td>{{$od->quantity_ticket}}</td>
                                <td>{{$od->total_price}}</td>
                                <td>{{$od->created_at}}</td>
                                <td class="center"><i class="fas fa-info"></i><a href="admin/ManagerOrder/chitiet/{{$od->id}}"> Detail</a></td>
                                <td class="center"><i class="fa fa-edit"></i><a href="admin/ManagerOrder/sua/{{$od->id}}"> Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection