<header class="navbar navbar-fixed-top navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" class="navbar-brand">
                <img src="" alt="Brand">
            </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
                <li>
                    <form action="" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="搜索院校">
                            <button class="btn btn-primary" type="submit">搜索</button>
                        </div>
                    </form>
                </li>
            @else
                <li><a href="/">登陆</a></li>
                <li><a href="{{ route('signup') }}">注册</a></li>
            @endif
        </ul>
    </div>
</header>