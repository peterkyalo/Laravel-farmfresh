<x-admin-master>
    @section('content')
    @section('content')
        @if (Session::has('message'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Hey!</strong> {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class=" container">
            <div class="row justify-content-start">
                <div class="col-md-6">
                    <div class="card shadow-lg">
                        <div class="card-header d-flex">
                            <h4>Update Permission</h4>
                            <a class="btn btn-danger btn-sm ms-auto"
                                href="{{ route('admin.permissions.index') }}">Permission
                                Index</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.permissions.update', $permission) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Permission Name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" value="{{ $permission->name }}" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-success btn-sm" type="submit">Update Permission</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row justify-content-start mt-2">
                <div class="col-md-6">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4>Assigned Roles</h4>
                        </div>
                        <div class="card-body">

                            <div class="mb-3 d-flex">
                                @if ($permission->roles)
                                    @forelse ($permission->roles as $permission_role)
                                        <form
                                            action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }}"
                                            onsubmit="return confirm('Are you sure you want to delete?'); " method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm mr-2" type="submit">
                                                {{ $permission_role->name }}
                                            </button>
                                        </form>
                                    @empty
                                        <span>Permission has no role</span>
                                    @endforelse
                                @endif
                            </div>

                            <form action="{{ route('admin.permissions.roles', $permission->id) }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="role" class="form-label">{{ __('Roles') }}</label>
                                    <select class="form-select" id="role" name="role" multiple
                                        aria-label="multiple select example">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-success btn-sm" type="submit">Assign Role</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>
