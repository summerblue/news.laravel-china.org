<div class="row add-top-half {{ $extra_class or '' }} home-list">

    <div class="block-header">
        <h2>{{ $section_title }}
            @if (isset($category_id))
                <span class="pull-right read-more">
                    <a href="{{ route('categories.show', [$category_id]) }}"><i class="fa fa-plus" aria-hidden="true"></i> 更多</a>
                </span>
            @endif
        </h2>
    </div>

    @foreach ($posts as $post)
        <article class="col-md-4 pic-block">
            <a class="shodow-box" href="{{ route('posts.show', [$post->id]) }}">
                <img class="img-responsive" alt="{{ $post->title }}" src="{{ img_crop($post->cover, 720, 376) }}"/>
                <h4>{{ $post->title }}</h4>
            </a>
        </article>
    @endforeach

</div>
