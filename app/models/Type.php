<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Type extends Model{
    protected $table = 'loai_ca';
    public $timestamps = false;
    protected $fillable = ['ma_loai','ten_loai','ma_loai_cha'];
    protected $primaryKey = 'ma_loai';

    public function type(){
        $type = Type::where('ma_loai',$this->ma_loai_cha)->first();
        if($type){
            return $type;
        }else{
            return null;
        }
    }
}
?>
