<x-admin-master>
    @section('content')
        {{-- Start Message Alert --}}
        @if (session('createMessage'))
            <div class="alert alert-success">
                {{ session('createMessage') }}
            </div>
        @elseif (session('deleteMessage'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Whoops!</strong> {{ session('deleteMessage') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('updateMessage'))
            <div class="alert alert-success">
                {{ session('updateMessage') }}
            </div>
        @endif
        {{-- End Message Alert --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Posts</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Post ID</th>
                                <th>User Name</th>
                                <th>Post Title</th>
                                <th>Post Description</th>
                                <th>Image</th>
                                <th>Update</th>
                                <th>Show</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Post ID</th>
                                <th>User Name</th>
                                <th>Post Title</th>
                                <th>Post Description</th>
                                <th>Image</th>
                                <th>Update</th>
                                <th>Show</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            @forelse ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ $blog->user->name }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ Str::limit($blog->description, 30, '...') }}</td>
                                    <td>
                                        <img src="{{ asset('/storage/' . $blog->image) }}" class="rounded" height="70px"
                                            height="70px" alt="no image">
                                    </td>
                                    {{-- <td>{{ Str::limit($animal->note, 20, '...')  }}</td> --}}
                                    <td>
                                        {{-- @can('update', $animal) --}}
                                        <a class="btn btn-success btn-sm" href="{{ route('admin.blog.edit', $blog->id) }}">
                                            <i class="fas fa-fw fa-pen"></i>
                                            {{-- @endcan --}}
                                    </td>
                                    <td>
                                        {{-- @can('update', $animal) --}}
                                        <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-fw fa-eye"></i>
                                            {{-- @endcan --}}
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">
                                                <i class="fas fa-fw fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        </tbody>
                    @empty
                        <p>Sorry! No Record Found!</p>
                        @endforelse
                        {{--
              @foreach ($animals as $animal)
              <tbody>
                <tr>
                  <td>{{ $animal->id }}</td>
                  <td>{{ $animal->user->name }}</td>
                  <td>{{ $animal->name }}</td>
                  <td>{{ $animal->number }}</td>
                  <td>{{ $animal->note }}</td>
                  <td>Update</td>
                  <td>Delete</td>
                </tr>
              </tbody>
              @endforeach
            --}}
                    </table>
                </div>
            </div>
        </div>
        {{-- {{ $animals->links() }} --}}
    @endsection
</x-admin-master>
