<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
 public function getDanhSach(){
     $order=Order::all();
     return view('admin.order.danhsach',['order'=>$order]);
 }
 public function getHanhLy($id){
     $order=Order::find($id);
    return view('admin.order.hanhly',['order'=>$order]);
 }
 public function getChiTiet($id){
        $order=Order::find($id);
        return view('admin.order.chitiet',['order'=>$order]);
 }
    public function getChiTietLuotVe($id){
        $order=Order::find($id);
        return view('admin.order.chitietluotve',['order'=>$order]);
 }
 public function getSua($id){
     $nguoidung=User::all();
     $order=Order::find($id);
     return view('admin.order.sua',['nguoidung'=>$nguoidung,'order'=>$order]);
 }
 function doichuyen($masanbay){
    $tenchuoi='';
     switch ($masanbay){
         case $masanbay='VCA':$tenchuoi='Cantho|Sân bay Quốc tế Cần Thơ';
         break;
         case $masanbay='DAD':$tenchuoi='Danang|Sân bay Quốc tế Đà Nẵng';
             break;
         case $masanbay='HPH':$tenchuoi='HaiPhong|Sân bay Quốc tế Cát Bi – Hải Phòng';
             break;
         case $masanbay='HAN':$tenchuoi='Hanoi|Sân bay Quốc tế Nội Bài – Hà Nội';
             break;
         case $masanbay='SGN':$tenchuoi='HoChiMinh|Sân bay Quốc tế Tân Sơn Nhất';
             break;
         case $masanbay='CXR':$tenchuoi='Camranhq|Sân bay Quốc tế Cam Ranhq';
             break;
         case $masanbay='PQC':$tenchuoi='Phuquoc|Sân bay Quốc tế Phú Quốc';
             break;
         case $masanbay='VII':$tenchuoi='Nghean|Sân bay Quốc tế Vinh – Nghệ An';
             break;
         case $masanbay='HUI':$tenchuoi='Hue|Sân bay Quốc tế Phú Bài – Huế';
             break;
         case $masanbay='VCS':$tenchuoi='Condao|Sân bay Côn Đảo';
             break;
         case $masanbay='SQH':$tenchuoi='Sonla|Sân bay Nà Sản';
             break;
         case $masanbay='UIH':$tenchuoi='Binhdinh|Sân bay Phù Cát – Bình Định';
             break;
         case $masanbay='CAH':$tenchuoi='Camau|Sân bay Cà Mau';
             break;
         case $masanbay='BMV':$tenchuoi='Buonmathuot|Sân bay Buôn Ma Thuột';
             break;
         case $masanbay='DIN':$tenchuoi='Dienbien|Sân bay Điện Biên Phủ';
             break;
         case $masanbay='PXU':$tenchuoi='Oleiku|Sân bay Pleiku – Gia Lai';
             break;
         case $masanbay='VKG':$tenchuoi='Rachgia|Sân bay Rạch Giá – Kiên Giang';
             break;
         case $masanbay='DLI':$tenchuoi='Dalat|Sân bay Liên Khương – Đà Lạt';
             break;
         case $masanbay='TBB':$tenchuoi='Phuyen|Sân bay Tuy Hòa – Phú Yên';
             break;
         case $masanbay='VDH':$tenchuoi='Quangbinh|Sân bay Đồng Hới – Quảng Bình';
             break;
         case $masanbay='VCL':$tenchuoi='Chulai|Sân bay Chu Lai – Quảng Nam';
             break;
         default:
         $tenchuoi='Thanhhoa|Sân bay Thọ Xuân – Thanh Hóa';
             break;
     }

     return $tenchuoi;
 }
 public function postSua(Request $req,$id){

    if ($req->way=='roundway'){
        if (count($req->all())<24){
            return redirect('admin/ManagerOrder/sua/'.$id)->with('thongbao','Bạn chưa xát nhận sửa');
        }
        else{
            $order=Order::find($id);
            $order->dep_code=$req->sanbaybd;
            $sanbaydi=$this->doichuyen($req->sanbaybd);
            $sanbaydi=explode("|",$sanbaydi);
            $order->dep_name=$sanbaydi[0];
            $order->dep_airport=$sanbaydi[1];


            $sanbayden=$this->doichuyen($req->sanbayden);
            $order->arv_code=$req->sanbayden;
            $sanbayden=explode("|",$sanbayden);
            $order->arv_name=$sanbayden[0];
            $order->arv_airport=$sanbayden[1];

            $thoidiemdi=explode(" ",$req->thoidiemdi);
            $order->dep_date=$thoidiemdi[0];
            $order->dep_time=$thoidiemdi[1];

            $thoidiemden=explode(" ",$req->thoidiemden);
            $order->arv_date=$thoidiemden[0];
            $order->arv_time=$thoidiemden[1];

            $order->base_price=$req->gia;
            $order->flight_no=$req->mave;
            // luot ve
            $order->dep_code_ret=$req->sanbaybdve;
            $sanbaydive=$this->doichuyen($req->sanbaybdve);
            $sanbaydive=explode("|",$sanbaydive);
            $order->dep_name_ret=$sanbaydive[0];
            $order->dep_airport_ret=$sanbaydive[1];


            $sanbaydenve=$this->doichuyen($req->sanbaydenve);
            $order->arv_code_ret=$req->sanbaydenve;
            $sanbaydenve=explode("|",$sanbaydenve);
            $order->arv_name_ret=$sanbaydenve[0];
            $order->arv_airport_ret=$sanbaydenve[1];

            $thoidiemdive=explode(" ",$req->thoidiemdive);
            $order->dep_date_ret=$thoidiemdive[0];
            $order->dep_time_ret=$thoidiemdive[1];

            $thoidiemdenve=explode(" ",$req->thoidiemdenve);
            $order->arv_date_ret=$thoidiemdenve[0];
            $order->arv_time_ret=$thoidiemdenve[1];

            $order->base_price_ret=$req->giave;
            $order->flight_no_ret=$req->maveve;

            $order->ticket_type=$req->way;
            $order->adt=$req->nguoilon;
            $order->chd=$req->trem;
            $order->inf=$req->sosinh;
            $order->id_user=$req->iduser;

            $order->passenger_info='{"GioiTinh":"'.$req->gioitinh.'","loaihanhkhach":"'.$req->loaihanhkhac.'","FullName":"'.$req->tenmua.'","NamSinh":"7/4/1998","HanhLy":'.$req->hanhly.'}';
            $order->flight_name=$req->hangbay;
            $order->quantity_ticket=$req->sove;
            $order->total_price=$req->tonggia;
            $order->save();
            return redirect('admin/ManagerOrder/danhsach')->with('thongbao','Bạn đã sửa thành công thông tin của đơn hàng : '.$id);

        }
    }elseif ($req->way!='roundway'){
        if (count($req->all())<24){
            return redirect('admin/ManagerOrder/sua/'.$id)->with('thongbao','Bạn chưa xát nhận sửa');
        }
        else{
            $order=Order::find($id);
            $order->dep_code=$req->sanbaybd;
            $sanbaydi=$this->doichuyen($req->sanbaybd);
            $sanbaydi=explode("|",$sanbaydi);
            $order->dep_name=$sanbaydi[0];
            $order->dep_airport=$sanbaydi[1];


            $sanbayden=$this->doichuyen($req->sanbayden);
            $order->arv_code=$req->sanbayden;
            $sanbayden=explode("|",$sanbayden);
            $order->arv_name=$sanbayden[0];
            $order->arv_airport=$sanbayden[1];

            $thoidiemdi=explode(" ",$req->thoidiemdi);
            $order->dep_date=$thoidiemdi[0];
            $order->dep_time=$thoidiemdi[1];

            $thoidiemden=explode(" ",$req->thoidiemden);
            $order->arv_date=$thoidiemden[0];
            $order->arv_time=$thoidiemden[1];

            $order->base_price=$req->gia;
            $order->flight_no=$req->mave;
            // luot ve
            $order->dep_name_ret='';
            $order->dep_airport_ret='';



            $order->arv_name_ret='';
            $order->arv_airport_ret='';


            $order->dep_date_ret='';
            $order->dep_time_ret='';


            $order->arv_date_ret='';
            $order->arv_time_ret='';

            $order->base_price_ret='';
            $order->flight_no_ret='';

            $order->ticket_type=$req->way;
            $order->adt=$req->nguoilon;
            $order->chd=$req->trem;
            $order->inf=$req->sosinh;
            $order->id_user=$req->iduser;

            $order->passenger_info='{"GioiTinh":"'.$req->gioitinh.'","loaihanhkhach":"'.$req->loaihanhkhac.'","FullName":"'.$req->tenmua.'","NamSinh":"7/4/1998","HanhLy":'.$req->hanhly.'}';
            $order->flight_name=$req->hangbay;
            $order->quantity_ticket=$req->sove;
            $order->total_price=$req->tonggia;
            $order->save();
            return redirect('admin/ManagerOrder/danhsach')->with('thongbao','Bạn đã sửa thành công thông tin của đơn hàng : '.$id);

        }
    }
 }
}
