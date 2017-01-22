
<div class=" {{ $extra_class or '' }} home-list">

    <div class="">
        <h4>{{ $section_title }}</h4>
    </div>

    <div class="list-group">
        @foreach ($posts as $post)
          <a href="{{ route('posts.show', [$post->id]) }}" target="_blank" class="list-group-item">
            <h4 class="list-group-item-heading">
                {{ $post->title }}
            </h4>
            <p class="list-group-item-text">
                {{ $post->excerpt }}
            </p>
          </a>
        @endforeach
    </div>

</div>
