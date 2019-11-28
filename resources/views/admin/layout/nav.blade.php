<div id="sidebar">
    <ul>
        @php
            if (!isset($section)) $section = '';
            if (!isset($sub_section)) $sub_section = '';
        @endphp

        <li @if ($section == 'dashboard') class="active" @endif><a href="/admin">
            <i class="fa fa-home"></i> <span>Dashboard</span></a>
        </li>
        <li class="submenu">
            <a href="#"><i class="fa fa-book"></i> <span>Lecturers</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li><a href="{{route('lecturers.index')}}">All Lecturers</a></li>
                <li><a href="{{route('lecturers.create')}}">Add Lecturer</a></li>
            </ul>
        </li>
        <!-- News section -->
        <li class="submenu @if ($section == 'news') active @endif @if (collect(['all', 'create'])->contains($sub_section) & $section == 'news') open @endif">
            <a href="#"><i class="fa fa-bullhorn"></i> <span>News</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
<<<<<<< HEAD
                <li @if ($sub_section == 'all') class="active" @endif><a href="{{route('news.index')}}">All Posts</a></li>
                <li @if ($sub_section == 'create') class="active" @endif><a href="{{route('news.create')}}">Create New Post</a></li>
=======
                <li @if ($sub_section == 'all' & $section == 'news') class="active" @endif><a href="{{route('news.index')}}">All Posts</a></li>
                <li @if ($sub_section == 'create' & $section == 'news') class="active" @endif><a href="{{route('news.create')}}">Create New Post</a></li>
>>>>>>> f0431a6eb839c2872426828a3d3824f647bc3bd3
            </ul>
        </li>

        <li class="submenu">
            <a href="#"><i class="fa fa-book"></i> <span>Cards</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li><a href="{{route('cards.index')}}">Used Cards</a></li>
                <li><a href="{{route('cards.index2')}}">Available Cards</a></li>
                <li><a href="{{route('cards.create')}}">Add Card</a></li>
            </ul>
        </li>

        <li class="submenu">
            <a href="#"><i class="fa fa-book"></i> <span>Courses</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li><a href="{{route('courses.index')}}">All Courses</a></li>
                <li><a href="{{route('courses.create')}}">Add Course</a></li>
            </ul>
        </li>
        <li class="submenu">
            <a href="#"><i class="fa fa-book"></i> <span>Departments</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li><a href="{{route('departments.index')}}">All Departments</a></li>
                <li><a href="{{route('departments.create')}}">Add Department</a></li>
            </ul>
        </li>

        <li @if ($section == 'students') class="active" @endif><a href="/admin/students">
            <i class="fa fa-group"></i> <span>Students</span></a>
        </li>

        <!-- Admins section -->
        <li class="submenu @if ($section == 'admins') active @endif @if (collect(['all', 'create'])->contains($sub_section) & $section == 'admins') open @endif">
            <a href="#"><i class="fa fa-group"></i> <span>Admins</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li @if ($sub_section == 'all' & $section == 'admins') class="active" @endif><a href="{{route('admins.index')}}">All Admins</a></li>
                <li @if ($sub_section == 'create' & $section == 'admins') class="active" @endif><a href="{{route('admins.create')}}">Create New Admin</a></li>
            </ul>
        </li>

        <li @if ($section == 'roles') class="active" @endif><a href="/admin/roles">
            <i class="fa fa-group"></i> <span>Roles</span></a>
        </li>

        <li @if ($section == 'settings') class="active" @endif><a href="/admin/settings">
            <i class="fa fa-cog"></i> <span>System Settings</span></a>
        </li>
    </ul>
</div>
