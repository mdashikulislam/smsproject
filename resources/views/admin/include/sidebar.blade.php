<nav class="sidebar" >
    <div class="sidebar-header">
        <a  href="{{route('index')}}"  class="sidebar-brand">
            Noble<span>UI</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item">
                <a wire:navigate  href="{{route('admin.dashboard')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a wire:navigate  href="{{route('admin.customers')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Customer List</span>
                </a>
            </li>
            <li class="nav-item">
                <a wire:navigate  href="{{route('admin.phone-number-list')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Phone Number List</span>
                </a>
            </li>
            <li class="nav-item">
                <a wire:navigate  href="{{route('admin.single-service')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Single Service</span>
                </a>
            </li>
            <li class="nav-item">
                <a wire:navigate  href="{{route('admin.cms')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Cms</span>
                </a>
            </li>
            <li class="nav-item">
                <a wire:navigate  href="{{route('admin.message-list')}}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Message List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  data-bs-toggle="collapse" href="#charts" role="button" aria-expanded="false" aria-controls="charts">
                    <i class="link-icon" data-feather="pie-chart"></i>
                    <span class="link-title">Access Control</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="charts">
                    <ul class="nav sub-menu">
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
