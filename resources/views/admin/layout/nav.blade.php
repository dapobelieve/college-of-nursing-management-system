<div id="sidebar">
    <ul>
        @php
            if (!isset($section)) $section = '';
            if (!isset($sub_section)) $sub_section = '';
        @endphp

        <li @if ($section == 'dashboard') class="active" @endif><a href="/admin">
            <i class="fa fa-home"></i> <span>Dashboard</span></a>
        </li>

        <!-- News section -->
        <li class="submenu @if ($section == 'news') active @endif @if (collect(['all', 'create'])->contains($sub_section)) open @endif">
            <a href="#"><i class="fa fa-bullhorn"></i> <span>News</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li @if ($sub_section == 'all') class="active" @endif><a href="/admin/news">All Posts</a></li>
                <li @if ($sub_section == 'create') class="active" @endif><a href="/admin/create-post">Create New Post</a></li>
            </ul>
        </li>

        <li @if ($section == 'students') class="active" @endif><a href="/admin/students">
            <i class="fa fa-group"></i> <span>Students</span></a>
        </li>

        <li @if ($section == 'admins') class="active" @endif><a href="/admin/admins">
            <i class="fa fa-group"></i> <span>Admins</span></a>
        </li>

        <li @if ($section == 'roles') class="active" @endif><a href="/admin/roles">
            <i class="fa fa-group"></i> <span>Roles</span></a>
        </li>

        <li @if ($section == 'settings') class="active" @endif><a href="/admin/settings">
            <i class="fa fa-cog"></i> <span>System Settings</span></a>
        </li>
    </ul>
</div>
