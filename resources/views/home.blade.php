@extends('layouts.default')

@section('content')
    <div class="row add-top">
        <article class="col-md-9 pic-block big-block">
            <a class="shodow-box" href="{{ route('posts.show', [$big_banner->id]) }}">
                <img class="img-responsive" alt="{{ $big_banner->title }}" src="{{ img_crop($big_banner->cover, 1024, 546) }}" />
                <div class="pic-header">
                    <h2>{{ $big_banner->title }}</h2>
                    <p>{{ $big_banner->excerpt }}<p>
                </div>
            </a>
        </article>

        @foreach ($side_banner as $post)
            <article class="col-md-3 pic-block side-banner">
                <a class="shodow-box" href="{{ route('posts.show', [$post->id]) }}">
                    <img class="img-responsive" src="{{ img_crop($post->cover, 720, 376) }}" alt="{{ $post->title }}"/>
                    <h4>{{ $post->title }}</h4>
                </a>
            </article>
        @endforeach

    </div>

    <div class="row add-top add-subscribe">

        <div class="col-md-6 pic-block">
            <div class="shodow-box">
                @include('layouts.partials.weekly_card')
            </div>
        </div>

        <article class="col-md-3 pic-block">
            <div class="shodow-box" >
                <img class="img-responsive" alt="" title="" src="/assets/images/qrcode_new.png" />
                <h4 class="text-center">扫码关注微信订阅号</h4>
            </div>
        </article>

        <article class="col-md-3 pic-block">
            <a class="shodow-box" href="http://estgroupe.com">
                <img class="img-responsive" alt="" title="" src="https://dn-phphub.qbox.me/uploads/images/201612/18/1/l7WfKh5n3T.jpg" />
            </a>
        </article>
    </div>

    @if (count($posts['news_posts']) > 0)
        @include('_home_cell', ['section_title' => '最新资讯', 'posts' => $posts['news_posts'], 'category_id' => 1])
    @endif
    @if (count($posts['tutorials_posts']) > 0)
        @include('_home_cell', ['section_title' => '开发技巧', 'posts' => $posts['tutorials_posts'], 'category_id' => 2])
    @endif
    @if (count($posts['packages_posts']) > 0)
        @include('_home_cell', ['section_title' => '扩展推荐', 'posts' => $posts['packages_posts'], 'category_id' => 3])
    @endif
    @if (count($posts['meetup']) > 0)
        @include('_home_cell', ['section_title' => '线下聚会', 'posts' => $posts['meetup'], 'category_id' => 6])
    @endif
    @if (count($posts['resources_posts']) > 0)
        @include('_home_cell', ['section_title' => '资源推荐', 'posts' => $posts['resources_posts'], 'category_id' => 4, 'extra_class' => 'add-margin-bottom'])
    @endif

@endsection
