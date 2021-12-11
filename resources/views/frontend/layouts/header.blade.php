<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-branch" href="trangchu1.html">
            <img src="./images/logo.jpg." height="70"/>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        TRANG CHỦ
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/gioi-thieu" class="nav-link">
                        GIỚI THIỆU
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/lop-hoc" class="nav-link">
                        LỚP HỌC
                    </a>
                </li>
                <li class="nav-item">
                    @if(Auth::check())
                        <a href="{{ route('frontend.baithi') }}" class="nav-link">
                            BÀI THI
                        </a>
                    @else
                        <a href="{{ route('frontend.login') }}" class="nav-link">
                            BÀI THI
                        </a>
                    @endif
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            @if(Auth::check())
                <a href="">{{ Auth::user()->name }}</a>
            @else
                <a href="{{ route('frontend.login') }}" class="login" >Đăng nhập</a>
            @endif
        </div>
    </div>
</nav>
