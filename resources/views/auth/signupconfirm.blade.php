@extends('layouts.default')

@section('title')
注册@parent
@stop

@section('content')
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">注册新账号</h3>
        </div>
        <div class="panel-body">

            <form method="POST" action="{{ route('signup') }}" accept-charset="UTF-8">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="name">头像</label>
                    <div class="form-group">
                        <img src="{{ $oauthData['image_url'] }}" width="100%" />
                    </div>
                </div>

                <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
                    <label class="control-label" for="name">用户名</label>
                     <input class="form-control" name="name" type="text" value="{{ $oauthData['name'] ?: '' }}">
                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group {{{ $errors->has('email') ? 'has-error' : '' }}}">
                    <label class="control-label" for="email">Email</label>
                    <input class="form-control" name="email" type="text" value="{{ $oauthData['email'] ?: '' }}">
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>

                <input class="btn btn-lg btn-success btn-block" type="submit" value="确定">
            </form>

        </div>
      </div>
    </div>
  </div>

@stop
