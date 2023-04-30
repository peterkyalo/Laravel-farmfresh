<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true"
        aria-controls="collapseUser">
        <i class="fas fa-fw fa-user"></i>
        <span>Users</span>
    </a>
    <div id="collapseUser" class="collapse" aria-labelledby="headingUser" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.users.index') }}">Add User</a>
            <a class="collapse-item" href="{{ route('admin.users.index') }}">Show Users</a>
        </div>
    </div>
</li>
