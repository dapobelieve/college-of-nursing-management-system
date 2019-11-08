<div id="sidebar">
    {{-- <div id="search">
        <input type="text" placeholder="Search here..."/>
        <button type="submit" class="tip-right" title="Search">
            <i class="fa fa-search"></i>
        </button>
    </div> --}}  
    <ul>
        <li @if ($section == 'dashboard') class="active" @endif><a href="/admin">
            <i class="fa fa-home"></i> <span>Dashboard</span></a>
        </li>

        <li @if ($section == 'news') class="active" @endif><a href="/admin/news">
            <i class="fa fa-bullhorn"></i> <span>News</span></a>
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

        {{-- <li class="submenu">
            <a href="#"><i class="fa fa-flask"></i> <span>UI Lab</span> <i class="arrow fa fa-chevron-right"></i></a>
            <ul>
                <li><a href="interface.html">Interface Elements</a></li>
                <li><a href="jquery-ui.html">jQuery UI</a></li>
                <li><a href="buttons.html">Buttons &amp; icons</a></li>
            </ul>
        </li> --}}

        {{-- <li><a href="tables.html"><i class="fa fa-th"></i> <span>Tables</span></a></li>
        <li><a href="grid.html"><i class="fa fa-th-list"></i> <span>Grid Layout</span></a></li> --}}
    </ul>
</div>