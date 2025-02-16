{{-- @extends('backend.app')

@section('page-title')
    <div class="title pt-2">
        Edit Blog
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Edit Blog Form -->
        <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $blog->author }}" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ $blog->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection --}}



{{-- @extends('backend.app')

@section('page-title')
    <div class="title pt-2">
        <h2 class="text-dark fw-bold">Edit Blog</h2>
    </div>
@endsection

@section('page-content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-warning text-white">
                        <h4 class="mb-0">Update Blog Details</h4>
                    </div>
                    <div class="card-body">
                        
                        <!-- Display Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Edit Blog Form -->
                        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label fw-bold">Author</label>
                                <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $blog->author) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label fw-bold">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $blog->content) }}</textarea>
                            </div>

                            <!-- Image Upload with Preview -->
                            <div class="mb-3">
                                <label for="image" class="form-label fw-bold">Blog Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                                @if ($blog->image)
                                    <div class="mt-3">
                                        <p class="fw-bold">Current Image:</p>
                                        <img id="imagePreview" src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded" style="max-height: 200px;">
                                    </div>
                                @else
                                    <div class="mt-3">
                                        <img id="imagePreview" class="img-fluid rounded d-none" style="max-height: 200px;">
                                    </div>
                                @endif
                            </div>

                            <div class="mt-4 d-flex justify-content-between">
                                <a href="{{ route('blogs.index') }}" class="btn btn-secondary">⬅ Back</a>
                                <button type="submit" class="btn btn-success">✅ Update Blog</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const imgElement = document.getElementById('imagePreview');
                imgElement.src = reader.result;
                imgElement.classList.remove('d-none');
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection --}}



@extends('backend.app')

{{-- @section('page-title')
    <div class="title pt-2">
        <h2 class="text-dark fw-bold">Edit Blog</h2>
    </div>
@endsection --}}

@section('page-content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-warning text-white">
                        <h4 class="mb-0">Update Blog Details</h4>
                    </div>
                    <div class="card-body">
                        
                        <!-- Display Errors -->
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <script>
                                    toastr.error("{{ $error }}");
                                </script>
                            @endforeach
                        @endif

                        <!-- Toastr Success Notification -->
                        @if (session('success'))
                            <script>
                                toastr.success("{{ session('success') }}");
                            </script>
                        @endif

                        <!-- Edit Blog Form -->
                        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label fw-bold">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="author" class="form-label fw-bold">Author</label>
                                <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $blog->author) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label fw-bold">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $blog->content) }}</textarea>
                            </div>

                            <!-- Image Upload with Preview -->
                            <div class="mb-3">
                                <label for="image" class="form-label fw-bold">Blog Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                                @if ($blog->image)
                                    <div class="mt-3">
                                        <p class="fw-bold">Current Image:</p>
                                        <img id="imagePreview" src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded" style="max-height: 200px;">
                                    </div>
                                @else
                                    <div class="mt-3">
                                        <img id="imagePreview" class="img-fluid rounded d-none" style="max-height: 200px;">
                                    </div>
                                @endif
                            </div>

                            <div class="mt-4 d-flex justify-content-between">
                                <a href="{{ route('blogs.index') }}" class="btn btn-secondary">⬅ Back</a>
                                <button type="submit" class="btn btn-success">✅ Update Blog</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toastr & Image Preview Script -->
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const imgElement = document.getElementById('imagePreview');
                imgElement.src = reader.result;
                imgElement.classList.remove('d-none');
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <!-- Include Toastr JS & CSS -->
    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
        </script>
    @endsection
@endsection

