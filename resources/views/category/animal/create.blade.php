<x-admin-master>
    @section('content')
        <form action="{{ route('admin.animal.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h2>Crate Animal</h2>
                                <a class="btn btn-danger btn-sm ms-auto" href="{{ route('admin.index') }}">BACK</a>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('Name') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" placeholder="Name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ __('Number') }}</label>
                                    <input type="number" class="form-control @error('number') is-invalid @enderror"
                                        name="number" id="number" placeholder="Number of animals">
                                    @error('number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for=note" class="form-label">{{ __("Farmer's Note") }}</label>
                                    <textarea class="ckeditor form-control @error('note') is-invalid @enderror" name="note" id="note"
                                        rows="3"placeholder="Write note heare..."></textarea>

                                    @error('content')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-success btn-sm" type="submit">Create Animal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endsection
</x-admin-master>
