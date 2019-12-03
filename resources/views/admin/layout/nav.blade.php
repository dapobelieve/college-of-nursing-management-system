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

        <li class="submenu @if ($section == 'applicants') active @endif @if (collect(['all', 'all2', 'create'])->contains($sub_section) & $section == 'applicants') open @endif">
            <a href="#"><i class="fa fa-book"></i> <span>Applicants</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li @if ($sub_section == 'all') class="active" @endif><a href="{{route('applicants.index')}}">View Applicants</a></li>
            </ul>
        </li>

        <li class=" submenu @if ($section == 'students') active @endif @if (collect(['all', 'create'])->contains($sub_section) & $section == 'students') open @endif">
            <a href="#"><i class="fa fa-group"></i> <span>Students</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li @if ($sub_section == 'all') class="active" @endif><a href="{{route('students.index')}}">All Student</a></li>
                <li @if ($sub_section == 'create') class="active" @endif><a href="{{url('admin/students/create')}}">Register Student</a></li>
            </ul>
        </li>

        <!-- News section -->
        <li class="submenu @if ($section == 'news') active @endif @if (collect(['all', 'create'])->contains($sub_section) & $section == 'news') open @endif">
            <a href="#"><i class="fa fa-bullhorn"></i> <span>News</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li @if ($sub_section == 'all') class="active" @endif><a href="{{route('news.index')}}">All Posts</a></li>
                <li @if ($sub_section == 'create') class="active" @endif><a href="{{route('news.create')}}">Create New Post</a></li>

            </ul>
        </li>

        <li class="submenu @if ($section == 'cardapplicants') active @endif @if (collect(['all', 'all2', 'create'])->contains($sub_section) & $section == 'cardapplicants') open @endif">
            <a href="#"><i class="fa fa-book"></i> <span>Admission Cards</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li @if ($sub_section == 'all') class="active" @endif><a href="{{route('cardapplicants.index')}}">Used Cards</a></li>
                <li @if ($sub_section == 'all2') class="active" @endif><a href="{{route('cardapplicants.index3')}}">Available Cards</a></li>
                <li @if ($sub_section == 'create') class="active" @endif><a href="{{route('cardapplicants.create')}}">Add Card</a></li>
            </ul>
        </li>

        <li class="submenu @if ($section == 'cards') active @endif @if (collect(['all', 'all2', 'create'])->contains($sub_section) & $section == 'cards') open @endif">
            <a href="#"><i class="fa fa-book"></i> <span>Cards</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li @if ($sub_section == 'all') class="active" @endif><a href="{{route('cards.index')}}">Used Cards</a></li>
                <li @if ($sub_section == 'all2') class="active" @endif><a href="{{route('cards.index2')}}">Available Cards</a></li>
                <li @if ($sub_section == 'create') class="active" @endif><a href="{{route('cards.create')}}">Add Card</a></li>
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
