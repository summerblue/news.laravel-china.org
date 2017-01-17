@extends('layouts.default')

@section('content')

<div class="row colom-container">

    <div class="col-md-12">
        <div class="category-header">
            <h2 class=" font3"><i class="fa fa-folder-open-o"></i> {{ $user->name }}</h2>
        </div>
    </div>

    <div class="clearfix">

    </div>

    <main class="main-content grid">
        @include('common._posts')
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
