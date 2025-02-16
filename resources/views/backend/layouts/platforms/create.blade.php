@extends('backend.app')

@section('page-title')
    <div class="title pt-2">
        <h4 class="fw-bold">Create New Platform</h4>
    </div>
@endsection

@section('page-content')
    <div class="content">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Add Platform</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('platforms.store') }}" method="POST">
                    @csrf

                    <!-- Platform Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Platform Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter platform name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check-circle"></i> Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
