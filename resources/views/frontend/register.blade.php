@extends('frontend.layouts.layout')
@section('content')

    <div id="slides" style="margin: 0 auto; max-width: 500px; box-shadow: 1px 1px 5px 1px #d0d0d0;padding: 40px; border-radius: 7px" class="mt-4" data-ride="carousel">
        <h2 class="text-center font-weight-bold">Đăng ký tài khoản</h2>
        <form action="{{ route('frontend.register.store') }}" method="post">
            @csrf
            <div class="form-group mb-0">
                <label class="mb-0" for="exampleInputEmail1">Mã sinh viên</label>
                <input type="text" name="masv" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập mã sinh viên...">
            </div>
            <div class="form-group mb-0">
                <label class="mb-0" for="exampleInputEmail1">Tên</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên...">
            </div>
            <div class="form-group mb-0">
                <label class="mb-0" for="exampleInputEmail1">Email</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email...">
            </div>
            <div class="form-group mb-0">
                <label class="mb-0" for="exampleInputPassword1">Mật khẩu</label>
                <input type="password" placeholder="Nhập mật khẩu..." name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Hãy đồng ý với điều khoản của chúng tôi</label>
            </div>
            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary ml-0">Đăng ký ngay</button>
            </div>
            <div class="form-group">
                <h5>Bạn đã có tài khoản?</h5>
                <a class="text-primary" href="{{ route('frontend.login') }}">Đăng nhập ngay</a>
            </div>

        </form>

    </div>
@endsection











