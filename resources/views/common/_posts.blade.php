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
                    <a href="{{ route('users.show', [$post->user->id]) }}"><span class="author"><i class="fa fa-user" aria-hidden="true"></i> {{ $post->user->name }}</a></span>
                    <time class="post-date" title="{{ $post->created_at->diffForHumans() }}"><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $post->created_at->diffForHumans() }}</time>
                </div>
            </footer>
        </div>
    </article>
@endforeach
