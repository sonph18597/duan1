@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Mã bài viết</label>
    <input name="" placeholder="{{$content->ma_bai_viet}}" readonly type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div> 

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tiêu đề</label>
      <input name="tieu_de" value="{{$content->tieu_de}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>
    <div class="form-floating">
        <label for="floatingTextarea">Nội dung</label>
        <textarea name="noi_dung" value="{{$content->noi_dung}}" placeholder="{{$content->noi_dung}}" class="form-control" id="floatingTextarea"></textarea>
        
      </div>

      <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Ảnh</label>
        <input name="anh" value="{{$content->anh}}"class="form-control" type="file" id="formFileMultiple" multiple>
      </div>

      <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Người viết</label>
        <select name="ma_tai_khoan" value="{{$content->user()->ho_ten}}" class="form-select" id="inputGroupSelect01">
                
                @foreach ($user as $item)
                    <option value="{{$item->ma_tai_khoan}}">{{$item->ho_ten}}</option>
                @endforeach
        </select>
      </div>


      <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Tên cá</label>
        <select name="ma_ca" value="{{$content->fish()->ten_ca}}" class="form-select" id="inputGroupSelect01">
               
                @foreach ($fish as $item)
                    <option value="{{$item->ma_ca}}">{{$item->ten_ca}}</option>
                @endforeach
        </select>
      </div>


    <button type="submit" class="btn btn-primary">Thêm mới</button>
  </form>
@endsection