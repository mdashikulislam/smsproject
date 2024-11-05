<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{@$title}} | {{env('APP_NAME')}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/core/core.css')}}" >
    <link rel="stylesheet" href="{{asset('admin/assets/fonts/feather-font/css/iconfont.css')}}" >
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/sweetalert2/sweetalert2.min.css')}}" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" >
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo4/style.css')}}" data-navigate-track>
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" />
    @livewireStyles
    @stack('style')
</head>
<body >
<div class="main-wrapper">
    <div class="page-wrapper">
        @include('admin.include.sidebar')
        <div class="container-fluid pt-3">
            {{@$slot}}
        </div>
        <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
            <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
            <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
        </footer>
    </div>
</div>
<script src="{{asset('admin/assets/vendors/core/core.js')}}" data-navigate-once></script>
<script src="{{asset('admin/assets/vendors/feather-icons/feather.js')}}" ></script>
<script src="{{asset('admin/assets/vendors/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('admin/assets/js/template.js')}}" ></script>
@livewireScripts
<script>
    window.addEventListener('show-modal', event => {
        $(`#${event.detail.id}`).modal('show');
    });
    window.addEventListener('hide-modal', event => {
        $(`#${event.detail.id}`).modal('hide');
    });
    window.addEventListener('toast',event =>{
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: event.detail.type,
            title: event.detail.message
        });
    });
    function bulkDestroy(){
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.Livewire.dispatch('bulkDestroy');
            }
        });
    }
    function confirmDelete(id){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.Livewire.dispatch('delete',[id]);
            }
        });
    }
</script>
@stack('script')
</body>
</html>
