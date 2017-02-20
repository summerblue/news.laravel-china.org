<div class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">
                <span class="main-color text-bold">Laravel</span> 资讯</a>
          </div>

          <div class="navbar-collapse collapse">

            <!-- Left nav -->
            <ul class="nav navbar-nav" data-smartmenus-id="14739838239025269">
              <li><a href="{{ route('categories.show', [1]) }}">新闻</a></li>
              <li><a href="{{ route('categories.show', [2]) }}">教程</a></li>
              <li><a href="{{ route('categories.show', [4]) }}">资源</a></li>
              <li><a href="https://laravel-china.org/">论坛</a></li>
              <li><a href="https://doc.laravel-china.org/docs">文档</a></li>
              <li><a href="https://laravel-china.org/laravel-tutorial/5.1/about">Laravel 教程</a></li>
              <li><a href="{{ route('issues.index') }}">周刊</a></li>
              @if (Auth::check())
                <li><a href="{{ route('posts.create') }}"><i class="fa fa-plus"></i></a></li>
              @endif
            </ul>

            <!-- Right nav -->
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/assets/images/qrcode_new.png" class="icon-wechat">
                            <i class="fa fa-weixin" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a href="http://weibo.com/laravelnews" class="icon-weibo">
                            <i class="fa fa-weibo" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>

                <form method="GET" action="{{ route('search') }}" accept-charset="UTF-8" class="navbar-form navbar-left" target="_blank">
                    <div class="form-group">
                        <input class="form-control search-input mac-style" placeholder="搜索" name="q" type="text">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="search-btn">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>

                </form>
            </div>


          </div><!--/.nav-collapse -->


        </div><!--/.container -->
      </div>
