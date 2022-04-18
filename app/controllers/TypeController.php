<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Content;
use App\Models\Fish;
use App\Models\ManageFish;
use App\Models\OrderDetail;
use App\Models\Review;
use App\Models\Type;

class TypeController
{
    public function index()
    {
        
        $type = Type::orderByRaw('ten_loai ')->get();
        return view('type.index', [
            'type' => $type
        ]);
    }

    public function addForm()
    {   
        $type = Type::orderByRaw('ten_loai ')->get();
        return view('type.addform',[
            'type' =>$type,
        ]);
    }

    public function saveAdd()
    {
        $type = Type::where('ten_loai', $_POST['ten_loai'])->first();
        
        if ($type) {
            header('location: ' . BASE_URL . 'loai-ca/tao-moi?msg=Loại cá này đã tồn tại');
            die;
        } else {
            Type::create([
                'ma_loai_cha' => $_POST['ma_loai_cha'],
                'ten_loai' => $_POST['ten_loai']
            ]);
        }
        
        header('location: ' . BASE_URL . 'loai-ca');
        die;
    }
    
    public function editForm($ma_loai)
    {
        $type = Type::find($ma_loai);

        $show = Type::orderByRaw('ten_loai ')->get();

        if (!$type) {
            header('location: ' . BASE_URL . 'loai-ca');
        } else {
            return view('type.editform', [
                'type' => $type,
                'show'=>$show
            ]);
        }
    }

    public function saveEdit($ma_loai)
    {
        $type = Type::find($ma_loai);
      
        $model = Type::where('ten_loai', $_POST['ten_loai'])->first();
       
        if (!empty($model) && $ma_loai != $model->ma_loai) {
            header('location: ' . BASE_URL . 'loai-ca/cap-nhat_id/'.$ma_loai.'?msg=Loại cá này đã tồn tại');
            die;
        } else {
            $type->ten_loai = $_POST['ten_loai'];
            $type->ma_loai_cha = $_POST['ma_loai_cha'];
            $type->save();
            header('location: ' . BASE_URL . 'loai-ca');
            die;
        }
        
    }

    public function remove($ma_loai)
    {
       //xoa  sp cua loai
        $fish = Fish::where('ma_loai',$ma_loai)->get();
      
        if($fish){   
            foreach($fish as $item){
                
                Content :: where('ma_ca',$item->ma_ca)->delete();
                Comment:: where('ma_ca',$item->ma_ca)->delete();
                OrderDetail::where('ma_ca',$item->ma_ca)->delete();
                ManageFish::where('ma_ca',$item->ma_ca)->delete();
                Review::where('ma_ca',$item->ma_ca)->delete();
                $item->delete();
            } 
            
        }
    
        $types = Type::where('ma_loai_cha',$ma_loai)->get();
        
        if($types){
            
            foreach($types as $item){
                $fishes = Fish::where('ma_loai',$item->ma_loai)->get();
                $item->delete();
                if($fishes){
                    foreach($fishes as $item2){      
                        Content :: where('ma_ca',$item2->ma_ca)->delete();
                        Comment:: where('ma_ca',$item2->ma_ca)->delete();
                        OrderDetail::where('ma_ca',$item2->ma_ca)->delete();
                        ManageFish::where('ma_ca',$item2->ma_ca)->delete();
                        Review::where('ma_ca',$item2->ma_ca)->delete();
                        $item2->delete();
                    }
                }     
            } 
        }
        
        Type::destroy($ma_loai);
        header('location: ' . BASE_URL . 'loai-ca');
        die;
        
        
    }
}
?>
