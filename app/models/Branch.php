<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Branch extends Model{
    protected $table = 'chi_nhanh';
    protected $fillable = ['ma_chi_nhanh','ten_chi_nhanh','dia_chi','anh'] ;
    public $timestamps = false;
    protected $primaryKey = 'ma_chi_nhanh';
    public function user(){
        $user = Users::where('ma_tai_khoan',$this->ma_tai_khoan)->first();
        if($user){
            return $user;
        }else{
            return null;
        }
    }

    public function demSodon($ma_chi_nhanh){
        $order = Order::where('ma_chi_nhanh',$ma_chi_nhanh)->get();
        $count = 0;
        foreach($order as $item){
            // var_dump(date('m/Y') );
            // echo '<pre>';
            // var_dump(date('m/Y', strtotime($item->ngay_len_don)))
            
            if(date('m/Y') == date('m/Y', strtotime($item->ngay_len_don))){
               
                $count = $count + 1;
            }
        }
        
        return $count;
    }

    public function demTien($ma_chi_nhanh){
        $order = Order::where('ma_chi_nhanh',$ma_chi_nhanh)->get();
        $tong = 0;
        foreach($order as $item){
            if($item->trang_thai == 'Đã hoàn thành'){
                if(date('m/Y') == date('m/Y', strtotime($item->ngay_len_don))){
                    $tong += $item -> tong_tien;
                }
            }
            
        }
        return $tong;
    }
}
?>