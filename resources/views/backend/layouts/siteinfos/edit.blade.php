{{-- @extends('backend.app')

@section('page-title')
    <div class="title pt-2">
        Edit Company Information
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Edit Form -->
        <form action="{{ route('site-infos.update', $siteInfo->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Title Field -->
            <div class="mb-3">
                <label for="title" class="form-label">Company Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $siteInfo->title) }}" required>
            </div>

            <!-- Favicon Field -->
            <div class="mb-3">
                <label for="fav_icon" class="form-label">Favicon URL</label>
                <input type="text" class="form-control" id="fav_icon" name="fav_icon" value="{{ old('fav_icon', $siteInfo->fav_icon) }}">
            </div>

            <!-- Copyright Text Field -->
            <div class="mb-3">
                <label for="copy_right_text" class="form-label">Copyright Text</label>
                <input type="text" class="form-control" id="copy_right_text" name="copy_right_text" value="{{ old('copy_right_text', $siteInfo->copy_right_text) }}">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection --}}

{{-- @extends('backend.app')

@section('page-title')
    <div class="title pt-2">
        Edit Company Information
    </div>
@endsection

@section('page-content')
    <div class="content">
        <!-- Edit Form -->
        <form action="{{ route('site-infos.update', $siteInfo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title Field -->
            <div class="mb-3">
                <label for="title" class="form-label">Company Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $siteInfo->title) }}">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>


            <!-- Favicon Upload Field -->
            <div class="mb-3">
                <label for="fav_icon" class="form-label">Favicon</label>
                <div class="mb-3">
                    <img src="{{ Storage::url($siteInfo->fav_icon) }}" width="50" height="50">
                </div>
                <input type="file" class="form-control" id="fav_icon" name="fav_icon" accept="image/*">
                @error('fav_icon')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <!-- Copyright Text Field -->
            <div class="mb-3">
                <label for="copy_right_text" class="form-label">Copyright Text</label>
                <input type="text" class="form-control" id="copy_right_text" name="copy_right_text"
                    value="{{ old('copy_right_text', $siteInfo->copy_right_text) }}">
                @error('copy_right_text')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection --}}



@extends('backend.app')

{{-- @section('page-title')
    <div class="title pt-2">
        <h4 class="fw-bold">Edit Company Information</h4>
    </div>
@endsection --}}

@section('page-content')
    <div class="content">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Update Company Details</h5>
            </div>
            <div class="card-body">
                <!-- Edit Form -->
                <form action="{{ route('site-infos.update', $siteInfo->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Title Field -->
                    <div class="mb-3">
                        <label for="title" class="form-label fw-semibold">Company Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title', $siteInfo->title) }}">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Favicon Upload Field -->
                    <div class="mb-3">
                        <label for="fav_icon" class="form-label fw-semibold">Company Favicon</label>
                        <div class="mb-3">
                            <img id="favicon-preview" src="{{ Storage::url($siteInfo->fav_icon) }}" width="60" height="60" class="rounded shadow">
                        </div>
                        <input type="file" class="form-control" id="fav_icon" name="fav_icon" accept="image/*"
                            onchange="previewFavicon(event)">
                        @error('fav_icon')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Copyright Text Field -->
                    <div class="mb-3">
                        <label for="copy_right_text" class="form-label fw-semibold">Copyright Text</label>
                        <input type="text" class="form-control" id="copy_right_text" name="copy_right_text"
                            value="{{ old('copy_right_text', $siteInfo->copy_right_text) }}">
                        @error('copy_right_text')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript for Image Preview -->
    <script>
        function previewFavicon(event) {
            const preview = document.getElementById('favicon-preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = () => URL.revokeObjectURL(preview.src);
        }
    </script>
@endsection
