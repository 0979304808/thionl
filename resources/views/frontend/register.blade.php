@extends('frontend.layouts.layout')
@section('content')

    <div id="slides" style="margin: 0 auto; max-width: 500px" class="mt-4" data-ride="carousel">
        <h2>Đăng nhập</h2>
        <form action="{{ route('frontend.login.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Tài khoản</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập email...">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mật khẩu</label>
                <input type="password" placeholder="Nhập mật khẩu..." name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Nhớ mật khẩu</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </div>

        </form>

    </div>
@endsection











