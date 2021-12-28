@include('dashboard_includes.header')
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60"
             width="60">
    </div>
    @include('dashboard_includes.navbar')
    @include('dashboard_includes.sidebar')
    <div class="content-wrapper" style="min-height: 912px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">  @yield('navigation')  </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                    @yield('content')

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>

</div>


@livewireScripts
@include('dashboard_includes.footer')
@yield('scripts')

</body>
</html>
