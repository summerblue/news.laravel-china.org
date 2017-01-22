@extends('layouts.default')

@section('title', 'Laravel 周刊 - ')

@section('content')
    <div class="container">
        <article class="col-md-8 col-md-offset-2 bg-white">

            <div class="page-header text-center">
                <h1>Laravel 周刊</h1>
            </div>

            @if($issues->count())
                <div class="list-group">
                    @foreach($issues as $issue)
                        <a class="list-group-item" href="{{ route('issues.show', $issue->id) }}">
                            @if ($issue->is_published == 'no')
                                <span class="badge badge-warning">未发布</span>
                            @endif

                            {{ $issue->name }}
                        </a>
                    @endforeach
                </div>
                {!! $issues->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </article>
    </div>

@endsection