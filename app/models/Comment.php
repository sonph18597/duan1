<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model{
    protected $table = 'answers';
    public $timestamps = false;
}
?>