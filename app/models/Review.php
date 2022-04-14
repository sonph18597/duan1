<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Review extends Model{
    protected $table = 'danh_gia';
    public $timestamps = false;
    protected $fillable = ['ma_danh_gia','noi_dung','ngay_danh_gia','anh','ma_tai_khoan','ma_ca','ma_phai_hoi'];
    protected $primaryKey = 'ma_danh_gia';
    public function user(){
        $user = Users::find($this->ma_tai_khoan);
        if($user){
            return $user;
        }else{
            return null;
        }
    }

    public function fish(){
        $fish = Fish::find($this->ma_ca);
        if($fish){
            return $fish;
        }else{
            return null;
        }
    }
}
?>