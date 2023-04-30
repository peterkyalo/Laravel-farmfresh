<x-admin-master>
    @section('content')
        <form action="{{ route('admin.blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h2>Edit Blog </h2>
                                <a class="btn btn-danger btn-sm ms-auto" href="{{ route('admin.blog.index') }}">BACK</a>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="title" class="form-label">{{ __('Title') }}</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" id="title" value="{{ $blog->title }}" autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <img src="{{ asset('/storage/' . $blog->image) }}" class="rounded" height="70px"
                                        height="70px" alt="no image">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">{{ __('Image') }}</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" id="image" autofocus>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for=note" class="form-label">{{ __('Description') }}</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                        rows="3">{{ $blog->description }}</textarea>
                                    @error('description')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-success btn-sm" type="submit">Update Blog</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endsection
</x-admin-master>
