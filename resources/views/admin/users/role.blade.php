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
                            <h4>User Details</h4>
                            <a class="btn btn-danger btn-sm ms-auto" href="{{ route('admin.users.index') }}">User
                                Index</a>
                        </div>
                        <div class="card-body">
                            <div>Username: {{ $user->name }}</div>
                            <div>Email: {{ $user->email }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-start mt-2">
                <div class="col-md-6">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4>Roles</h4>
                        </div>
                        <div class="card-body">

                            <div class="mb-3 d-flex">
                                @if ($user->roles)
                                    @forelse ($user->roles as $user_role)
                                        <form action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
                                            onsubmit="return confirm('Are you sure you want to delete?'); " method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm mr-2" type="submit">
                                                {{ $user_role->name }}
                                            </button>
                                        </form>
                                    @empty
                                        <span>Permission has no role</span>
                                    @endforelse
                                @endif
                            </div>

                            <form action="{{ route('admin.users.roles', $user->id) }}" method="post">
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

            <div class="row justify-content-start mt-2">
                <div class="col-md-6">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4>Permissions</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 d-flex">
                                @if ($user->permissions)
                                    @forelse ($user->permissions as $user_permission)
                                        <form
                                            action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                                            onsubmit="return confirm('Are you sure you want to delete?'); " method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm mr-2" type="submit">
                                                {{ $user_permission->name }}
                                            </button>
                                        </form>
                                    @empty
                                        <span>Role has no ermission</span>
                                    @endforelse
                                @endif
                            </div>

                            <form action="{{ route('admin.users.permissions', $user->id) }}" method="post">
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
