<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ManageBranch extends Model{
    protected $table = 'quan_li_chi_nhanh';
    public $timestamps = false;
    protected $fillable = ['ma_quan_li_chi_nhanh','ma_tai_khoan','ma_chi_nhanh'];
    protected $primaryKey = 'ma_quan_li_chi_nhanh';

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