<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Branch extends Model{
    protected $table = 'chi_nhanh';
    protected $fillable = ['ma_chi_nhanh','ma_tai_khoan','dia_chi','anh'] ;
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
}
?>