@extends('layouts.app')
@section('content')

<form action="{{ route('crop.store') }}" method="post">
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex">
                        <h2>Crate Crop</h2>
                        <a class="btn btn-danger btn-sm ms-auto" href="{{ route('home') }}">BACK</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration</label>
                            <input type="number" class="form-control" name="duration" id="duration" placeholder="Duration">
                        </div>
                        <div class="mb-3">
                            <label for="acrerange" class="form-label">Acre Range</label>
                            <input type="number" class="form-control" name="acrerange" id="acrerange" placeholder="Acre Range">
                        </div>
                        <div class="mb-3">
                            <label for=note" class="form-label">Note</label>
                            <textarea class="form-control" name="note" id="note" rows="3"placeholder="Write note heare..."></textarea>
                        </div>
                        <div class="mb-3">
                           <button class="btn btn-success btn-sm" type="submit" >Create Crop</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection
