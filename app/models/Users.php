<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Users extends Model{
    protected $table = 'tai_khoan';
    public $timestamps = false;
    protected $fillable = ['ma_tai_khoan','ten_tai_khoan','mat_khau','email','so_dien_thoai','vai_tro','anh_dai_dien','ho_ten'];
    protected $primaryKey = 'ma_tai_khoan';
}  
?>