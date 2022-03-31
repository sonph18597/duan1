<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order extends Model{
    protected $table = 'don_hang';
    public $timestamps = false;
    protected $fillable = ['ma_don_hang','ngay_len_don','tong_tien','trang_thai','dia_chi','so_dien_thoai','ma_chi_nhanh','ghi_chu'];
    protected $primaryKey = 'ma_don_hang';
    public function user(){
        $user = Users::where('ma_tai_khoan',$this->ma_tai_khoan)->first();
        if($user){
            return $user;
        }else{
            return null;
        }
    }
    public function fish(){
        $fish = Fish::where('ma_chi_nhanh',$this->ma_ca)->first();
        if($fish){
            return $fish;
        }else{
            return null;
        }
    }

   
}
?>