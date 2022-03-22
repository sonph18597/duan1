<?php

namespace App\Controllers;

use App\Models\Type;
use App\Models\Users;

class UsersController
{
    public function index()
    {
        $user = Users::all();
        return view('users.index', [
            'user' => $user
        ]);
    }

    public function addForm()
    {
        return view('users.addform');
    }

    public function saveAdd()
    {
        Users::create([
            'user_name' => $_POST['user_name'],
            'phone' => $_POST['phone'],
            'name' => $_POST['name'],
            'pass' => $_POST['pass'],
            'role' => $_POST['role'],
            'email' => $_POST['email'],
            'image' => $_POST['image']
        ]);

        header('location: ' . BASE_URL . 'nguoi-dung');
    }

    public function editForm($id)
    {
        $user = Users::find($id);
        if (!$user) {
            header('location: ' . BASE_URL . 'nguoi-dung');
        } else {
            return view('users.editform', [
                'user' => $user
            ]);
        }
    }

    public function saveEdit($id)
    {

        $user = Users::find($id);
        $user->user_name = $_POST['user_name'];
        $user->phone = $_POST['phone'];
        $user->name = $_POST['name'];
        $user->pass = $_POST['pass'];
        $user->role = $_POST['role'];
        $user->email = $_POST['email'];
        $user->image = $_POST['image'];
        $user->save();
        header('location: ' . BASE_URL . 'nguoi-dung');
    }

    public function remove($id){
        Users::destroy($id);
        header('location: ' . BASE_URL . 'nguoi-dung');
        die;
    }
}
