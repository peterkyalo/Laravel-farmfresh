<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnimal" aria-expanded="true"
        aria-controls="collapseAnimal">
        <i class="fas fa-fw fa-paw"></i>
        <span>Animal</span>
    </a>
    <div id="collapseAnimal" class="collapse" aria-labelledby="headingAnimal" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.animal.create') }}">Add Animal</a>
            <a class="collapse-item" href="{{ route('admin.animal.index') }}">Show Animals</a>
        </div>
    </div>
</li>
