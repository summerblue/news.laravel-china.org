@extends('layouts.default')

@section('content')

<div class="row colom-container">

    <div class="col-md-12">
        <div class="category-header">
            <h2 class=" font3"><i class="fa fa-folder-open-o"></i> {{ $category->name }}</h2>
        </div>
    </div>

    <div class="clearfix">

    </div>

    <main class="main-content grid">

        @foreach ($posts as $post)
            <article class="post grid-item">
                <div class="article-wrap">
                    <div class="featured-media">
                        <a href="{{ route('posts.show', [$post->id]) }}">
                            <img src="{{ img_crop($post->cover, 720, 376) }}" alt="{{ $post->title }}">
                        </a>
                    </div>
                    <div class="post-head">
                        <h1 class="post-title"><a href="{{ route('posts.show', [$post->id]) }}">{{ $post->title }}</a></h1>
                    </div>
                    <div class="post-content">
                        <p>{{ $post->excerpt }}</p>
                    </div>

                    <footer class="post-footer clearfix">
                        <div class="pull-left tag-list">
                            <a href="{{ route('categories.show', [$post->category->id]) }}"><i class="fa fa-folder-open-o"></i> {{ $post->category->name }}</a>
                            <a href="{{ $post->user->personal_website }}"><span class="author"><i class="fa fa-user" aria-hidden="true"></i> {{ $post->user->name }}</a></span>
                            <time class="post-date" title="{{ $post->created_at->diffForHumans() }}"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $post->created_at->diffForHumans() }}</time>
                        </div>
                    </footer>
                </div>
            </article>
        @endforeach

    </main>

</div>

@endsection



@section('scripts')
<script type="text/javascript">

    $(document).ready(function()
    {
        $('.grid').masonry({
          // options...
          itemSelector: '.grid-item',
        });
    });

</script>
@stop
