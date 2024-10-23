<!DOCTYPE html>
<html class="no-js" lang="en">
@include('frontend.include.head')

<body class="sticky-header">
<a href="#main-wrapper" id="backto-top" class="back-to-top">
    <i class="far fa-angle-double-up"></i>
</a>

<!-- Preloader Start Here -->
<div id="preloader"></div>

<div id="main-wrapper" class="main-wrapper">
    @include('frontend.include.header')
    @section('content')
    @show
    @include('frontend.include.footer')
</div>

@include('frontend.include.script')
</body>
</html>
