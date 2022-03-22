<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Type extends Model{
    protected $table = 'loai_ca';
    public $timestamps = false;
    protected $fillable = ['ma_loai','ten_loai','ten_loai_cha'];
    protected $primaryKey = 'ma_loai';
}
?>