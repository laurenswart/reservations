
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">

                        {{-- <img src="{{ asset('backend/images/logo-dark.png') }}" alt=""> --}}
                        <h3><b>Reservations</b> Admin</h3>

                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="">
                <a href="{{ url('admin/dashboard')}}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Users</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{ route('manage-user') }}"><i class="ti-more"></i>Manage Shows</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i data-feather="mail"></i> <span>Category</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{ route('manage-category') }}"><i class="ti-more"></i>All Category</a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Shows</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{ route('admin-show-add') }}"><i class="ti-more"></i>Add Shows</a></li>
                    <li class=""><a href="{{ route('manage-show') }}"><i class="ti-more"></i>Manage Shows</a></li>

                </ul>
            </li>

            <li class="treeview ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Localities</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <a href="{{route('add_locality')}}"><li class=""><i class="ti-more"></i>add locality</a></li>
                    <a href="{{route('localities_index')}}"><li class=""><i class="ti-more"></i>Localities</a></li>

                </ul>
            </li>
            <li class="treeview ">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Representations</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <a href="{{ route('manage-representations')  }}"><li class=""><i class="ti-more"></i>Manage representations</a></li>
                    <a href="{{ route('admin-representation-add') }}"><li class=""><i class="ti-more"></i>Add representations</a></li>
                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Import Shows</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Upload File</a></li>
                    <li><a href="{{ route('admin.apiIndex') }}"><i class="ti-more"></i>Theatre API</a></li>
                </ul>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
