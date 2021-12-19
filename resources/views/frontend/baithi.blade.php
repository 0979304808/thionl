@extends('frontend.layouts.layout')
@section('content')



    <div class="container mt-4">

        <h2 class="font-weight-bold">Tất cả các bài thi của bạn</h2>


        @foreach($dethi as $value)
            <div class="row box-item mt-4"
                 style="background-color: #f3f3f3; box-shadow: 1px 1px 5px 1px #b6b6b6; padding: 40px; border-radius: 3px">
                <div class="col-md-12">
                    <strong class="text-primary mr-4">Đề thi</strong>
                    <strong class="{{ $value->deThii ? 'text-primary' : 'text-danger'  }}">{{ $value->deThii->TenDeThi ?? 'chưa có đề thi'  }}</strong>
                    <hr>

                </div>
                <div class="col-md-6 d-flex flex-row">
                    <span style="width: 200px">
                        <strong>Thời gian bắt đầu</strong>
                    </span>
                    <span class="text-primary">{{ date('H:i', strtotime($value->NgayThi)) }}</span>
                </div>
                <div class="col-md-6 d-flex flex-row">
                    <span style="width: 200px">
                        <strong>Thời gian thi</strong>
                    </span>
                    <span class="text-primary">60 phút</span>
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
                    <span class="text-primary">{{ date('d-m-Y', strtotime($value->NgayThi)) }}</span>
                </div>
                <div class="col-md-6 d-flex flex-row">
                    <span style="width: 200px">
                         <strong>Tên học phần</strong>
                    </span>
                    <span class="text-primary">{{ $value->TenHocPhan }}</span>
                </div>
                <div class="col-md-12">
                    <hr>
                    @if($value->DeThi && $value->NgayThi)
                            @if(\Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s') < date('Y-m-d H:i:s', strtotime($value->NgayThi)) )

                                <span class="text-danger">Chưa tới giờ thi</span>

                            @elseif(\Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s') >= date('Y-m-d H:i:s', strtotime($value->NgayThi)) &&
                                \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s') <= \Carbon\Carbon::parse($value->NgayThi)->addHour()->format('Y-m-d H:i:s') )
                                <a href="{{ route( 'frontend.lambaithi',['id_lophoc' => $value->id, 'id_dethi' => $value->DeThi] ) }}" class="text-primary" target="_blank">Vào lớp thi</a>
                            @else
                                <span class="text-success">Môn thi đã xong</span>
                            @endif

                        @else
                            <span class="text-danger">Chưa có thông tin</span>
                    @endif


{{--                    {{ $value->created_at->addHour()->format('Y-m-d H:i:s') }}--}}

{{--                    if ($pubDate > Carbon::now()->subDays(30)) {--}}
{{--                    $pubDate = Carbon::now()->format('Y-m-d H:i:s');--}}
{{--                    }--}}


                </div>
            </div>
        @endforeach




    </div>


@endsection







