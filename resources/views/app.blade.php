<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboarder's Heaven | @yield('title')</title>

    <link rel="stylesheet" href="{{ elixir("css/all.css") }}">
    <link href="//vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
</head>

<body>

@include('partials.nav')

@yield('header')

@yield('content')

@include('partials.footer')

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<script src="{{ elixir("js/all.js") }}"></script>

<script src="//vjs.zencdn.net/4.12/video.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script type="application/javascript">
    $('time').each(function(i, e) {
        var time = moment($(e).attr('datetime'));
        $(e).html(time.fromNow());
    });
</script>
<!-- Not sure if we'll need any of this crap -->
{{--<script src="assets/js/retina-1.1.0.js"></script>--}}
{{--<script src="assets/js/jquery.hoverdir.js"></script>--}}
{{--<script src="assets/js/jquery.hoverex.min.js"></script>--}}
{{--<script src="assets/js/jquery.prettyPhoto.js"></script>--}}
{{--<script src="assets/js/jquery.isotope.min.js"></script>--}}
{{--<script src="assets/js/custom.js"></script>--}}
{{--<script src="assets/js/modernizr.js"></script>--}}
@yield('scripts')

</body>
</html>
