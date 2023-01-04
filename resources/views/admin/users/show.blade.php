@extends('layouts.siode.app')
@section('title', 'Show user')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h5>Show user</h5>
            </div>
        </div>
        <div class="card-body">
            <div>
                Name: <strong>{{ $user->name }}</strong>
            </div>
            <div>
                Email: <strong>{{ $user->email }}</strong>
            </div>
            <div>
                Username: <strong>{{ $user->username }}</strong>
            </div>
        </div>
        <div class="card-footer">
            <div class="mt-4">
                <a href="{{ route('users.edit', $user->id) }}" class="btn bg-gradient-fuchsia btn-sm">Edit</a>
                <a href="{{ route('users.index') }}" class="btn bg-gradient-maroon btn-sm">Back</a>
            </div>
        </div>
    </div>

@endsection
