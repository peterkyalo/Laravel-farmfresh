<x-admin-master>
    @section('content')
        {{-- Start Message Alert --}}
        @if (Session::has('message'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        {{-- End Message Alert --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">All Permissions</h6>
                <a href="{{ route('admin.permissions.create') }}" class="btn btn-success btn-sm  ms-auto">Create
                    Permission
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Permission ID</th>
                                <th>Permission Name</th>
                                <th>Update</th>
                                <th>Show</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Permission ID</th>
                                <th>Permission Name</th>
                                <th>Update</th>
                                <th>Show</th>
                                <th>Delete</th>
                            </tr>
                        </tfoot>

                        <tbody>
                            @forelse ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    {{-- <td>{{ Str::limit($animal->note, 20, '...')  }}</td> --}}
                                    <td>
                                        {{-- @can('update', $animal) --}}
                                        <a class="btn btn-success btn-sm"
                                            href="{{ route('admin.permissions.edit', $permission) }}">
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
                                        <form action="{{ route('admin.permissions.destroy', $permission) }}"
                                            onsubmit="return confirm('Are you sure you want to delete?');" method="post">
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
