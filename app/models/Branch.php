<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Branch extends Model{
    protected $table = 'branch';
    protected $fillable = ['id','user_id','address','image'] ;
    public $timestamps = false;
}
?>