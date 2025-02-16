{{-- @extends('backend.app')

@section('page-title')
    <div class="title pt-2">
        Blogs
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @else
        @endif

        <!-- Create Blog Button -->
        <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-3">Create New Blog</a>

        <!-- Blogs Table -->
        <div class="table-responsive">
            <table class="table table-striped table-dark datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Created At</th>
                        <th>Posted at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogs as $blog)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>{{ $blog->author }}</td>
                            <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                            <td>{{ $blog->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No blogs found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        <div>
    </div>
@endsection --}}



@extends('backend.app')

{{-- @section('page-title')
    <div class="title pt-2">
        <h2 class="text-dark fw-bold">Blogs</h2>
    </div>
@endsection --}}

@section('page-content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                
                <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Create Blog Button -->
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="fw-bold text-primary">Blog List</h4>
                    <a href="{{ route('blogs.create') }}" class="btn btn-primary">
                        ➕ Create New Blog
                    </a>
                </div>

                <!-- Blogs Table -->
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Created At</th>
                                        <th>Posted At</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($blogs as $blog)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="fw-bold">{{ $blog->title }}</td>
                                            <td>{{ $blog->author }}</td>
                                            <td>
                                                <span class="badge bg-info">{{ $blog->created_at->format('Y-m-d') }}</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-secondary">{{ $blog->created_at->diffForHumans() }}</span>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-sm btn-info">
                                                    👁 View
                                                </a>
                                                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-warning">
                                                    ✏ Edit
                                                </a>
                                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this blog?')">
                                                        🗑 Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-4">
                                                <h5 class="text-muted">No blogs found! 📭</h5>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
