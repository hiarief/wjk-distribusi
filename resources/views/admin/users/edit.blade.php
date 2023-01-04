@extends('layouts.siode.app')
@section('title', 'Update user')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h5>Update user</h5>
            </div>
        </div>
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @method('patch')
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $user->name }}" type="text" class="form-control" name="name" placeholder="Name"
                        required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $user->email }}" type="email" class="form-control" name="email"
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input value="{{ $user->username }}" type="text" class="form-control" name="username"
                        placeholder="Username" required>
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" name="role" required>
                        <option value="">Select role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ in_array($role->name, $userRole) ? 'selected' : '' }}>
                                {{ $role->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input value="{{ $user->password }}" type="password" class="form-control" name="password"
                        placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn bg-gradient-primary btn-sm">Update user</button>
                <a href="{{ route('users.index') }}" class="btn bg-gradient-navy btn-sm">Cancel</a>

            </div>
        </form>
    </div>

@endsection
