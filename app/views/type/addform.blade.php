@extends('layouts.main')
@section('main-content')
<form method="POST" action="">
    @if (isset($_GET['msg']))
       <p class="text-danger"><?= $_GET['msg'] ?></p>
    @endif
  
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên loại cá</label>
      <input name="ten_loai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tên Loại cha</label>
      <br>
      <select class="form-select" name='ma_loai_cha' aria-label="Default select example">
            <option selected>Chọn loại cha</option>
            <option value="0">Null</option>
            @foreach ($type as $item)
                <option value="{{$item->ma_loai}}">{{$item->ten_loai}}</option>
            @endforeach
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Thêm mới</button>
  </form>
@endsection