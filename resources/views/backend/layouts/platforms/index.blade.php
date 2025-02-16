@extends('backend.app')

@section('page-content')
    <div class="content">
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Platform List</h5>
                <a href="{{ route('platforms.create') }}" class="btn btn-dark btn-sm">
                    <i class="fas fa-plus-circle"></i> Add New Platform
                </a>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table id="platformsTable" class="table table-hover table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($platforms as $platform)
                                <tr>
                                    <td class="fw-bold">{{ $platform->id }}</td>
                                    <td>{{ $platform->name }}</td>
                                    <td class="text-center">
                                        <!-- Edit -->
                                        <a href="{{ route('platforms.edit', $platform->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <!-- Delete -->
                                        <form action="{{ route('platforms.destroy', $platform->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this platform?')">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted">No platforms found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



