<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ManageFish extends Model{
    protected $table = 'ca_theo_chi_nhanh';
    public $timestamps = false;
    protected $primaryKey = 'ma_ca_theo_chi_nhanh';
    protected $fillable = ['ma_ca_theo_chi_nhanh','ma_ca','ma_chi_nhanh','so_luong'];
    
    public function branch(){
        $branch = Branch::find($this->ma_chi_nhanh);
        if($branch){
            return $branch;
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