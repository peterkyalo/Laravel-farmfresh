<x-admin-master>
    @section('content')
        <form action="{{ route('admin.animal.update', $animal->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="container">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h2>Update Animal</h2>
                                <a class="btn btn-danger btn-sm ms-auto" href="{{ route('admin.animal.index') }}">
                                    {{-- <i class="fas fa-fw fa-arrow-left"></i> --}}
                                    Animal Index
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $animal->name }}" name="name" id="name" placeholder="Name"
                                        autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ __('Number') }}</label>
                                    <input type="number" class="form-control @error('number') is-invalid @enderror"
                                        value="{{ $animal->number }}" name="number" id="number"
                                        placeholder="Number of animals">
                                    @error('number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for=note" class="form-label">{{ __("Farmer's Note") }}</label>
                                    <textarea class="form-control @error('note') is-invalid @enderror" name="note" id="note"
                                        rows="3"placeholder="Write note heare...">{{ $animal->note }}</textarea>
                                    @error('note')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-success btn-sm" type="submit">Update Animal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endsection
</x-admin-master>
