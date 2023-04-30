<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true"
        aria-controls="collapseBlog">
        <i class="fas fa-fw fa-blog"></i>
        <span>Blogs</span>
    </a>
    <div id="collapseBlog" class="collapse" aria-labelledby="headingBlog" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('admin.blog.create') }}">Add Blog</a>
            <a class="collapse-item" href="{{ route('admin.blog.index') }}">Show Blogs</a>
        </div>
    </div>
</li>
