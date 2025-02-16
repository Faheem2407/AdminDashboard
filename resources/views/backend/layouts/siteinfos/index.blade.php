{{-- @extends('backend.app')

@section('page-title')
    Company Informations
@endsection

@section('page-content')
    <div class="content">
        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table to Display Site Info -->
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>Company Title</th>
                    <th>Company Favicon</th>
                    <th>Company Copyright Text</th>
                    <th class="pl-1">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($siteInfos as $siteInfo)
                <tr>
                    <td>{{ $siteInfo->title }}</td>
                    <td>
                        @if($siteInfo->fav_icon)
                            <img src="{{ asset('storage/' . $siteInfo->fav_icon) }}" width="50" height="50">
                        @else
                            No Favicon
                        @endif
                    </td>
                    <td>{{ $siteInfo->copy_right_text }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('site-infos.edit', $siteInfo->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    </td>     
                </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No records found!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection --}}

@extends('backend.app')

{{-- @section('page-title')
    Company Information
@endsection --}}

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
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 text-center">Company Information</h5>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Company Title</th>
                                <th>Company Favicon</th>
                                <th>Company Copyright Text</th>
                                <th class="text-center">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siteInfos as $siteInfo)
                            <tr>
                                <td class="fw-bold">{{ $siteInfo->title }}</td>
                                <td class="text-center">
                                    @if($siteInfo->fav_icon)
                                        <img src="{{ asset('storage/' . $siteInfo->fav_icon) }}" width="40" height="40" class="rounded-circle">
                                    @else
                                        <span class="text-muted">No Favicon</span>
                                    @endif
                                </td>
                                <td>{{ $siteInfo->copy_right_text }}</td>
                                <td class="text-center">
                                    <a href="{{ route('site-infos.edit', $siteInfo->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">No records found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
