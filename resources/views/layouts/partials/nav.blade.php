<div role="navigation" class="navbar navbar-default navbar-static-top topnav">
  <div class="container" style="margin-bottom:10px;">

      <div class="navbar-right">

        <ul class="nav navbar-nav github-login" style="margin-top:10px;">
          @if (Auth::check())
                @if (Auth::user()->can('visit_admin'))
                  <li>
                      <a href="/admin" class="text-md  ">
                          <i class="fa fa-tachometer"></i>
                      </a>
                  </li>
                @endif
              <li style="color:#e2e2e2">
                  <a href="{{route('users.show', $currentUser->id)}}">
                      <img class="avatar-topnav" alt="Summer" src="{{ $currentUser->present()->gravatar }}" style="width:25px;height:25px;margin-right:10px;"/>
                       {{{ $currentUser->name }}}
                  </a>
              </li>
              <li>
                  <a id="login-out" class="button" href="{{ URL::route('logout') }}" data-lang-loginout="你确定要退出吗">
                      <i class="fa fa-sign-out"></i> 退出
                  </a>
              </li>
          @else
              <a href="{{ URL::route('auth.oauth', ['driver' => 'wechat']) }}" class="btn btn-success login-btn weichat-login-btn">
                <i class="fa fa-weixin"></i>
                登录
              </a>

              <a href="{{ URL::route('auth.oauth', ['driver' => 'github']) }}" class="btn btn-info login-btn">
                <i class="fa fa-github-alt"></i>
                登录
              </a>
          @endif
        </ul>
      </div>
    </div>

  </div>
</div>
