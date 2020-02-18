{{--SIDEBAR NAVIGATION--}}
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="/admin"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{asset('admin/users')}}">All Users</a>
                    </li>

                    <li>
                        <a href="{{asset('admin/users/create')}}">Create User</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{asset('admin/posts')}}">All Posts</a>
                    </li>

                    <li>
                        <a href="{{asset('admin/posts/create')}}">Create Post</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Categories<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{asset('admin/categories')}}">All Categories</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Projects<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{asset('admin/projects')}}">All Projects</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>

        </ul>


    </div>
</div>
    <!-- /.sidebar-collapse -->