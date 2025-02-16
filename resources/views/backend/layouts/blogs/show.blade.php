{{-- @extends('backend.app')

@section('page-title')
    <div class="title pt-2">
        Blog Details
    </div>
@endsection

@section('page-content')
    <div class="content">
        <h3>{{ $blog->title }}</h3>
        <p><strong>Author:</strong> {{ $blog->author }}</p>
        <p><strong>Created At:</strong> {{ $blog->created_at->format('Y-m-d') }}</p>
        <p><strong>Content:</strong></p>
        <p>{{ $blog->content }}</p>
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection --}}

@extends('backend.app')

{{-- @section('page-title')
    <div class="title pt-2">
        <h2 class="text-dark fw-bold">Blog Details</h2>
    </div>
@endsection --}}

@section('page-content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ $blog->title }}</h4>
                    </div>
                    <div class="card-body">
                        
                        <!-- Display Blog Image (if available) -->
                        @if($blog->image)
                            <div class="text-center mb-4">
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="img-fluid rounded" style="max-height: 300px;">
                            </div>
                        @endif
                        
                        <p class="text-muted"><strong>Author:</strong> {{ $blog->author }}</p>
                        <p class="text-muted"><strong>Published on:</strong> {{ $blog->created_at->format('F d, Y') }}</p>
                        
                        <hr>

                        <p class="fs-5">{{ $blog->content }}</p>

                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{ route('blogs.index') }}" class="btn btn-secondary">⬅ Back to List</a>
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning">✏ Edit Blog</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
