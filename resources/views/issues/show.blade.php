@extends('layouts.default')

@section('title', '周刊详情 - ')

@section('content')
    <div class="container">
        <article class="col-md-8 col-md-offset-2 bg-white">

            <div class="page-header text-center">
                <h1>{{ $issue->name }}

                    @if ($issue->is_published == 'no')
                        <small>（预览）</small>
                    @endif
                 </h1>
            </div>

            @if (count($posts['news_posts']) > 0)
                @include('issues._issue_post_cell', ['section_title' => '最新资讯', 'posts' => $posts['news_posts'], 'category_id' => 1])
            @endif
            @if (count($posts['tutorials_posts']) > 0)
                @include('issues._issue_post_cell', ['section_title' => '开发技巧', 'posts' => $posts['tutorials_posts'], 'category_id' => 2])
            @endif
            @if (count($posts['packages_posts']) > 0)
                @include('issues._issue_post_cell', ['section_title' => '扩展推荐', 'posts' => $posts['packages_posts'], 'category_id' => 3])
            @endif
            @if (count($posts['meetup']) > 0)
                @include('issues._issue_post_cell', ['section_title' => '线下聚会', 'posts' => $posts['meetup'], 'category_id' => 6])
            @endif
            @if (count($posts['resources_posts']) > 0)
                @include('issues._issue_post_cell', ['section_title' => '资源推荐', 'posts' => $posts['resources_posts'], 'category_id' => 4, 'extra_class' => 'add-margin-bottom'])
            @endif

        </article>
    </div>

@endsection