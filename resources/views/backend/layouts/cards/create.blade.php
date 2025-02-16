 {{-- @extends('backend.app')

@section('page-content')
    <div class="content">
        <!-- Create Card Form in a Card Component -->
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4>Create New Card</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('cards.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Platform -->
                        <div class="col-md-6 mb-3">
                            <label for="platform_id" class="form-label">Platform</label>
                            <select class="form-control" id="platform_id" name="platform_id" required>
                                @foreach ($platforms as $platform)
                                    <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                @endforeach
                            </select>
                            @error('platform_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Title -->
                        <div class="col-md-6 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Image -->
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Seller -->
                        <div class="col-md-6 mb-3">
                            <label for="seller" class="form-label">Seller</label>
                            <input type="text" class="form-control" id="seller" name="seller" value="{{ old('seller') }}">
                            @error('seller')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Type -->
                        <div class="col-md-6 mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-control" id="type" name="type">
                                <option value="voucher">Voucher</option>
                                <option value="gift_card">Gift Card</option>
                            </select>
                        </div>

                        <!-- Base Price -->
                        <div class="col-md-6 mb-3">
                            <label for="base_price" class="form-label">Base Price</label>
                            <input type="number" class="form-control" id="base_price" name="base_price" step="0.50" value="{{ old('base_price') }}">
                            @error('base_price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Discount -->
                        <div class="col-md-6 mb-3">
                            <label for="discount" class="form-label">Discount</label>
                            <input type="number" class="form-control" id="discount" name="discount" step="0.50" value="{{ old('discount') }}">
                            @error('discount')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stock -->
                        <div class="col-md-6 mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}">
                            @error('stock')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Usage -->
                        <div class="col-md-6 mb-3">
                            <label for="usage" class="form-label">Usage</label>
                            <input type="text" class="form-control" id="usage" name="usage" value="{{ old('usage') }}">
                            @error('usage')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="col-md-6 mb-3">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Delivery Time -->
                        <div class="col-md-6 mb-3">
                            <label for="delivery_time" class="form-label">Delivery Time</label>
                            <input type="text" class="form-control" id="delivery_time" name="delivery_time" value="{{ old('delivery_time') }}">
                            @error('delivery_time')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Versions -->
                        <div class="col-md-6 mb-3">
                            <label for="versions" class="form-label">Versions</label>
                            <select class="js-example-basic-multiple form-control" name="versions[]" multiple="multiple">
                                @foreach ($versions as $version)
                                    <option value="{{ $version->id }}">{{ $version->name }}</option>
                                @endforeach
                            </select>
                            @error('versions')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Amounts -->
                        <div class="col-md-6 mb-3">
                            <label for="amounts" class="form-label">Available Amounts</label>
                            <select class="js-example-basic-multiple form-control" name="amounts[]" multiple="multiple">
                                @foreach ($amounts as $amount)
                                    <option value="{{ $amount->id }}">{{ $amount->value }}</option>
                                @endforeach
                            </select>
                            @error('amounts')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Create Card</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .form-label {
            font-weight: 600;
        }

        .btn {
            font-weight: 600;
        }

        .js-example-basic-multiple {
            width: 100%;
        }

        .text-danger {
            font-size: 0.875rem;
        }

        .mb-3 {
            margin-bottom: 1.5rem;
        }

        .form-control {
            font-size: 0.875rem;
        }

        .card {
            border-radius: 8px;
            margin-top: 20px;
        }

        .card-header {
            border-bottom: 2px solid #ddd;
            background-color: #0056b3;
            color: white;
            font-size: 1.25rem;
        }

        .card-body {
            padding: 20px;
        }
    </style>
@endpush --}}


@extends('backend.app')

@section('page-title')
    <div class="title pt-2">
        Create New Card
    </div>
@endsection

@section('page-content')
    <div class="content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0 text-center">Create New Card</h5>
                    </div>
                    <div class="card-body">
                        <!-- Create Card Form -->
                        <form action="{{ route('cards.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="mb-4">
                                <label for="platform_id" class="form-label fw-bold">Platform</label>
                                <select class="form-control @error('platform_id') is-invalid @enderror" id="platform_id" name="platform_id" required>
                                    @foreach ($platforms as $platform)
                                        <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                    @endforeach
                                </select>
                                @error('platform_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Enter card title">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="seller" class="form-label fw-bold">Seller</label>
                                <input type="text" class="form-control @error('seller') is-invalid @enderror" id="seller" name="seller" value="{{ old('seller') }}" placeholder="Enter seller name">
                                @error('seller')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="type" class="form-label fw-bold">Type</label>
                                <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                                    <option value="voucher">Voucher</option>
                                    <option value="gift_card">Gift Card</option>
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="base_price" class="form-label fw-bold">Base Price</label>
                                <input type="number" class="form-control @error('base_price') is-invalid @enderror" id="base_price" name="base_price" step="0.50" value="{{ old('base_price') }}" placeholder="Enter base price">
                                @error('base_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="discount" class="form-label fw-bold">Discount</label>
                                <input type="number" class="form-control @error('discount') is-invalid @enderror" id="discount" name="discount" step="0.50" value="{{ old('discount') }}" placeholder="Enter discount">
                                @error('discount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="stock" class="form-label fw-bold">Stock</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock') }}" placeholder="Enter stock quantity">
                                @error('stock')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="usage" class="form-label fw-bold">Usage</label>
                                <input type="text" class="form-control @error('usage') is-invalid @enderror" id="usage" name="usage" value="{{ old('usage') }}" placeholder="Enter usage details">
                                @error('usage')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label fw-bold">Description</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}" placeholder="Enter description">
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="delivery_time" class="form-label fw-bold">Delivery Time</label>
                                <input type="text" class="form-control @error('delivery_time') is-invalid @enderror" id="delivery_time" name="delivery_time" value="{{ old('delivery_time') }}" placeholder="Enter delivery time">
                                @error('delivery_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Versions Selection -->
                            <div class="mb-4">
                                <label for="versions" class="form-label fw-bold">Versions</label>
                                <select class="js-example-basic-multiple form-control @error('versions') is-invalid @enderror" name="versions[]" multiple="multiple">
                                    @foreach ($versions as $version)
                                        <option value="{{ $version->id }}">{{ $version->name }}</option>
                                    @endforeach
                                </select>
                                @error('versions')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Amounts Selection -->
                            <div class="mb-4">
                                <label for="amounts" class="form-label fw-bold">Available Amounts</label>
                                <select class="js-example-basic-multiple form-control @error('amounts') is-invalid @enderror" name="amounts[]" multiple="multiple">
                                    @foreach ($amounts as $amount)
                                        <option value="{{ $amount->id }}">{{ $amount->value }}</option>
                                    @endforeach
                                </select>
                                @error('amounts')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Create Card</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .form-label {
            font-weight: 600;
        }

        .btn {
            font-weight: 600;
        }

        .js-example-basic-multiple {
            width: 100%;
        }

        .invalid-feedback {
            font-size: 0.875rem;
        }

        .card {
            border-radius: 8px;
            margin-top: 20px;
        }

        .card-header {
            background-color: #0056b3;
            color: white;
            font-size: 1.25rem;
        }

        .card-body {
            padding: 30px;
        }

        .form-control {
            font-size: 0.875rem;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }
    </style>
@endpush
