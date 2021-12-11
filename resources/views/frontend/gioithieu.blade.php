@extends('frontend.layouts.layout')
@section('content')

    <div id="slides" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
            <li data-target="#slides" data-slide-to="3"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="Trangchu1.html">
                    <img src="./images/carousel0.jpg"/>
                    <div class="carousel-caption">
                        <h3>WELCOME TO ONLINE EXAMINATION SYSTEM</h3>
                        <p>BÃI BIỂN</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="Tramgchu1.html">
                    <img src="./images/carousel1.jpg"/>
                    <div class="carousel-caption">
                        <h3>WELCOME TO ONLINE EXAMINATION SYSTEM</h3>
                        <p>BÃI BIỂN</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="Trangchu1.html">
                    <img src="./images/carousel2.jpg"/>
                    <div class="carousel-caption">
                        <h3>WELCOME TO ONLINE EXAMINATION SYSTEM</h3>
                        <p>BÃI BIỂN</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="Trangchu1.html">
                    <img src="./images/carousel3.jpg"/>
                    <div class="carousel-caption">
                        <h3>WELCOME TO ONLINE EXAMINATION SYSTEM</h3>
                        <p>NÚI CAO</p>
                    </div>
                </a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#slides" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#slides" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <div id="slides" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1"></li>
            <li data-target="#slides" data-slide-to="2"></li>
            <li data-target="#slides" data-slide-to="3"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="Trangchu1.html">
                    <img src="./images/Anh2.jpg"/>
                    <div class="carousel-caption">

                        <h3>Học và Thi</h3>
                        <p>Kho đề thi và bài tập khổng lồ
                            Hơn 3.000 đề thi và 50.000 bài tập với mức độ khó dễ phân theo ma trận của Bộ GD, được cập nhật liên tục từ các thầy cô uy tín tại Việt Nam, cùng nhiều đầu sách uy tín khác.</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="Trangchu1.html">
                    <img src="./images/Anh0.jpg"/>
                    <div class="carousel-caption">
                        <h3>Học và Thi</h3>
                        <p>Ngân hàng câu hỏi online đầy đủ các môn học đại cương , môn học chuyên ngành giúp các bạn sinh viên ôn và thi đạt kết quả tốt</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a class="title-vip">Thi online</a>
                <a href="Trangchu1.html">
                    <img src="./images/Anh1.jpg"/>
                    <div class="carousel-caption">
                        <h3>Học và Thi</h3>
                        <p>Hệ thống ngân hàng câu hỏi và các bài thi trắc nghiệm về nghề nghiệp như ôn thi bằng lái xe, trắc nghiệm công viên chức, trắc nghiệm tính cách, MBTI Test, IQ/EQ Test.</p>
                    </div>
                </a>
            </div>
            <div class="carousel-item">
                <a href="Trangchu1.html">
                    <img src="./images/Anh3.jpg"/>
                    <div class="carousel-caption">
                        <h3>Học và Thi</h3>
                        <p>Học và Luyện đề thi chưa bao giờ dễ dàng đến thế</p>
                    </div>
                </a>
            </div>
        </div>
        <a class="carousel-control-prev" href="#slides" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#slides" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    <!--BANNER-->
    <div class="banner">
        <div class="middle">
            <h1>TRẮC NGHIỆM ONLINE</h1>
            <p>ĐA DẠNG - THÔNG MINH - CHÍNH XÁC</p>
        </div>
    </div>
    <!--FEATURED LIST-->
    <section class="featued-list" id="featued-list">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-3 col-sm-12 relative hover-link">
                    <div class="shadow-box">
                        <div class="img"><img src="./images/feature1.jpg" alt="Đề thi học kỳ"/></div>
                        <h3>Đề thi học kỳ</h3>
                        <p>Ngân hàng câu hỏi đầy đủ các môn cấp 1,2,3 được trộn tạo đề theo cấu trúc phân loại giúp các em dễ dàng ôn tập online đề thi giữa học kỳ, thi học kỳ theo các chủ đề đã học.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-sm-12 relative hover-link" >
                    <div class="shadow-box">
                        <div class="img"><img src="./images/feature2.jpg" alt="Đề thi THPT QG"/></div>
                        <h3>Đề thi THPT QG</h3>
                        <p>Tổng hợp đề thi trắc nghiệm online THPT QG của các môn Toán, Tiếng Anh, Vật lý, Hóa học, Sinh học, Địa lý, Lịch sử, GDCD kèm đáp án và lời giải chi tiết.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-sm-12 relative hover-link" >
                    <div class="shadow-box">
                        <div class="img"><img src="./images/feature3.jpg" alt="Đề kiểm tra"/></div>
                        <h3>Đề kiểm tra</h3>
                        <p>Hệ thống bài kiểm tra 1 tiết, kiểm tra 15 phút được thiết kế theo hình thức trắc nghiệm online giúp học sinh có thể tạo ra đề tự luyện tập và chấm điểm trực tuyến.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="page-footer font-small special-color-dark pt-4">
        <div class="container">
            <ul class="list-unstyled list-inline text-center">
                <li class="list-inline-item">
                    <a class="btn-floating btn-fb mx-1">
                        <i class="fab fa-facebook-f"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-tw mx-1">
                        <i class="fab fa-twitter"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-gplus mx-1">
                        <i class="fab fa-google-plus-g"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-li mx-1">
                        <i class="fab fa-linkedin-in"> </i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="btn-floating btn-dribbble mx-1">
                        <i class="fab fa-dribbble"> </i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer-copyright text-center py-3">
            <a> TỰ LÀM NHIỀU BÀI TẬP CHƯA CHẮC ĐẠT ĐIỂM CAO
                THEO HỌC CÙNG THẦY CÔ GIỎI CHẮC CHẮN KHÔNG BỊ ĐIỂM THẤP </a>
        </div>
    </footer>
@endsection



