<?php

namespace App\Controllers;

use App\Models\Type;

class TypeController
{
    public function index()
    {
        $type =  Type::all();
        return view('type.index', [
            'type' => $type
        ]);
    }

    public function addForm()
    {
        return view('type.addform');
    }

    public function saveAdd()
    {
        $type = Type::where('ten_loai', $_POST['ten_loai'])->first();
        if ($type) {
            header('location: ' . BASE_URL . 'loai-ca/tao-moi?msg=Loại cá này đã tồn tại');
            die;
        } else {
            Type::create([
                'ten_loai' => $_POST['ten_loai']
            ]);
        }

        header('location: ' . BASE_URL . 'loai-ca');
        die;
    }

    public function editForm($ma_loai)
    {
        $type = Type::find($ma_loai);

        if (!$type) {
            header('location: ' . BASE_URL . 'loai-ca');
        } else {
            return view('type.editform', [
                'type' => $type
            ]);
        }
    }

    public function saveEdit($ma_loai)
    {
        $type = Type::find($ma_loai);
      
        $model = Type::where('ten_loai', $_POST['ten_loai'])->first();
       
        if (!empty($model) && $ma_loai != $model->ma_loai) {
            header('location: ' . BASE_URL . 'loai-ca/cap-nhat_id'.$ma_loai.'?msg=Loại cá này đã tồn tại');
            die;
        } else {
            $type->ten_loai = $_POST['ten_loai'];
            $type->save();
            header('location: ' . BASE_URL . 'loai-ca');
            die;
        }
        
    }

    public function remove($ma_loai)
    {
        Type::destroy($ma_loai);
        header('location: ' . BASE_URL . 'loai-ca');
        die;
    }
}
