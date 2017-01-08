@extends('layouts.default')

@section('title')
{{ isset($post) ? '编辑文章' : '新建文章' }}_@parent
@stop

@section('content')

<div class="post-composing-box">

      @if (isset($post))
        <form method="POST" action="{{ route('posts.update', $post->id) }}" accept-charset="UTF-8" id="post-create-form">
        <input name="_method" type="hidden" value="PATCH">
      @else
          <form method="POST" action="{{ route('posts.store') }}" accept-charset="UTF-8" id="post-create-form">
      @endif

        @include('error')

        {!! csrf_field() !!}

        <div class="form-group">
            <select class="selectpicker form-control" name="category_id" id="category-select">

              <option value="" disabled {{ count($category) != 0 ?: 'selected' }}>请选择分类</option>
                  @foreach ($categories as $value)
                      <option value="{{ $value->id }}" {{ (count($category) != 0 && $value->id == $category->id) ? 'selected' : '' }} >{{ $value->name }}</option>
                  @endforeach
            </select>
        </div>

        <div class="form-group">
            <input class="form-control" id="post-title" placeholder="文章标题" name="title" type="text" value="{{ old('title') ?: (isset($post) ? $post->title : '') }}">
        </div>

        <div class="form-group">
            <input class="form-control" id="post-title" placeholder="文章封面，请到 laravel-china.org 上随便找个帖子评论框上传图片来获取 HTTPS 的 URL ！" name="cover" type="text" value="{{ old('cover') ?: (isset($post) ? $post->cover : '') }}">
        </div>

        <div class="form-group">
            <textarea class="form-control" placeholder="文章内容" name="body_original" cols="50">{{ old('body_original') ?: (!isset($post) ? '' : $post->body_original) }}</textarea>
        </div>

        <div class="form-group status-post-submit">
            <input class="btn btn-primary" id="post-create-submit" type="submit" value="发布">
        </div>
    </form>

</div>

@stop

@section('scripts')
<script type="text/javascript">
    $(document).ready(function()
    {
        var simplemde = new SimpleMDE({
            spellChecker: false,
            autosave: {
                enabled: true,
                delay: 1,
                unique_id: "topic_content{{ isset($post) ? $post->id : '' }}"
            },
            forceSync: true
        });
    });

</script>
@stop
