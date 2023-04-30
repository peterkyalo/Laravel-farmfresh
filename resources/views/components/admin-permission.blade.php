<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePermission"
        aria-expanded="true" aria-controls="collapsePermission">
        <i class="fas fa-fw fa-key"></i>
        <span>Permissions</span>
    </a>
    <div id="collapsePermission" class="collapse" aria-labelledby="headingPermission" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.permissions.create') }}">Add Permission</a>
            <a class="collapse-item" href="{{ route('admin.permissions.index') }}">Show Permissions</a>
        </div>
    </div>
</li>
