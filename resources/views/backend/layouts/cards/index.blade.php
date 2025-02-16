{{-- @extends('backend.app')

@section('page-title')
    <div class="title pt-2">
        Cards
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Create Card Button -->
        <a href="{{ route('cards.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Create New Card
        </a>

        <!-- Cards Table -->
        <div class="table-responsive">
            <table class="table table-striped table-dark datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Platform</th>
                        <th>Image</th>
                        <th>Seller</th>
                        <th>Type</th>
                        <th>Base Price</th>
                        <th>Discount</th>
                        <th>Stock</th>
                        <th>Usage</th>
                        <th>Description</th>
                        <th>Delivery Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cards as $card)
                        <tr>
                            <td>{{ $card->id }}</td>
                            <td>{{ $card->title }}</td>
                            <td>{{ $card->platform->name }}</td>
                            <td><img src="{{ asset('storage/' . $card->image) }}" width="50" height="50" class="rounded"></td>
                            <td>{{ $card->seller }}</td>
                            <td>{{ ucfirst($card->type) }}</td>
                            <td>${{ number_format($card->base_price, 2) }}</td>
                            <td>{{ $card->discount }}%</td>
                            <td>{{ $card->stock }}</td>
                            <td>{{ $card->usage }}</td>
                            <td>{{ Str::limit($card->description, 50) }}</td>
                            <td>{{ $card->delivery_time }}</td>
                            <td>
                                <a href="{{ route('cards.show', $card->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View Card">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('cards.destroy', $card->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this card?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Card">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center">No cards found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            // Enable Bootstrap tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>
    @endpush
@endsection --}}



{{-- @extends('backend.app')

@section('page-title')
    <div class="title pt-2">
        <h4 class="fw-bold">Cards</h4>
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Create Card Button -->
        <a href="{{ route('cards.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus-circle"></i> Create New Card
        </a>

        <!-- Cards Table -->
        <table class="table table-striped table-bordered datatable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Platform</th>
                    <th>Image</th>
                    <th>Seller</th>
                    <th>Type</th>
                    <th>Base Price</th>
                    <th>Discount</th>
                    <th>Stock</th>
                    <th>Usage</th>
                    <th>Description</th>
                    <th>Delivery Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cards as $card)
                    <tr>
                        <td>{{ $card->id }}</td>
                        <td>{{ $card->title }}</td>
                        <td>{{ $card->platform->name }}</td>
                        <td><img src="{{ asset('storage/' . $card->image) }}" width="50" height="50"></td>
                        <td>{{ $card->seller }}</td>
                        <td>{{ ucfirst($card->type) }}</td>
                        <td>${{ number_format($card->base_price, 2) }}</td>
                        <td>{{ $card->discount }}%</td>
                        <td>{{ $card->stock }}</td>
                        <td>{{ $card->usage }}</td>
                        <td>{{ $card->description }}</td>
                        <td>{{ $card->delivery_time }}</td>
                        <td>
                            <a href="{{ route('cards.show', $card->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('cards.destroy', $card->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this card?')">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="13" class="text-center">No cards found!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection --}}



{{-- @extends('backend.app')

@section('page-title')
    <div class="title pt-2">
        Cards
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Create Card Button -->
        <a href="{{ route('cards.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Create New Card
        </a>

        <!-- Cards Table -->
        <div class="table-responsive">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Platform</th>
                        <th>Image</th>
                        <th>Seller</th>
                        <th>Type</th>
                        <th>Base Price</th>
                        <th>Discount</th>
                        <th>Stock</th>
                        <th>Usage</th>
                        <th>Description</th>
                        <th>Delivery Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cards as $card)
                        <tr>
                            <td>{{ $card->id }}</td>
                            <td>{{ $card->title }}</td>
                            <td>{{ $card->platform->name }}</td>
                            <td><img src="{{ asset('storage/' . $card->image) }}" width="50" height="50" class="rounded"></td>
                            <td>{{ $card->seller }}</td>
                            <td>{{ ucfirst($card->type) }}</td>
                            <td>${{ number_format($card->base_price, 2) }}</td>
                            <td>{{ $card->discount }}%</td>
                            <td>{{ $card->stock }}</td>
                            <td>{{ $card->usage }}</td>
                            <td>{{ Str::limit($card->description, 50) }}</td>
                            <td>{{ $card->delivery_time }}</td>
                            <td>
                                <a href="{{ route('cards.show', $card->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View Card">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('cards.destroy', $card->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this card?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Card">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center">No cards found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            // Enable Bootstrap tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>
    @endpush
@endsection --}}


