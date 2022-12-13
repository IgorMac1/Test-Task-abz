<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

<h2>{{Auth::user()->full_name}}</h2>
        <li class="nav-header">ADMIN PANEL</li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far  "></i>
                <p>
                    Users
                    <i class="fas fa-angle-left right "></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item ">
                    <a href="{{route('user.table')}}" class="nav-link ">
                        <i class="far   nav-icon   "></i>
                        <p>All Users</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('user.create')}}" class="nav-link">
                        <i class="far  nav-icon"></i>
                        <p>Add User</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far  "></i>
                <p>
                    Professions
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('profession.table')}}" class="nav-link">
                        <i class="far  nav-icon"></i>
                        <p>All Profession</p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('profession.create')}}" class="nav-link">
                        <i class="far  nav-icon"></i>
                        <p>Add Profession</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
