@extends('admin.layout.index')
@section('content')
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
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
                                <th>Full name</th>
                                <th>Name</th>
                                <th>Số lần mua</th>
                                <th>Email</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $u)
                            <tr class="odd gradeX" align="center">
                                <td>{{$u->id}}</td>
                                <td>{{$u->full_name}}</td>
                                <td>{{$u->user_name}}</td>
                                <td>{{$u->lanmua}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->address}}</td>
                                <td>{{$u->phone}}</td>
                                <td>
                                    @if($u->status==1)
                                    {{"Hoạt động"}}
                                    @else
                                    {{"Khóa"}}
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/ManagerUser/xoa/{{$u->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/ManagerUser/sua/{{$u->id}}">Edit</a></td>
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