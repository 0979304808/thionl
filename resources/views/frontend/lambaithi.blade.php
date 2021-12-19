<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thi Online</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <link rel="stylesheet" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/compiled-addons-4.19.1.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/mdb.min.css">
    <link rel="stylesheet" href="https://mdbootstrap.com/api/snippets/static/download/MDB-Pro_4.19.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="min-vh-100">
    <div class="container mt-4 mb-5">
        <h2 class="text-center">
            <strong>
                {{ request('kq') ? 'Kết quả bài thi' : 'Làm bài thi' }}
            </strong>
        </h2>
        <h2>
            <strong>Đề thi : {{ $dethi->TenDeThi }}</strong>
        </h2>
        <h4>Họ Tên: {{ Auth::user()->name }}</h4>
        <h4>Mã sinh viên: {{ Auth::user()->masv }}</h4>
        @if(request('kq'))
            <h4 class="text-danger">
                <strong>Tổng điểm: {{ $points }} điểm</strong>
            </h4>
        @endif
        @if (\Session::has('msg'))
            <div class="alert alert-danger">
                <span>{!! \Session::get('msg') !!}</span>
            </div>
        @endif
        <form action="{{ route('frontend.lambaithi', ['id_lophoc'=> $id_lophoc,'id_dethi'=> $dethi->id])."?kq=nopbai" }}" method="post">
            @csrf
            @method('GET')

            @foreach($dethi->cauHoi as $key => $value)
                <div class="form-group">

                    <br>
                    <div class="d-flex justify-content-between">
                        <label>
                            <strong>{{ $key + 1 }}. {{ $value->CauHoi  }} ?</strong>
                        </label>
                        <span class="text-danger ml-5">
                            {{ isset($value->success) ? $point : 0  }} điểm
                        </span>
                    </div>


                    @if($value->A)
                        <div class="form-check {{ request('kq') ? ($value->DapAn == 'A') ? ' alert alert-success' : '' : '' }}">
                            <input class="form-check-input" type="radio" name="name_{{ $value->id }}"
                                   id="name_{{ $value->id }}_a" value="{{ $value->id }}_A_{{$key}}" {{ request('kq') ? 'disabled' : '' }} {{ isset($value->DapAnChon) ? ($value->DapAnChon == 'A' ? 'checked' : '') : ''  }} required>
                            <label class="form-check-label" for="name_{{ $value->id }}_a">
                                {{ $value->A }}
                            </label>
                        </div>
                    @endif
                    @if($value->B)
                        <div class="form-check {{ request('kq') ? ($value->DapAn == 'B') ? ' alert alert-success' : '' : '' }}">
                            <input class="form-check-input" type="radio" name="name_{{ $value->id }}"
                                   id="name_{{ $value->id }}_b" value="{{ $value->id }}_B_{{$key}}" {{ request('kq') ? 'disabled' : '' }} {{ isset($value->DapAnChon) ? ($value->DapAnChon == 'B' ? 'checked' : '') : ''  }}>
                            <label class="form-check-label" for="name_{{ $value->id }}_b">
                                {{ $value->B }}
                            </label>
                        </div>
                    @endif
                    @if($value->C)
                        <div class="form-check {{ request('kq') ? ($value->DapAn == 'C') ? ' alert alert-success' : '' : '' }}">
                            <input class="form-check-input" type="radio" name="name_{{ $value->id }}"
                                   id="name_{{ $value->id }}_c" value="{{ $value->id }}_C_{{$key}}" {{ request('kq') ? 'disabled' : '' }} {{ isset($value->DapAnChon) ? ($value->DapAnChon == 'C' ? 'checked' : '') : ''  }}>
                            <label class="form-check-label" for="name_{{ $value->id }}_c">
                                {{ $value->C }}
                            </label>
                        </div>
                    @endif
                    @if($value->D)
                        <div class="form-check {{ request('kq') ? ($value->DapAn == 'D') ? ' alert alert-success' : '' : '' }}">
                            <input class="form-check-input" type="radio" name="name_{{ $value->id }}"
                                   id="name_{{ $value->id }}_d" value="{{ $value->id }}_D_{{$key}}" {{ request('kq') ? 'disabled' : '' }} {{ isset($value->DapAnChon) ? ($value->DapAnChon == 'D' ? 'checked' : '') : ''  }}>
                            <label class="form-check-label" for="name_{{ $value->id }}_d">
                                {{ $value->D }}
                            </label>
                        </div>
                    @endif
                    @if($value->E)
                        <div class="form-check {{ request('kq') ? ($value->DapAn == 'E') ? ' alert alert-success' : '' : '' }}">
                            <input class="form-check-input" type="radio" name="name_{{ $value->id }}"
                                   id="name_{{ $value->id }}_e" value="{{ $value->id }}_E_{{$key}}" {{ request('kq') ? 'disabled' : '' }} {{ isset($value->DapAnChon) ? ($value->DapAnChon == 'E' ? 'checked' : '') : ''  }}>
                            <label class="form-check-label" for="name_{{ $value->id }}_e">
                                {{ $value->E }}
                            </label>
                        </div>
                    @endif
                    @if($value->F)
                        <div class="form-check {{ request('kq') ? ($value->DapAn == 'F') ? ' alert alert-success' : '' : '' }}">
                            <input class="form-check-input" type="radio" name="name_{{ $value->id }}"
                                   id="name_{{ $value->id }}_f" value="{{ $value->id }}_F_{{$key}}" {{ request('kq') ? 'disabled' : '' }} {{ isset($value->DapAnChon) ? ($value->DapAnChon == 'F' ? 'checked' : '') : ''  }}>
                            <label class="form-check-label" for="name_{{ $value->id }}_f">
                                {{ $value->F }}
                            </label>
                        </div>
                    @endif

                </div>

            @endforeach
            @if(!request('kq'))
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Nộp bài</button>
                </div>
            @endif



        </form>

    </div>
</div>


</body>
</html>
{{--test--}}







