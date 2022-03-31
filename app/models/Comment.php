<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model{
    protected $table = 'binh_luan';
    public $timestamps = false;
    protected $fillable = ['ma_binh_luan','noi-dung','ngay_binh_luan','ma_ca','ma_tai_khoan'];
    protected $primaryKey = 'ma_binh_luan';
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