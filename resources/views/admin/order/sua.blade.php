@extends('admin.layout.index')
@section('content')
      <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Order
                            <small>Chỉnh sửa</small>
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
<div class="alert alert-danger">
    {{session('thongbao')}}
</div>
@endif
                            <form action="admin/ManagerOrder/sua/{{$order->id}}" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="form-group">
                                    <label>Chọn loại chuyến đi</label>

                                    <label class="radio-inline">
                                        <input id="changeOneWay" name="way" value="oneway"
                                               @if($order->ticket_type!='roundway')
                                               {{'checked=""'}}
                                               @endif

                                               type="radio">OneWay
                                    </label>
                                    <label class="radio-inline">
                                        <input id="changeRoundWay" name="way"
                                               @if($order->ticket_type=='roundway')
                                               {{'checked=""'}}
                                               @endif
                                               value="roundway" type="radio">RoundWay
                                    </label>

                                </div>
                                <h3 class="luot">Hãy chọn lại loại đường bay phía trên<small> để xát nhận sửa</small></h3>
                                <hr>
                                <div class="form-group">
                                    <label>Sân bay bắt đầu</label>
                                    <select name="sanbaybd" class="form-control" required>

                                        <option disabled selected value="">{{$order->dep_airport}}</option>
                                        <option value="VCA">Sân bay Quốc tế Cần Thơ</option>
                                        <option value="DAD">Sân bay Quốc tế Đà Nẵng</option>
                                        <option value="HPH">Sân bay Quốc tế Cát Bi – Hải Phòng</option>
                                        <option value="HAN">Sân bay Quốc tế Nội Bài – Hà Nội</option>
                                        <option value="SGN">Sân bay Quốc tế Tân Sơn Nhất</option>
                                        <option value="CXR">Sân bay Quốc tế Cam Ranhq</option>
                                        <option value="PQC">Sân bay Quốc tế Phú Quốc</option>
                                        <option value="VII">Sân bay Quốc tế Vinh – Nghệ An</option>
                                        <option value="HUI">Sân bay Quốc tế Phú Bài – Huế</option>
                                        <option value="VCS">Sân bay Côn Đảo</option>
                                        <option value="SQH">Sân bay Nà Sản</option>
                                        <option value="UIH">Sân bay Phù Cát – Bình Định</option>
                                        <option value="CAH">Sân bay Cà Mau</option>
                                        <option value="BMV">Sân bay Buôn Ma Thuột</option>
                                        <option value="DIN">Sân bay Điện Biên Phủ</option>
                                        <option value="PXU">Sân bay Pleiku – Gia Lai</option>
                                        <option value="VKG">Sân bay Rạch Giá – Kiên Giang</option>
                                        <option value="DLI">Sân bay Liên Khương – Đà Lạt</option>
                                        <option value="TBB">Sân bay Tuy Hòa – Phú Yên</option>
                                        <option value="VDH">Sân bay Đồng Hới – Quảng Bình</option>
                                        <option value="VCL">Sân bay Chu Lai – Quảng Nam</option>
                                        <option value="THD">Sân bay Thọ Xuân – Thanh Hóa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sân bay đến</label>
                                    <select name="sanbayden" class="form-control" required>

                                        <option disabled selected value="">{{$order->arv_airport}}</option>
                                        <option value="VCA">Sân bay Quốc tế Cần Thơ</option>
                                        <option value="DAD">Sân bay Quốc tế Đà Nẵng</option>
                                        <option value="HPH">Sân bay Quốc tế Cát Bi – Hải Phòng</option>
                                        <option value="HAN">Sân bay Quốc tế Nội Bài – Hà Nội</option>
                                        <option value="SGN">Sân bay Quốc tế Tân Sơn Nhất</option>
                                        <option value="CXR">Sân bay Quốc tế Cam Ranhq</option>
                                        <option value="PQC">Sân bay Quốc tế Phú Quốc</option>
                                        <option value="VII">Sân bay Quốc tế Vinh – Nghệ An</option>
                                        <option value="HUI">Sân bay Quốc tế Phú Bài – Huế</option>
                                        <option value="VCS">Sân bay Côn Đảo</option>
                                        <option value="SQH">Sân bay Nà Sản</option>
                                        <option value="UIH">Sân bay Phù Cát – Bình Định</option>
                                        <option value="CAH">Sân bay Cà Mau</option>
                                        <option value="BMV">Sân bay Buôn Ma Thuột</option>
                                        <option value="DIN">Sân bay Điện Biên Phủ</option>
                                        <option value="PXU">Sân bay Pleiku – Gia Lai</option>
                                        <option value="VKG">Sân bay Rạch Giá – Kiên Giang</option>
                                        <option value="DLI">Sân bay Liên Khương – Đà Lạt</option>
                                        <option value="TBB">Sân bay Tuy Hòa – Phú Yên</option>
                                        <option value="VDH">Sân bay Đồng Hới – Quảng Bình</option>
                                        <option value="VCL">Sân bay Chu Lai – Quảng Nam</option>
                                        <option value="THD">Sân bay Thọ Xuân – Thanh Hóa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Chọn thời điểm đi</label>
                                    <input name="thoidiemdi" class="form-control" value="{{$order->dep_date." ".$order->dep_time}}" id="datetimepicker" type="text" placeholder="Nhập ngày giờ">
                                </div>
                                <div class="form-group">
                                    <label>Chọn thời điểm đến</label>
                                    <input name="thoidiemden" class="form-control" value="{{$order->arv_date." ".$order->arv_time}}" id="datetimepicker2" type="text" placeholder="Nhập ngày giờ">
                                </div>
                                <div class="form-group">
                                    <label>Giá</label>
                                    <input name="gia" type="number" value="{{$order->base_price}}" class="form-control price"  placeholder="32" />
                                </div>
                                <div class="form-group">
                                    <label>Mã vé</label>
                                    <input name="mave" class="form-control" value="{{$order->flight_no}}"  placeholder="VJ505" />
                                </div>
                                <div class="luotve" hidden>
                                <h2>Lượt về</h2>
                                <hr>

                                <div class="form-group">
                                    <label>Sân bay bắt đầu(lượt về)</label>
                                    <select name="sanbaybdve" class="form-control luotve bo"  required>

                                        <option disabled selected value="">{{$order->dep_airport_ret}}</option>
                                        <option value="VCA">Sân bay Quốc tế Cần Thơ</option>
                                        <option value="DAD">Sân bay Quốc tế Đà Nẵng</option>
                                        <option value="HPH">Sân bay Quốc tế Cát Bi – Hải Phòng</option>
                                        <option value="HAN">Sân bay Quốc tế Nội Bài – Hà Nội</option>
                                        <option value="SGN">Sân bay Quốc tế Tân Sơn Nhất</option>
                                        <option value="CXR">Sân bay Quốc tế Cam Ranhq</option>
                                        <option value="PQC">Sân bay Quốc tế Phú Quốc</option>
                                        <option value="VII">Sân bay Quốc tế Vinh – Nghệ An</option>
                                        <option value="HUI">Sân bay Quốc tế Phú Bài – Huế</option>
                                        <option value="VCS">Sân bay Côn Đảo</option>
                                        <option value="SQH">Sân bay Nà Sản</option>
                                        <option value="UIH">Sân bay Phù Cát – Bình Định</option>
                                        <option value="CAH">Sân bay Cà Mau</option>
                                        <option value="BMV">Sân bay Buôn Ma Thuột</option>
                                        <option value="DIN">Sân bay Điện Biên Phủ</option>
                                        <option value="PXU">Sân bay Pleiku – Gia Lai</option>
                                        <option value="VKG">Sân bay Rạch Giá – Kiên Giang</option>
                                        <option value="DLI">Sân bay Liên Khương – Đà Lạt</option>
                                        <option value="TBB">Sân bay Tuy Hòa – Phú Yên</option>
                                        <option value="VDH">Sân bay Đồng Hới – Quảng Bình</option>
                                        <option value="VCL">Sân bay Chu Lai – Quảng Nam</option>
                                        <option value="THD">Sân bay Thọ Xuân – Thanh Hóa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Sân bay đến lượt về</label>
                                    <select name="sanbaydenve" class="form-control luotve bo"  required>

                                        <option disabled selected value="">{{$order->arv_airport_ret}}</option>
                                        <option value="VCA">Sân bay Quốc tế Cần Thơ</option>
                                        <option value="DAD">Sân bay Quốc tế Đà Nẵng</option>
                                        <option value="HPH">Sân bay Quốc tế Cát Bi – Hải Phòng</option>
                                        <option value="HAN">Sân bay Quốc tế Nội Bài – Hà Nội</option>
                                        <option value="SGN">Sân bay Quốc tế Tân Sơn Nhất</option>
                                        <option value="CXR">Sân bay Quốc tế Cam Ranhq</option>
                                        <option value="PQC">Sân bay Quốc tế Phú Quốc</option>
                                        <option value="VII">Sân bay Quốc tế Vinh – Nghệ An</option>
                                        <option value="HUI">Sân bay Quốc tế Phú Bài – Huế</option>
                                        <option value="VCS">Sân bay Côn Đảo</option>
                                        <option value="SQH">Sân bay Nà Sản</option>
                                        <option value="UIH">Sân bay Phù Cát – Bình Định</option>
                                        <option value="CAH">Sân bay Cà Mau</option>
                                        <option value="BMV">Sân bay Buôn Ma Thuột</option>
                                        <option value="DIN">Sân bay Điện Biên Phủ</option>
                                        <option value="PXU">Sân bay Pleiku – Gia Lai</option>
                                        <option value="VKG">Sân bay Rạch Giá – Kiên Giang</option>
                                        <option value="DLI">Sân bay Liên Khương – Đà Lạt</option>
                                        <option value="TBB">Sân bay Tuy Hòa – Phú Yên</option>
                                        <option value="VDH">Sân bay Đồng Hới – Quảng Bình</option>
                                        <option value="VCL">Sân bay Chu Lai – Quảng Nam</option>
                                        <option value="THD">Sân bay Thọ Xuân – Thanh Hóa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Chọn thời điểm đi(lượt về)</label>
                                    <input name="thoidiemdive" class="form-control luotve" value="{{$order->dep_date_ret." ".$order->dep_time_ret}}" id="datetimepicker4" type="text" placeholder="Nhập thời gian" >
                                </div>
                                <div class="form-group">
                                    <label>Chọn thời điểm đến(lượt về)</label>
                                    <input name="thoidiemdenve" class="form-control luotve" value="{{$order->arv_date_ret." ".$order->arv_time_ret}}" id="datetimepicker5" type="text" placeholder="Nhập thời gian">
                                </div>
                                <div class="form-group">
                                    <label>Giá(lượt về)</label>
                                    <input name="giave" type="number" value="{{$order->base_price_ret}}" class="form-control luotve price so"  placeholder="32" />
                                </div>
                                <div class="form-group">
                                    <label>Mã vé(lượt về)</label>
                                    <input name="maveve" class="form-control luotve" value="{{$order->flight_no_ret}}"  placeholder="VJ505" />
                                </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label>Người lớn</label>
                                    <input type="number" value="{{$order->adt}}" class="form-control" name="nguoilon" placeholder="Nhập số lượng" />
                                </div>
                                <div class="form-group">
                                    <label>Trẻ em</label>
                                    <input type="number" value="{{$order->chd}}" class="form-control" name="trem" placeholder="Nhập số lượng" />
                                </div>
                                <div class="form-group">
                                    <label>Trẻ sơ sinh</label>
                                    <input type="number" value="{{$order->inf}}" class="form-control" name="sosinh" placeholder="Nhập số lượng" />
                                </div>
                                <div class="form-group">
                                    <label>Chọn người dùng</label>
                                    <select name="iduser" class="form-control" required>
                                        <option value="">Chọn người dùng</option>
                                        @foreach($nguoidung as $nd)
                                            <option
                                                    @if($nd->id==$order->id_user)
                                                        {{"selected"}}
                                                            @endif
                                                    value="{{$nd->id}}">{{$nd->full_name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <h3>Thông tin hành lý</h3>
                                <hr>
                                <?php

                                $a=str_replace("{\"",'',$order->passenger_info);
                                $a=str_replace("\"}",'',$a);
                                $a=str_replace("\"",'',$a);
                                $arr= explode(',', $a);
                                $arrnhan=array();
                                foreach ($arr as $value){
                                     $arrnhan[]=explode(':',$value);
                                }
                                ?>
                                {{--@foreach($order->passenger_info as $ifo)--}}
                                    {{--{{$ifo[HanhLy]}}--}}
                                    {{--@endforeach--}}
                                <div class="form-group">
                                    <label>Giới tình</label>
                                    <select name="gioitinh" class="form-control" required>
                                        <option value="">Chọn Giới tính</option>

                                            <option
                                                    @if($arrnhan[0][1]=='Nam')
                                                            {{"selected"}}
                                                            @endif
                                                    value="Nam">Nam</option>
                                        <option
                                                @if($arrnhan[0][1]=='Nu')
                                                {{"selected"}}
                                                @endif
                                                value="Nu">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Chọn ngày tháng năm sinh</label>
                                    <input class="form-control" name="namsinh" value="{{$arrnhan[3][1]}}" id="datetimepicker3" type="text" >
                                </div>
                                <div class="form-group">
                                    <label>Loạt hành khách</label>
                                    <input class="form-control" name="loaihanhkhac" value="{{$arrnhan[1][1]}}" type="text" placeholder="Nhập loại hành khách vd người lớn">
                                </div>
                                <div class="form-group">
                                    <label>Nhập tên người mua</label>
                                    <input class="form-control" name="tenmua" value="{{$arrnhan[2][1]}}"  type="text" placeholder="Nhập tên">
                                </div>
                                <div class="form-group">
                                    <label>Cân nặng</label>
                                    <input class="form-control" name="hanhly" value="{{$arrnhan[4][1]}}"  type="text" placeholder="Nhập số lượng">
                                </div>
                                <h3>Tổng quan</h3>
                                <hr>
                                <div class="form-group">
                                    <label>Chọn hãng bay</label>
                                    <select name="hangbay" class="form-control" required>
                                        <option disabled selected value="">{{$order->flight_name}}</option>
                                        <option value="Vietnam">Vietnam Airline</option>
                                        <option value="VietJe">VietJet Air</option>
                                        <option value="Jetstar">Jetstar Pacific Airlines</option>
                                        <option value="Bamboo">Bamboo Airline</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Số lượng vé</label>
                                    <input type="number" value="{{$order->quantity_ticket}}" name="sove" class="form-control"  type="text" placeholder="Nhập số lượng">
                                </div>
                                <div class="form-group">
                                    <label>Tổng giá</label>
                                    <input id="totalPrice" name="tonggia" type="number" class="form-control"  type="text" placeholder="Nhập tổng giá">
                                </div>
                                <button type="submit" class="btn btn-default">Sửa Order</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                                <form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- end row -->
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
    <script type="text/javascript">
        $( function() {
            $('#datetimepicker').datetimepicker();
            $('#datetimepicker2').datetimepicker();
            $('#datetimepicker4').datetimepicker();
            $('#datetimepicker5').datetimepicker();
            $('#datetimepicker3').datetimepicker({
                i18n:{
                    de:{
                        months:[
                            'Januar','Februar','März','April',
                            'Mai','Juni','Juli','August',
                            'September','Oktober','November','Dezember',
                        ],
                        dayOfWeek:[
                            "So.", "Mo", "Di", "Mi",
                            "Do", "Fr", "Sa.",
                        ]
                    }
                },
                timepicker:false,
                format:'d.m.Y'
            });



        } );
        // Ẩn item
        $(document).ready(function(){
            $("#changeOneWay").change(function(){
                if($(this).is(":checked")) {
                    $(".luotve").attr('hidden', '');
                    $(".bo").removeAttr('required');
                    $(".luot").text("Một chiều");
                    $(".so").val('0');
                }
            });
            $("#changeRoundWay").change(function () {
                if ($(this).is(":checked")){
                    $(".luotve").removeAttr('hidden');
                    $(".luot").text("Lượt đi");
                }
            });
            //Tính tổng giá
            $(document).ready(function(){
                $('.price').keyup(function () {

                    // initialize the sum (total price) to zero
                    var sum = 0;

                    // we use jQuery each() to loop through all the textbox with 'price' class
                    // and compute the sum for each loop
                    $('.price').each(function() {
                        sum += Number($(this).val());
                    });

                    // set the computed value to 'totalPrice' textbox
                    $('#totalPrice').val(sum);

                });
            });
        });
    </script>
@endsection