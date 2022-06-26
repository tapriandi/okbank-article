<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="icon" type="image/x-icon" href="https://www.okbank.co.id/images/favicon.ico">
    <title>{{ $page['title'] }} | OK Bank</title>

    <meta name="description" content="lorem ipsum">
    <meta name="keywords" content="">

    <meta name="theme-color" content="#BBDAEC">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="fb:app_id" content="FACEBOOK_APP_ID" />


    <meta property="og:site_name" content="OK Bank">
    <meta property="og:title" content="{{ $page['title'] }} | OK Bank">
    <meta property="og:description" content="lorem ipsum">
    <meta property="og:type" content="website">
    <meta property="og:image" content="asset('images/og-image.jpg }}">
    <meta property="og:url" content="{{ Request::url() }}">


    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ Request::url() }}">
    <meta name="twitter:title" content="{{ $page['title'] }}  | OK Bank">
    <meta name="twitter:image" content="">
    <meta name="twitter:description" content="">

    {{-- @if(env('APP_ENV') == 'production')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=ID"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'ID');
        </script>
    @endif --}}

    <!-- styling -->
    <link rel="stylesheet" href="{{ asset('css/slick-theme.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/slick.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/tailwind.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('icomoon/style.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/app.min.css')}}" />

</head>

<body>
    <div id="fb-root"></div>
    @include('partials/header-menu')
    @yield('content')
    @include('partials/footer-menu')
    

    <!-- script -->
    <script rel="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js')}}"></script>
    <script rel="text/javascript" src="{{ asset('js/slick.js')}}"></script>
    <!-- <script rel="text/javascript" src="{{ asset('js/app.js')}}"></script> -->
    <script rel="text/javascript" src="{{ asset('js/okbank.js')}}"></script>
</body>

</html>