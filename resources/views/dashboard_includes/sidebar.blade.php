<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <p class="brand-link text-center">

        <span class="brand-text font-weight-light text-yellow" style="text-transform:uppercase">{{ auth()->user()->role->name }}</span>
    </p>

    <!-- Sidebar -->
    <div
        class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
        </div>
        <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
        </div>
        <div class="os-content-glue" style="margin: 0px -8px;"></div>
        <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
                <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ auth()->user()->avatarUrl() }}" class="img-circle elevation-2 h-100 "
                                 alt="User Image">
                        </div>
                        <div class="info">
                            <a  class="d-block">{{ auth()->user()->account->full_name }}</a>
                        </div>
                    </div>
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <a href="{{ route('dashboard') }}" class="nav-link active">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>


                            @can('viewAny' , \App\Models\Category::class)
                                <li class="nav-item">
                                    <a href="{{ route('category.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Categories
                                        </p>
                                    </a>
                                </li>
                            @endcan


                                <li class="nav-item">
                                    <a href="{{ route('notification.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-bell"></i>
                                        <p>
                                            Notifications
                                        </p>
                                    </a>
                                </li>


                            @can('viewAny' , \App\Models\Role::class)
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-pen"></i>
                                        <p>
                                            Roles
                                        </p>
                                    </a>
                                </li>
                            @endcan

                            @can('viewAny' , \App\Models\BlockUser::class)
                                <li class="nav-item">
                                    <a href="{{ route('block.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-ban"></i>
                                        <p>
                                            Blocked Users
                                        </p>
                                    </a>
                                </li>
                            @endcan



{{--                            @can('viewAny' , \App\Models\Product::class)--}}

                            <li class="nav-item">
                                <a href="{{ route('product.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-clone"></i>
                                    <p>
                                        Products
                                    </p>
                                </a>
                            </li>
{{--                            @endcan--}}
                            @can('viewAny' , \App\Models\StoppedProduct::class)
                            <li class="nav-item">
                                <a href="{{ route('stopped_product.index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-clone"></i>
                                    <p>
                                        Stopped Products
                                    </p>
                                </a>
                            </li>
                            @endcan




                            @can('viewAny' , \App\Models\Support::class)
                                <li class="nav-item">
                                    <a href="{{ route('support.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-bell"></i>
                                        <p>
                                            Supports
                                        </p>
                                    </a>
                                </li>
                            @endcan

                            @can('viewAny' , \App\Models\Property::class)
                                <li class="nav-item">
                                    <a href="{{ route('property.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-project-diagram"></i>
                                        <p>
                                            Properties
                                        </p>
                                    </a>
                                </li>
                            @endcan

                            @can('viewAny' ,\App\Models\ReportUser::class )
                                <li class="nav-item">
                                    <a href="{{ route('report_user.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-flag"></i>
                                        <p>
                                            Users Reports
                                        </p>
                                    </a>
                                </li>
                            @endcan

                            @can('viewAny' , \App\Models\ReportProduct::class)
                                <li class="nav-item">
                                    <a href="{{ route('report_product.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-flag"></i>
                                        <p>
                                            Products Reports
                                        </p>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 64.8489%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar-corner"></div>
    </div>
    <!-- /.sidebar -->
</aside>


