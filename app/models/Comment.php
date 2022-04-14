<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model{
    protected $table = 'binh_luan';
    public $timestamps = false;
    protected $fillable = ['ma_binh_luan','noi_dung','ngay_binh_luan','ma_tra_loi','ma_ca','ma_tai_khoan'];
    protected $primaryKey = 'ma_binh_luan';
    public function user(){
        $user = Users::find($this->ma_tai_khoan);
    
        if($user){
            return $user;
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
    // lấy tên người trả lời
    public function getName(){
        if($this->ma_tra_loi == 0){
            return 'Bình luận gốc';
        }
        $comment = Comment::where('ma_binh_luan',$this->ma_tra_loi)->first();
        $user = Users::where('ma_tai_khoan',$comment->ma_tai_khoan)->first();
        if($comment){
            return $user->ten_tai_khoan;
        }else{
            return null;
        }
    }
}
?>