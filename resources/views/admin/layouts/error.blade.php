<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <title>@yield('title') | {{env('APP_NAME')}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/core/core.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo2/style.css')}}">
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" />
</head>
<body>
<div class="main-wrapper">
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">
            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
                    <img src="{{asset('admin/assets/images/others/404.svg')}}" class="img-fluid mb-2" alt="404">
                    <h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">@yield('code')</h1>
                    <h4 class="mb-2">@yield('message')</h4>
                    <div class="mt-3">
                        @can('dashboard')
                        <a wire:navigate class="btn btn-primary btn-sm" href="{{route('admin.dashboard')}}">Back to dashboard</a>
                        @endcanany
                        <a class="btn btn-danger text-white btn-sm" href="">Logout</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="{{asset('admin/assets/vendors/core/core.js')}}"></script>
<script src="{{asset('admin/assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('admin/assets/js/template.js')}}"></script>
</body>
</html>
