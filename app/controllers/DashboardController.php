<?php
namespace App\Controllers;

use Illuminate\Support\Facades\Redirect;

class DashboardController{
    public function index(){
        if(isset($_SESSION['user'])){
            if($_SESSION['user']['vai_tro'] == 'Admin' || $_SESSION['user']['vai_tro'] == 'Admin chi nhánh' ){
                return view('admin.index');
            }
        } else {
           header('location:' .BASE_URL  );
           die;
        }
       
    }
}
?>