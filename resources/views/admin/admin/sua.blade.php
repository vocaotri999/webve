@extends('admin.layout.index')
@section('content')
      <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Admin
                            <small>{{$admin->user_name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                         @if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}}<br>
        @endforeach
    </div>
@endif
@if(session('thongbao'))
<div class="alert alert-success">
    {{session('thongbao')}}
</div>
@endif
                        <form action="admin/ManagerAdmin/sua/{{$admin->id}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="name" value="{{$admin->user_name}}"placeholder="Nhập tên" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email"
                                value="{{$admin->email}}" placeholder="Nhập email" readonly="" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="changePassword" id="changePassword">
                                <label>Đổi mật khẩu</label>

                                <input type="password" disabled="" class="form-control password" name="password" placeholder="Nhập mật khẩu" maxlength="32"/>
                            </div>
                            <div class="form-group">
                                <label>Nhập lại Mật khẩu</label>
                                <input type="password" disabled=""  class="form-control password" name="passwordAgain" placeholder="Nhập lại mật khẩu" maxlength="32"/>
                            </div>
                            @if($admin->id==1)
                                <div class="form-group">
                                    <label>Không thể khóa tài khoản này</label>
                                </div>
                                    @else
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <label class="radio-inline">
                                    <input name="status" value="0"
                                    @if($admin->status== 0)
                                    {{"checked"}}
                                    @endif
                                     type="radio">Khóa tài khoản
                                </label>
                                <label class="radio-inline">
                                    <input name="status" value="1"
                                    @if($admin->status== 1)
                                    {{"checked"}}
                                    @endif  type="radio">Hoạt động
                                </label>
                            </div>
                            @endif
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input class="form-control" name="address" value="{{$admin->address}}"placeholder="Nhập địa chỉ" />
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input class="form-control" name="phone" value="{{$admin->phone}}"placeholder="Nhập số điện thoại" />
                                </div>

                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#changePassword").change(function(){
                if($(this).is(":checked")){
                    $(".password").removeAttr('disabled');
                }else{
                    $(".password").attr('disabled','');
                }
            });
        });
    </script>
@endsection