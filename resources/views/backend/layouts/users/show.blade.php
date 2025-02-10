@extends('backend.app')



@section('page-title')
    Users Lists
@endsection


@section('page-content')
    <h1>User Details</h1>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Role:</strong> {{ $user->role }}</p>
    <p><strong>Balance:</strong> {{ $user->balance }}</p>
    <p><strong>Country:</strong> {{ $user->country }}</p>
    <a href="{{ route('users.index') }}">Back</a>
@endsection
