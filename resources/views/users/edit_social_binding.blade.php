@extends('layouts.default')

@section('title')
账号绑定设置_@parent
@stop

@section('content')

<div class="users-show">

  <div class="main-col col-md-9 left-col" style="width:100%">

    <div class="panel panel-default padding-md">

      <div class="panel-body ">

        <h2><i class="fa fa-cog" aria-hidden="true"></i> 账号绑定设置</h2>
        <hr>

        @include('layouts.partials.errors')

        <div class="alert alert-warning">
         绑定多个第三方账号，允许你使用任意一个第三方账号登录同一个本站账号。
        </div>


            {!! csrf_field() !!}


            <div class="form-group">

                <label for="inputEmail3" class="col-sm-3 control-label" style="width: 15%;">注册使用绑定</label>
                <div class="col-sm-9">

                    <a class="btn btn-success login-btn weichat-login-btn {{ $currentUser->register_source == 'wechat' ? '' : 'hide' }}" role="button">
                      <i class="fa fa-weixin"></i>
                      微信
                    </a>

                    <a class="btn btn-info login-btn {{ $currentUser->register_source == 'github' ? '' : 'hide' }}" role="button">
                      <i class="fa fa-github-alt"></i>
                      GitHub
                    </a>

                    <span class="padding-sm">注册时绑定的账号不允许修改</span>

                </div>

              </div>

            <div class="form-group">

                <label for="inputEmail3" class="col-sm-3 control-label" style="width: 15%;margin-top:15px">可用的绑定</label>
                <div class="col-sm-9" style="margin-top:15px">

                    @if($currentUser->register_source != 'wechat')
                    @if($currentUser->wechat_openid)
                    <a href="javascript:void(0);" class="btn btn-success login-btn">
                    @else
                    <a href="{{ URL::route('auth.oauth', ['driver' => 'wechat']) }}" class="btn btn-default login-btn">
                    @endif
                      <i class="fa fa-weixin"></i>
                      微信
                    </a>
                    @endif

                    @if($currentUser->register_source != 'github')
                        @if($currentUser->github_id > 0)
                        <a href="javascript:void(0);" class="btn btn-info login-btn">
                        @else
                        <a href="{{ URL::route('auth.oauth', ['driver' => 'github']) }}" class="btn btn-default login-btn">
                        @endif
                          <i class="fa fa-github-alt"></i>
                           GitHub
                        </a>
                    @endif

                    @if($currentUser->github_id > 0 && $currentUser->wechat_openid)
                        <span class="padding-sm">已完成此账号绑定</span>
                    @else
                        <span class="padding-sm">点击进行账号绑定</span>
                    @endif

                </div>
              </div>
<br>
<br>
      </div>

    </div>
  </div>


</div>




@stop
