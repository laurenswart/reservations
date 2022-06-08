
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
                    <li class=""><a href="{{ route('manage-user') }}"><i class="ti-more"></i>Manage Users</a></li>

                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Roles</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="{{ route('manage-role') }}"><i class="ti-more"></i>Manage roles</a></li>

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
                    <span>Import Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.import.view') }}"><i class="ti-more"></i>Upload File</a></li>
                    <li><a href="{{ route('admin.apiIndex') }}"><i class="ti-more"></i>Theatre API</a></li>
                </ul>
                
            </li>
            <li>
                <a href="{{ route('admin.export.view') }}">
                    <i data-feather="grid"></i>
                    <span>Export Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
            </li>

        </ul>
        
    </section>

    <div class="sidebar-footer">
       
        <!-- item-->
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <a href="#" onclick="event.preventDefault();this.closest('form').submit();"><i class="ti-lock"></i></a>
        </form>
    </div>
</aside>
