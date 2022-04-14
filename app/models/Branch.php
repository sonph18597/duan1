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
        $count = Order::where('ma_chi_nhanh',$ma_chi_nhanh)->count();
        return $count;
    }

    public function demTien($ma_chi_nhanh){
        $count = Order::where('ma_chi_nhanh',$ma_chi_nhanh)->get();
        $tong = 0;
        foreach($count as $c){
            $tong += $c->tong_tien;
        }
        return $tong;
    }
}
?>