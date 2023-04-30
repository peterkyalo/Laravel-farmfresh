<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRole" aria-expanded="true"
        aria-controls="collapseRole">
        <i class="fas fa-fw fa-fingerprint"></i>
        <span>Roles</span>
    </a>
    <div id="collapseRole" class="collapse" aria-labelledby="headingRole" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.roles.create') }}">Add Role</a>
            <a class="collapse-item" href="{{ route('admin.roles.index') }}">Show Roles</a>
        </div>
    </div>
</li>
