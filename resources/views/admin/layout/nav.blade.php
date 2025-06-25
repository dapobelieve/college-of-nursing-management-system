<div id="sidebar">
    <ul>
        @php
            if (!isset($section)) $section = '';
            if (!isset($sub_section)) $sub_section = '';
            $permission_level = ['super' => 3, 'intermediate' => 2, 'basic' => 1][Auth::user()->admin->permission_level];
        @endphp


        <li @if ($section == 'dashboard') class="active" @endif><a href="/admin">
            <i class="fa fa-home"></i> <span>Dashboard</span></a>
        </li>

        @if ($permission_level >= 2)
        <li class="submenu">
            <a href="#"><i class="fa fa-group"></i> <span>Lecturers</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li><a href="{{route('lecturers.index')}}">All Lecturers</a></li>
                <li><a href="{{route('lecturers.create')}}">Add Lecturer</a></li>
            </ul>
        </li>
        @endif

        <li class="submenu @if ($section == 'applicants') active @endif @if (collect(['all', 'all2', 'create', 'add'])->contains($sub_section) & $section == 'applicants') open @endif">
            <a href="#"><i class="fa fa-group"></i> <span>Applicants</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li @if ($sub_section == 'all') class="active" @endif><a href="{{route('applicants.index')}}">View Applicants</a></li>
                @if ($permission_level >= 3)
                  <li @if ($sub_section == 'add') class="active" @endif><a href="{{route('applicants.addresult')}}">Applicant's Result</a></li>
                  @endif
            </ul>
        </li>

        <li class=" submenu @if ($section == 'students') active @endif @if (collect(['all', 'create'])->contains($sub_section) & $section == 'students') open @endif">
            <a href="#"><i class="fa fa-group"></i> <span>Students</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                @if ($permission_level >= 2)
                <li @if ($sub_section == 'all') class="active" @endif><a href="{{route('students.index')}}">All Student</a></li>
                @endif
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

        <!-- Event section -->
        @if ($permission_level >= 1)
        <li class="submenu @if ($section == 'events') active @endif @if (collect(['all', 'create'])->contains($sub_section) & $section == 'events') open @endif">
            <a href="#"><i class="fa fa-bell"></i> <span>Events</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li @if ($sub_section == 'all') class="active" @endif><a href="{{route('events.index')}}">All Events</a></li>
                <li @if ($sub_section == 'create') class="active" @endif><a href="{{route('events.create')}}">Create New Event</a></li>

            </ul>
        </li>
        @endif

        @if ($permission_level >= 3)
        <li class="submenu @if ($section == 'cardapplicants') active @endif @if (collect(['all', 'all2', 'create'])->contains($sub_section) & $section == 'cardapplicants') open @endif">
            <a href="#"><i class="fa fa-briefcase"></i> <span>Admission Cards</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li @if ($sub_section == 'all') class="active" @endif><a href="{{route('cardapplicants.index')}}">Used Cards</a></li>
                <li @if ($sub_section == 'all2') class="active" @endif><a href="{{route('cardapplicants.index3')}}">Available Cards</a></li>
                <li @if ($sub_section == 'create') class="active" @endif><a href="{{route('cardapplicants.create')}}">Add Card</a></li>
            </ul>
        </li>

        <li class="submenu @if ($section == 'cards') active @endif @if (collect(['all', 'all2', 'create'])->contains($sub_section) & $section == 'cards') open @endif">
            <a href="#"><i class="fa fa-briefcase"></i> <span>Cards</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li @if ($sub_section == 'all') class="active" @endif><a href="{{route('cards.index')}}">Used Cards</a></li>
                <li @if ($sub_section == 'all2') class="active" @endif><a href="{{route('cards.index2')}}">Available Cards</a></li>
                <li @if ($sub_section == 'create') class="active" @endif><a href="{{route('cards.create')}}">Add Card</a></li>
            </ul>
        </li>
        @endif

        <li class="submenu">
            <a href="#"><i class="fa fa-book"></i> <span>Courses</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li><a href="{{route('courses.index')}}">All Courses</a></li>
                @if ($permission_level >= 2)
                    <li><a href="{{route('courses.create')}}">Add Course</a></li>
                @endif
            </ul>
        </li>

        <li class="submenu">
            <a href="#"><i class="fa fa-book"></i> <span>Departments</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li><a href="{{route('departments.index')}}">All Departments</a></li>
                @if ($permission_level >= 2)
                    <li><a href="{{route('departments.create')}}">Add Department</a></li>
                @endif
            </ul>
        </li>

        @if ($permission_level >= 2)
        <!-- Fees -->
        <li class="submenu @if ($section == 'fees') active @endif @if (collect(['all', 'create'])->contains($sub_section) & $section == 'fees') open @endif">
            <a href="#"><i class="fa fa-btc"></i> <span>Fees</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li @if ($sub_section == 'all' & $section == 'fees') class="active" @endif><a href="{{route('fees.index')}}">All Fees</a></li>
                <li @if ($sub_section == 'create' & $section == 'fees') class="active" @endif><a href="{{route('fees.create')}}">Add New Fee</a></li>
            </ul>
        </li>
        @endif

        @if ($permission_level == 3 or $permission_level == 1)
        <!-- Accounting -->
        <li class="submenu @if ($section == 'account') active @endif @if (collect(['all', 'allAdmission'])->contains($sub_section) & $section == 'accounting') open @endif">
            <a href="#"><i class="fa fa-money"></i> <span>Accounting Section</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li @if ($sub_section == 'all' & $section == 'accounting') class="active" @endif><a href="{{route('accounting.index')}}">School Fees</a></li>
                <li @if ($sub_section == 'allAdmission' & $section == 'accounting') class="active" @endif><a href="{{route('accounting.indexAdmission')}}">Admission Fee</a></li>
            </ul>
        </li>
        @endif

        @if ($permission_level >= 3)
        <!-- Admins section -->
        <li class="submenu @if ($section == 'admins') active @endif @if (collect(['all', 'create'])->contains($sub_section) & $section == 'admins') open @endif">
            <a href="#"><i class="fa fa-group"></i> <span>Admins</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li @if ($sub_section == 'all' & $section == 'admins') class="active" @endif><a href="{{route('admins.index')}}">All Admins</a></li>
                <li @if ($sub_section == 'create' & $section == 'admins') class="active" @endif><a href="{{route('admins.create')}}">Create New Admin</a></li>
            </ul>
        </li>

        <li @if ($section == 'roles') class="active" @endif><a href="/admin/roles">
            <i class="fa fa-tasks"></i> <span>Roles</span></a>
        </li>

        <li @if ($section == 'settings') class="active" @endif><a href="/admin/settings">
            <i class="fa fa-cogs"></i> <span>System Settings</span></a>
        </li>
        @endif

        <li><a href="{{url('logout')}}">
            <i class="fa fa-home"></i> <span>Logout</span></a>
        </li>
    </ul>
</div>
