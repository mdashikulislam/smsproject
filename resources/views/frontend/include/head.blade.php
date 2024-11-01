<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>{{ @$seoTitle}} | {{env('APP_NAME')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @if(isset($seoDescription))
        <meta name="description" content="{{$seoDescription}}">
    @endif
    @if(isset($seoKeyword))
        <meta name="keywords" content="{{$seoKeyword}}">
    @endif
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="{{asset('frontend/assets/images/favicon.png')}}"
    />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.1/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/slick-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/sal.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/assets/css/app.css')}}" />
    @livewireStyles
    @stack('style')
</head>