{{-- @extends('backend.app')

@section('page-title')
    <div class="title pt-2">
        Cards
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Success and Error Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Create Card Button -->
        <a href="{{ route('cards.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus"></i> Create New Card
        </a>

        <!-- Cards Table -->
        <div class="table-responsive">
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Platform</th>
                        <th>Image</th>
                        <th>Seller</th>
                        <th>Type</th>
                        <th>Base Price</th>
                        <th>Discount</th>
                        <th>Stock</th>
                        <th>Usage</th>
                        <th>Description</th>
                        <th>Delivery Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cards as $card)
                        <tr class="table-row-hover">
                            <td>{{ $card->id }}</td>
                            <td>{{ $card->title }}</td>
                            <td>{{ $card->platform->name }}</td>
                            <td><img src="{{ asset('storage/' . $card->image) }}" width="50" height="50" class="rounded"></td>
                            <td>{{ $card->seller }}</td>
                            <td>{{ ucfirst($card->type) }}</td>
                            <td>${{ number_format($card->base_price, 2) }}</td>
                            <td>{{ $card->discount }}%</td>
                            <td>{{ $card->stock }}</td>
                            <td>{{ $card->usage }}</td>
                            <td>{{ Str::limit($card->description, 50) }}</td>
                            <td>{{ $card->delivery_time }}</td>
                            <td>
                                <a href="{{ route('cards.show', $card->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View Card">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('cards.destroy', $card->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this card?')" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Card">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center">No cards found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            // Enable Bootstrap tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>
    @endpush

    <style>
        /* Hover effect for table rows */
        .table-row-hover:hover {
            background-color: #f1f1f1;
        }

        /* Optional: Adjust column widths */
        .table th, .table td {
            white-space: nowrap;
        }
    </style>
@endsection --}}


@extends('backend.app')

@section('page-title')
    <div class="title pt-2">
        Cards Management
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Success and Error Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Create Card Button -->
        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('cards.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Create New Card
            </a>
        </div>

        <!-- Cards Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Platform</th>
                        <th>Image</th>
                        <th>Seller</th>
                        <th>Type</th>
                        <th>Base Price</th>
                        <th>Discount</th>
                        <th>Stock</th>
                        <th>Usage</th>
                        <th>Description</th>
                        <th>Delivery Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cards as $card)
                        <tr class="table-row-hover">
                            <td>{{ $card->id }}</td>
                            <td>{{ $card->title }}</td>
                            <td>{{ $card->platform->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $card->image) }}" alt="{{ $card->title }}" class="rounded" width="50" height="50">
                            </td>
                            <td>{{ $card->seller }}</td>
                            <td>{{ ucfirst($card->type) }}</td>
                            <td>${{ number_format($card->base_price, 2) }}</td>
                            <td>{{ $card->discount }}%</td>
                            <td>{{ $card->stock }}</td>
                            <td>{{ $card->usage }}</td>
                            <td>{{ Str::limit($card->description, 50) }}</td>
                            <td>{{ $card->delivery_time }}</td>
                            <td>
                                <a href="{{ route('cards.show', $card->id) }}" class="btn btn-info btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View Card">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('cards.edit', $card->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('cards.destroy', $card->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this card?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Card">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center">No cards found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
        <script>
            // Enable Bootstrap tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        </script>
    @endpush

    <style>
        .table{
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        /* Hover effect for table rows */
        .table-row-hover:hover {
            background-color: #f9f9f9;
        }

        /* Optional: Adjust column widths */
        .table th, .table td {
            white-space: nowrap;
            vertical-align: middle;
        }

        /* Improve table readability */
        .table th {
            background-color: #343a40;
            color: white;
            font-weight: bold;

        }

        /* Button Alignment */
        .d-flex {
            justify-content: flex-end;
        }
    </style>
@endsection
