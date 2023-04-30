<x-admin-master>
    @section('content')
        <form action="{{ route('admin.roles.store') }}" method="post" ">
                                                        @csrf
                                                        <div class=" container">
                  <div class="row justify-content-start">
                   <div class="col-md-6">
                    <div class="card shadow-lg">
                     <div class="card-header d-flex">
                      <h4>Crate Role</h4>
                      <a class="btn btn-danger btn-sm ms-auto" href="{{ route('admin.roles.index') }}">Role
                       Index</a>
                     </div>
                     <div class="card-body">
                      <div class="mb-3">
                       <label for="name" class="form-label">{{ __('Role Name') }}</label>
                       <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" autofocus>
                       @error('name')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                       </span>
    @enderror
                      </div>
                      <div class="mb-3">
                       <button class="btn btn-success btn-sm" type="submit">Create Role</button>
                      </div>
                     </div>
                    </div>
                   </div>
                  </div>
                  </div>
                 </form>
@endsection
</x-admin-master>
