@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Admin
                            <small>Danh Sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                         @if(session('thongbao'))
<div class="alert alert-success">
    {{session('thongbao')}}
</div>
@endif
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admin as $ad)
                            <tr class="odd gradeX" align="center">
                                <td>{{$ad->id}}</td>
                                <td>{{$ad->user_name}}</td>
                                <td>{{$ad->email}}</td>
                                <td>{{$ad->address}}</td>
                                <td>{{$ad->phone}}</td>
                                <td>
                                    @if($ad->status==1)
                                    {{"Hoạt động"}}
                                    @else
                                    {{"Khóa"}}
                                    @endif
                                </td>
                                @if($ad->id==1)
                                    <td>{{"Không thể xóa tài khoản này"}}</td>
                                @else
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/ManagerAdmin/xoa/{{$ad->id}}"> Delete</a></td>
                               @endif
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/ManagerAdmin/sua/{{$ad->id}}">Edit</a></td>
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