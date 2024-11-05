<div class="horizontal-menu">
    <nav class="navbar top-navbar">
        <div class="container-fluid">
            <div class="navbar-content">
                <a href="#" class="navbar-brand">
                    Noble<span>UI</span>
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="profile">
                        </a>
                        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                <div class="mb-3">
                                    <img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
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
                                @livewire('admin.component.logout')

                            </ul>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                    <i data-feather="menu"></i>
                </button>
            </div>
        </div>
    </nav>
    <nav class="bottom-navbar">
        <div class="container-fluid">
            <ul class="nav page-navigation">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.dashboard')}}">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:navigate class="nav-link" href="{{route('admin.customers')}}">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="menu-title">Customers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:navigate  href="{{route('admin.phone-number-list')}}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="menu-title">Phone Number List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:navigate  href="{{route('admin.single-service')}}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="menu-title">Single Service</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:navigate  href="{{route('admin.cms')}}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="menu-title">Cms</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a wire:navigate  href="{{route('admin.message-list')}}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="menu-title">Message List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="link-icon" data-feather="inbox"></i>
                        <span class="menu-title">Access Control</span>
                        <i class="link-arrow"></i>
                    </a>
                    <div class="submenu">
                        <ul class="submenu-item">
                            <li class="nav-item">
                                <a wire:navigate href="{{route('admin.access-control.manage-role')}}" class="nav-link">Manage Role</a>
                            </li>
                            <li class="nav-item">
                                <a wire:navigate href="{{route('admin.access-control.manage-admin')}}" class="nav-link">Manage Admin</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>


{{--<div class="horizontal-menu">--}}
{{--    <nav class="navbar top-navbar" >--}}
{{--        <a href="#" class="sidebar-toggler">--}}
{{--            <i data-feather="menu"></i>--}}
{{--        </a>--}}
{{--        <div class="navbar-content">--}}
{{--            <ul class="navbar-nav">--}}
{{--                <li class="nav-item dropdown" >--}}
{{--                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        <img class="wd-30 ht-30 rounded-circle" src="{{asset('admin/assets/images/others/placeholder.jpg')}}" alt="profile">--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu p-0" aria-labelledby="profileDropdown" >--}}
{{--                        <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">--}}
{{--                            <div class="mb-3">--}}
{{--                                <img class="wd-80 ht-80 rounded-circle" src="{{asset('admin/assets/images/others/placeholder.jpg')}}" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="text-center">--}}
{{--                                <p class="tx-16 fw-bolder">{{auth()->user()->name}}</p>--}}
{{--                                <p class="tx-12 text-muted">{{auth()->user()->email}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <ul class="list-unstyled p-1" >--}}
{{--                            @livewire('admin.component.logout')--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--    <nav class="sidebar" >--}}
{{--        <div class="sidebar-header">--}}
{{--            <a  href="{{route('index')}}"  class="sidebar-brand">--}}
{{--                Noble<span>UI</span>--}}
{{--            </a>--}}
{{--            <div class="sidebar-toggler not-active">--}}
{{--                <span></span>--}}
{{--                <span></span>--}}
{{--                <span></span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="sidebar-body">--}}
{{--            <ul class="nav">--}}
{{--                <li class="nav-item">--}}
{{--                    <a wire:navigate  href="{{route('admin.dashboard')}}" class="nav-link">--}}
{{--                        <i class="link-icon" data-feather="box"></i>--}}
{{--                        <span class="menu-title">Dashboard</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a wire:navigate  href="{{route('admin.phone-number-list')}}" class="nav-link">--}}
{{--                        <i class="link-icon" data-feather="box"></i>--}}
{{--                        <span class="menu-title">Phone Number List</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a wire:navigate  href="{{route('admin.single-service')}}" class="nav-link">--}}
{{--                        <i class="link-icon" data-feather="box"></i>--}}
{{--                        <span class="menu-title">Single Service</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a wire:navigate  href="{{route('admin.message-list')}}" class="nav-link">--}}
{{--                        <i class="link-icon" data-feather="box"></i>--}}
{{--                        <span class="link-title">Message List</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link"  data-bs-toggle="collapse" href="#charts" role="button" aria-expanded="false" aria-controls="charts">--}}
{{--                        <i class="link-icon" data-feather="pie-chart"></i>--}}
{{--                        <span class="link-title">Access Control</span>--}}
{{--                        <i class="link-arrow" data-feather="chevron-down"></i>--}}
{{--                    </a>--}}
{{--                    <div class="collapse" id="charts">--}}
{{--                        <ul class="nav sub-menu">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a wire:navigate href="{{route('admin.access-control.manage-role')}}" class="nav-link">Manage Role</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a wire:navigate href="{{route('admin.access-control.manage-admin')}}" class="nav-link">Manage Admin</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--</div>--}}
