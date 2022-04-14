<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order extends Model{
    protected $table = 'don_hang';
    public $timestamps = false;
    protected $fillable = ['ma_don_hang','ngay_len_don','tong_tien','trang_thai','dia_chi','so_dien_thoai','ma_chi_nhanh','ghi_chu'];
    protected $primaryKey = 'ma_don_hang';
    public function user(){
        $user = Users::find($this->ma_tai_khoan);
        if($user){
            return $user;
        }else{
            return null;
        }
    }
    public function branch(){
        $branch = Branch::find($this->ma_chi_nhanh);
        if($branch){
            return $branch;
        }else{
            return null;
        }
    }

    

   
}
?>