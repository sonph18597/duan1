<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Users extends Model{
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = ['id','name','user_name','email','phone','role','image','pass'];
}
?>