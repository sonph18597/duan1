@extends('layouts.client')
@section('client_content')

<section class="contact_section layout_padding">
    <div class="container ">
      <div class="heading_container justify-content-center">
        <h2 class="">
            Đăng Kí
        </h2>
      </div>

    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <form action="" method="post" enctype="multipart/form-data" >
            <div>
              <input type="text" placeholder="Tên đăng kí" />
            </div>
            <div>
                <input type="password" placeholder="password" />
              </div>
              <div>
                <input type="password" placeholder=" confirm password" />
              </div>

            <div>
              <input type="email" placeholder="Email" />
            </div>
            <div>
              <input type="text" placeholder="Họ Tên" />
            </div>
            <div>
                <input type="file" placeholder="hình ảnh" />
              </div>
            <div>
              <input type="text" class="message-box" placeholder="Message" />
            </div>
            <div class="d-flex  mt-4 ">
              <button>
                Đăng Kí
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection