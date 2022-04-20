@extends('layouts.main')
@section('content-title')
<h2>TRẠNG THÁI ĐƠN HÀNG</h2>
@endsection
@section('main-content')
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
            <br>
            <select class="form-select" name='trang_thai' aria-label="Default select example">
                <option value="{{$order->trang_thai}}" >Chọn trạng thái</option>               
                <option value="Chờ xác nhận">Chờ xác nhận</option>
                <option value="Đang vận chuyển">Đang vận chuyển</option>
                <option value="Đã hoàn thành">Đã hoàn thành</option>
                <option value="Chuyển hoàn">Chuyển hoàn</option>
                <option value="Hủy đơn">Hủy đơn</option>

            </select>
        </div>
        <button type="submit"  class="btn btn-primary">Thay đổi</button>
    </form>
    
@endsection