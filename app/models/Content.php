<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Content extends Model{
    protected $table = 'bai_viet';
    public $timestamps = false;
    public $primaryKey = 'ma_bai_viet';
    public $fillable = ['ma_bai_viet','noi_dung','tieu_de','anh','ma_tai_khoan','luot_xem','ma_ca'];
    public function fish(){
        $fish = Fish::find($this->ma_ca);
    
        if($fish){
            return $fish;
        }else{
            return null;
        }
    }

    public function user(){
        $user = Users::find($this->ma_tai_khoan);
    
        if($user){
            return $user;
        }else{
            return null;
        }
    }
}
?>