@extends('frontend.layouts.layout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-4">Tài khoản</h2>
                <hr>
            </div>

            <div class="col-md-3 nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Lớp học của tôi</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Lịch thi</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Thông tin tài khoản</a>
            </div>
            <div class="col-md-9 tab-content pt-0" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <h2 class="mt-0 pt-0">Lớp học của tôi</h2>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <h2>Lịch thi</h2>
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <h2>Thông tin tài khoản</h2>
                </div>
            </div>
        </div>

    </div>
@endsection
