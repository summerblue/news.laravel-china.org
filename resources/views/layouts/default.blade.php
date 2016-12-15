<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')Laravel 资讯 | Laravel China 出品</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Laravel 最新资讯、精华文章、开发技巧、推荐扩展包、最新 Laravel 职位信息以及 「Laravel China 社区」上的精华讨论。">
    <meta name="author" content="Summer">

    <link rel="shortcut icon" href="/assets/images/favicon.png">

    <link rel="apple-touch-icon" sizes="57x57" href="images/touchicons/apple-touch-icon-57-precomposed" />
    <link rel="apple-touch-icon" sizes="114x114" href="assets/touchicons/apple-touch-icon-114-precomposed" />
    <link rel="apple-touch-icon" sizes="72x72" href="assets/touchicons/apple-touch-icon-72-precomposed" />
    <link rel="apple-touch-icon" sizes="144x144" href="assets/touchicons/apple-touch-icon-144-precomposed" />

    <link rel="stylesheet" href="{{ elixir('assets/css/styles.css') }}">
</head>

<body class="{{ route_class() }}-page">

    @include('layouts.partials.topnav')

    <section class="mastwrap">

        <div class="container">
            @include('error')

            @yield('content')
        </div>

    </section>

    @include('layouts.partials.footer')

    <script src="{{ elixir('assets/js/scripts.js') }}" charset="utf-8"></script>

    @yield('scripts')

    @if (App::environment() == 'production')
		<script>
          ga('create', '{{ getenv('GA_Tracking_ID') }}', 'auto');
          ga('send', 'pageview');
        </script>

		<script>
		// Baidu link submit
		(function(){
		    var bp = document.createElement('script');
		    var curProtocol = window.location.protocol.split(':')[0];
		    if (curProtocol === 'https') {
		        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
		    }
		    else {
		        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
		    }
		    var s = document.getElementsByTagName("script")[0];
		    s.parentNode.insertBefore(bp, s);
		})();
		</script>
        @endif

</body>

</html>
