<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{@$seoTitle}}| {{env('APP_NAME')}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/core/core.css')}}" data-navigate-track>
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/sweetalert2/sweetalert2.min.css')}}" data-navigate-track>
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/flatpickr/flatpickr.min.css')}}" data-navigate-track>
    <link rel="stylesheet" href="{{asset('admin/assets/fonts/feather-font/css/iconfont.css')}}" data-navigate-track>
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}" data-navigate-track>
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo2/style.css')}}" data-navigate-track>
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" data-navigate-track/>
    @livewireStyles
    @stack('style')
</head>
<body>
<div class="main-wrapper">
    @include('admin.include.sidebar')
    <div class="page-wrapper">
        <nav class="navbar" >
            <a href="#" class="sidebar-toggler">
                <i data-feather="menu"></i>
            </a>
            <div class="navbar-content">
                <ul class="navbar-nav" wire:ignore>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="wd-30 ht-30 rounded-circle" src="" alt="profile">
                        </a>
                        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown" >
                            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                <div class="mb-3">
                                    <img class="wd-80 ht-80 rounded-circle" src="" alt="">
                                </div>
                                <div class="text-center">
                                    <p class="tx-16 fw-bolder">Amiah Burton</p>
                                    <p class="tx-12 text-muted">amiahburton@gmail.com</p>
                                </div>
                            </div>
                            <ul class="list-unstyled p-1">
                                <li class="dropdown-item py-2">
                                    <a href="pages/general/profile.html" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li class="dropdown-item py-2">
                                    <a href="javascript:;" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="edit"></i>
                                        <span>Edit Profile</span>
                                    </a>
                                </li>
                                <li class="dropdown-item py-2">
                                    <a href="javascript:;" class="text-body ms-0">
                                        <i class="me-2 icon-md" data-feather="repeat"></i>
                                        <span>Switch User</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="page-content">
            {{@$slot}}
        </div>
        <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
            <p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
            <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
        </footer>
    </div>
</div>

<script src="{{asset('admin/assets/vendors/core/core.js')}}" data-navigate-track></script>
<script src="{{asset('admin/assets/vendors/flatpickr/flatpickr.min.js')}}" data-navigate-track></script>
<script src="{{asset('admin/assets/vendors/apexcharts/apexcharts.min.js')}}" data-navigate-track></script>
<script src="{{asset('admin/assets/vendors/feather-icons/feather.min.js')}}" data-navigate-track></script>
<script src="{{asset('admin/assets/vendors/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('admin/assets/js/template.js')}}" data-navigate-track></script>
<script src="{{asset('admin/assets/js/dashboard-dark.js')}}" data-navigate-track></script>
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
