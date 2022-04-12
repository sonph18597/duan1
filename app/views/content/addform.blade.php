@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
   
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tiêu đề</label>
      <input name="tieu_de" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    <div class="form-floating">
        <label for="floatingTextarea">Nội dung</label>
        <textarea name="noi_dung" class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
        
      </div>

      <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Ảnh</label>
        <input name="anh" class="form-control" type="file" id="formFileMultiple" multiple>
      </div>

      <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Người viết</label>
        <select name="ma_tai_khoan" class="form-select" id="inputGroupSelect01">
                <option selected>Chọn tài khoản</option>
                @foreach ($user as $item)
                    <option value="{{$item->ma_tai_khoan}}">{{$item->ten_tai_khoan}}</option>
                @endforeach
        </select>
      </div>


      <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Tên cá</label>
        <select name="ma_ca" class="form-select"  id="inputGroupSelect01">
                <option selected >Chọn mã cá</option>
                @foreach ($fish as $item)
                    <option value="{{$item->ma_ca}}">{{$item->ten_ca}}</option>
                @endforeach
        </select>
      </div>


    <button type="submit" class="btn btn-primary">Thêm mới</button>
  </form>
@endsection