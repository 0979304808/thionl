<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-branch" href="trangchu1.html">
            <img src="{{ asset('/images/logo.jpg') }}" height="70"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="/" class="nav-item-link">
                        TRANG CHỦ
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/gioi-thieu" class="nav-item-link">
                        GIỚI THIỆU
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/lop-hoc" class="nav-item-link">
                        LỚP HỌC
                    </a>
                </li>
                <li class="nav-item">
                    @if(Auth::check())
                        <a href="{{ route('frontend.baithi') }}" class="nav-item-link">
                            BÀI THI
                        </a>
                    @else
                        <a href="{{ route('frontend.login') }}" class="nav-item-link">
                            BÀI THI
                        </a>
                    @endif
                </li>
            </ul>
            <form action="{{ route('frontend.lophoc') }}" method="get" class="form-inline my-2 my-lg-0">
                <input name="q" class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm lớp học..." aria-label="Search" value="{{ request('q') }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
            @if(Auth::check())
                <div id="profile" class="position-relative">
                    <a class="nav-item-link text-white">
                        {{ Auth::user()->name }}
                    </a>
                    <ul style="right: -2px;width: 150px; display: none" id="profile-item" class="pt-1 position-absolute p-0 list-group list-group-flush shadow p-3 mb-5 bg-white rounded">
                        <li class="list-group-item p-0">
{{--                            <a class="text-decoration-none text-body" href="{{ route('frontend.profile') }}">Tài khoản</a>--}}
                        </li>
                        <li class="list-group-item p-0">
                            <a class="text-decoration-none text-body" href="{{ route('frontend.logout') }}">Đăng xuất</a>
                        </li>
                    </ul>
                </div>


            @else
                <a class="nav-item-link " href="{{ route('frontend.login') }}" class="login" >Đăng nhập</a>
            @endif
        </div>
    </div>
</nav>
<script>
    $(document).ready(function (){
        $('#profile').hover(function (){
            $('#profile-item').css('display', 'block');
        },function (){
            $('#profile-item').css('display', 'none');
        });
    })
</script>
