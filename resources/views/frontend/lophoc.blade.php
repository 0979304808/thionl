@extends('frontend.layouts.layout')
@section('content')

    <div id="slides" class="container mt-4" data-ride="carousel">
        <h2>Tất cả lớp học</h2>
        @foreach($lophoc as $key => $value)

            <div class="row box-item mt-4"
                 style="background-color: #f3f3f3; box-shadow: 1px 1px 5px 1px #b6b6b6; padding: 40px; border-radius: 3px">
                <div class="col-md-12">
                    <strong class="text-primary mr-4">Mã lớp</strong>
                    <strong class="text-primary">{{ $value->TenLop }}</strong>
                    <hr>

                </div>
                <div class="col-md-6 d-flex flex-row">
                    <span style="width: 200px">
                        <strong>Mã học phần</strong>
                    </span>
                    <span class="text-primary">{{ $value->MaHocPhan }}</span>
                </div>
                <div class="col-md-6 d-flex flex-row">
                    <span style="width: 200px">
                         <strong>Tên học phần</strong>
                    </span>
                    <span class="text-primary">{{ $value->TenHocPhan }}</span>
                </div>
                <div class="col-md-6 d-flex flex-row">
                    <span style="width: 200px">
                         <strong>Tên lớp</strong>
                    </span>
                    <span class="text-primary">{{ $value->TenLop }}</span>
                </div>
                <div class="col-md-6 d-flex flex-row">
                    <span style="width: 200px">
                         <strong>Mô tả</strong>
                    </span>
                    <span class="text-primary">{{ $value->MoTa }}</span>
                </div>
                <div class="col-md-12">
                    <hr>
                    @if(Auth::check())
                        @if(count($value->sinhVien->where('id', Auth::id())) == 0 )
                            <a class="text-success" href="{{ route('frontend.dangkylophoc', $value->id) }}">
                                Đăng ký lớp học
                            </a>
                        @else
                            <a class="text-danger" href="{{ route('frontend.huylophoc', $value->id) }}">
                                Hủy lớp học
                            </a>
                        @endif
                    @else
                        <a href="{{ route('frontend.login') }}">Đăng nhập để đăng ký lớp</a>
                    @endif
                </div>
            </div>


        @endforeach

    </div>

@endsection









