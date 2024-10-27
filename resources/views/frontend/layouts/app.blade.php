<!DOCTYPE html>
<html class="no-js" lang="en">
@include('frontend.include.head')

<body class="sticky-header">
<a href="#main-wrapper" id="backto-top" class="back-to-top">
    <i class="fas fa-angle-double-up"></i>
</a>
<div id="preloader"></div>
<div id="main-wrapper" class="main-wrapper">
    @include('frontend.include.header')
    {{$slot}}
    @include('frontend.include.footer')
</div>
@include('frontend.include.script')
</body>
</html>
