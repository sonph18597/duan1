@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
    @if (isset($_GET['msg']))
       <p class="text-danger"><?= $_GET['msg'] ?></p>
    @endif
    
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên loại cá</label>
      <input name="ten_loai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$type->ten_loai}}">
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên loại cha</label>
      <br>
      <select class="form-select"  name='ma_loai_cha' aria-label="Default select example">
        <option value="{{$type->ma_loai_cha}}">Chọn tên loại cha</option>
        <option value="0">Null</option>
          @foreach ($show as $item)
            @if ($item->ma_loai != $type->ma_loai)
              
                <option value="{{$item->ma_loai}}">{{$item->ten_loai}}</option>

            @endif
              
          @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>
@endsection