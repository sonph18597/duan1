<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class OrderDetail extends Model{
    protected $table = 'chi_tiet_don_hang';
    public $timestamps = false;
    protected $fillable = ['ma_chi_tiet_don_hang','ma_don_hang','so_luong','ma_chi_nhanh'];
    protected $mprimaryKey = 'ma_chi_tiet_don_hang';
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