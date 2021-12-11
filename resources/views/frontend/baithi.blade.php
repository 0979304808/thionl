@extends('frontend.layouts.layout')
@section('content')



    <div class="container mt-4">

        <h2>Tất cả các bài thi của bạn</h2>


        @foreach($dethi as $value)
            <div class="row box-item mt-4"
                 style="background-color: #f3f3f3; box-shadow: 1px 1px 5px 1px #b6b6b6; padding: 40px; border-radius: 3px">
                <div class="col-md-12">
                    <strong class="text-primary mr-4">Đề thi</strong>
                    <strong class="text-primary">{{ $value->deThi->TenDeThi ?? 'a'  }}</strong>
                    <hr>

                </div>
                <div class="col-md-6 d-flex flex-row">
                    <span style="width: 200px">
                        <strong>Thời gian thi</strong>
                    </span>
                    <span class="text-primary">{{ $value->NgayThi }}</span>
                </div>
                <div class="col-md-6 d-flex flex-row">
                    <span style="width: 200px">
                         <strong>
                                Mã học phần
                         </strong>
                    </span>
                    <span class="text-primary">{{ $value->MaHocPhan }}</span>
                </div>
                <div class="col-md-6 d-flex flex-row">
                    <span style="width: 200px">
                         <strong>Ngày thi</strong>
                    </span>
                    <span class="text-primary">{{ $value->NgayThi }}</span>
                </div>
                <div class="col-md-6 d-flex flex-row">
                    <span style="width: 200px">
                         <strong>Tên học phần</strong>
                    </span>
                    <span class="text-primary">{{ $value->TenHocPhan }}</span>
                </div>
                <div class="col-md-12">
                    <hr>

                    @if(\Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s') < date('Y-m-d H:i:s', strtotime($value->NgayThi)) )

                        <a>Chưa tới giờ thi</a>

                        @elseif(\Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s') >= date('Y-m-d H:i:s', strtotime($value->NgayThi)) &&
                            \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s') <= \Carbon\Carbon::parse($value->NgayThi)->addHour()->format('Y-m-d H:i:s') )
{{--                        @elseif(bon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s') < $value->NgayThi->addHour()->format('Y-m-d H:i:s'))--}}

                        <a>Vào lớp thi</a>
                        @else>
                        <a>Môn thi đã xong </a>

                    @endif

{{--                    {{ $value->created_at->addHour()->format('Y-m-d H:i:s') }}--}}

{{--                    if ($pubDate > Carbon::now()->subDays(30)) {--}}
{{--                    $pubDate = Carbon::now()->format('Y-m-d H:i:s');--}}
{{--                    }--}}


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







