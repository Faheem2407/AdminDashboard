@extends('backend.app')

@section('page-title')
    <div class="title pt-2">
        <h4 class="fw-bold">Edit Platform</h4>
    </div>
@endsection

@section('page-content')
    <div class="content">
        <div class="card shadow-lg">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">Update Platform</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('platforms.update', $platform->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Platform Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Platform Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $platform->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit & Cancel Buttons -->
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('platforms.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
