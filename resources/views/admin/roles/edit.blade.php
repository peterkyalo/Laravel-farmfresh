<x-admin-master>
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
                    <div class="card  shadow-lg">
                        <div class="card-header d-flex">
                            <h4>Update Role</h4>
                            <a class="btn btn-danger btn-sm ms-auto" href="{{ route('admin.roles.index') }}">Role
                                Index</a>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.roles.update', $role) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Role Name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" value="{{ $role->name }}" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-success btn-sm" type="submit">Update Role</button>
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
                            <h4>Asigned Permissions</h4>
                        </div>
                        <div class="card-body">

                            <div class="mb-3 d-flex">
                                @if ($role->permissions)
                                    @forelse ($role->permissions as $role_permission)
                                        <form
                                            action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}"
                                            onsubmit="return confirm('Are you sure you want to delete?'); " method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm mr-2" type="submit">
                                                {{ $role_permission->name }}
                                            </button>
                                        </form>
                                    @empty
                                        <span>Role has no ermission</span>
                                    @endforelse
                                @endif
                            </div>

                            <form action="{{ route('admin.roles.permissions', $role) }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="permission" class="form-label">{{ __('Permissions') }}</label>
                                    <select class="form-select" id="permission" name="permission" multiple
                                        aria-label="multiple select example">
                                        @foreach ($permissions as $permission)
                                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-success btn-sm" type="submit">Assign Permission</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-admin-master>
