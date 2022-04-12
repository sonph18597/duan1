1 . Phần đường dẫn
 Khi có request gửi về thì sẽ đi qua .htaccess. Rồi truyền vào  index.php

trong trang index.php có biến

// $url mong muốn của người gửi request
$url = isset($_GET['url']) ? $_GET['url'] : "/";

và hàm definedRoute($url); được định nghĩa trong commons(route.php)

trong hàm definedRoute($url) có đối tượng $router được khởi tạo thông qua class RouternCotroller

class RouterController được cài đặt từ Thư viện Phroute (Co những phương thức giúp người dùng dễ dàng tạo đường dẫn hơn)

VD 1  $router->get('dashboard', [DashboardController::class, 'index']);
ý nghĩa : đường dẫn .../dashboard  gọi đến hàm index được định nghĩa trong class DashboardController

VD 2   $router->get('loai-ca',[TypeController::class,'index']);
ý nghiax : đường dẫn .../loai-ca gọi đến hàm index ở trong class TypeController.

2 . Phần controller  
Trong file TypeController.php có namespace App\Controllers , và các hàm ví dụ index() addForm()

Vd trong hàm index() trong class TypeController có 1 biến $type và trả về hàm view();

-Biến $type chứa tất cả giá trị của bảng 'loai-ca' thông qua phương thức all();

    Phương thức all() kết quả của việc thực thi câu lệnh query select * form loai-ca 

    Nhưng nhờ thư viện eloquent chỉ cần gọi phương thức static all() là show ra bảng  cần show

    vd Type::all();

-hàm view() được định nghia trong utils.php  gồm 2 tham số $viewFile và mảng $date = [];

    vd view('type.index',[
        'type' => $type,
    ])

3, phần model : 

    Nhờ thư viện eloquent có thể thực hiện các câu lệnh quẻry 1 cách dễ ràng hơn
    Chỉ cần use Illuminate\Database\Eloquent\Model; là có thể sử dụng các phương thức, thuộc tính trong class model
    vd protected $table = 'loai_ca' (Kết nối đến bảng loiaj cá)
        Type::destroy($ma_loai) trong bảng loai-ca xóa element có ma_loai = $ma_loai

4, phần views : 
    laravel Blade viết php trong html 1 các dễ ràng hơn 
    vd {{}} = <?php echo?>;
        @foreach() ... @endforeach = <?php foreach()?> ...<?php endforeach?>

    khi hàm view('type.addform',[
            'type' =>$type,
        ]);

        được trả về lúc gọi hàm index trong class Type 

        Thì trong  file index.blade.php trong fooder type trong views sẽ được show ra màn hình

        trong file index.blade.php có thể sử dụng biến type(là key của mảng trong hàm view()) được gắn giá trị băng $type(là value của mảng trong hàm view())

