<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Fish extends Model{
    protected $table = 'ca';
    protected $fillable = ['ma_ca','ten_ca','ma_loai','mau','xuat_su','kich_thuoc','giai_thuong','gia_goc','gia_ban','ngay_nhap','trang_thai','anh','luot_xem','tuoi'];
    public $timestamps = false;
    protected $primaryKey = 'ma_ca';
    public function demBL(){
        $count = Comment::where('ma_ca',$this->ma_ca)->count();
        return $count;
    }

  
}
?>