@extends('layouts.default')

@section('title', $post->title . ' | ')

@section('content')
<div class="row colom-container">

    <main class="col-md-9 main-content">

        <article id="70" class="post">

            <section class="featured-media">
                <img src="{{ img_crop($post->cover, 1024, 546) }}" alt="{{ $post->title }}">
            </section>

            <header class="post-head">
                <h1 class="post-title">{{ $post->title }}</h1>
                <section class="post-meta">
                    <time class="post-date" title="{{ $post->created_at }}"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $post->created_at }}</time>
                </section>
            </header>

            <section class="post-content">

{!! $post->body !!}

            </section>

            <footer class="post-footer clearfix">
                <div class="pull-left tag-list">
                    <a href="{{ route('categories.show', [$post->category->id]) }}"><i class="fa fa-folder-open-o"></i> {{ $post->category->name }}</a>

                    @if (Auth::check())
                        | <a href="{{ route('posts.edit', [$post->id]) }}"><i class="fa fa-edit"></i> 修改文章</a>
                    @endif

                </div>

                <div class="pull-right share">
                    <div class="social-share-cs "></div>
                </div>

            </footer>


        </article>

        <div class="about-author clearfix">
            <a href="{{ route('users.show', $post->user->id) }}"><img src="{{ $post->user->avatar }}" alt="{{ $post->user->name }}" class="avatar pull-left"></a>

            <div class="details">
                <div class="author">
                    作者 <a href="{{ route('users.show', $post->user->id) }}">{{ $post->user->name }}</a>
                </div>
                <div class="meta-info">
                    <div class="website"><i class="fa fa-globe"></i><a href="{{ $post->user->personal_website }}" targer="_blank"> 个人中心</a></div>
                    <div class="introduction"><i class="fa fa-paint-brush"></i>
                        {{ $post->user->introduction }}
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white recomanded-box">
            @include('_home_cell', ['section_title' => '推荐阅读', 'posts' => $posts])
        </div>


    </main>

    <aside class="col-md-3 sidebar">
        @include('layouts.partials.sidebar')
    </aside>




</div>

@endsection


@section('scripts')
<script type="text/javascript">

    $(document).ready(function()
    {
        var $config = {
            title               : '{{{ $post->title }}} from Laravel 资讯 #lara资讯',
            wechatQrcodeTitle   : "微信扫一扫：分享", // 微信二维码提示文字
            wechatQrcodeHelper  : '<p>微信里点“发现”，扫一下</p><p>二维码便可将本文分享至朋友圈。</p>',
            sites               : ['weibo','wechat',  'facebook', 'twitter', 'google','qzone', 'qq', 'douban'],
        };

        socialShare('.social-share-cs', $config);
    });

</script>
@stop
