<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Fish extends Model{
    protected $table = 'ca';
    protected $fillable = ['ma_ca','xuat_xu','ten_ca','gia_goc','gia_ban','ma_loai','anh','trang_thai'];
    public $timestamps = false;
    protected $primaryKey = 'ma_ca';
    public function demBL(){
        $count = Comment::where('ma_ca',$this->ma_ca)->count();
        return $count;
    }

    public function mana(){
        $mana = ManageFish::where('ma_ca',$this->ma_ca)->get();
        
        if($mana){
            return $mana;
        }else{
            return null;
        }
    }

    public function type(){
        $type = Type::where('ma_loai',$this->ma_loai)->first();
        
        if($type){
            return $type;
        }else{
            return null;
        }
    }
 
   
  
}
?>