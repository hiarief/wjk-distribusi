@extends('layouts.siode.app')
@section('title', 'Show role')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h5><strong>{{ ucfirst($role->name) }}</strong> Role</h5>
            </div>
        </div>
        <div class="card-body">
            <h6>Assigned permissions</h6>
            <table class="table-striped table-bordered table-sm table">
                <thead>
                    <tr class="text-center">
                        <th scope="col" width="1%">No</th>
                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="1%">Guard</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rolePermissions as $permission)
                        <tr class="text-center">
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="mt-4">
                <a href="{{ route('roles.edit', $role->id) }}" class="btn bg-gradient-blue btn-sm">Edit</a>
                <a href="{{ route('roles.index') }}" class="btn bg-gradient-navy btn-sm">Back</a>
            </div>
        </div>
    </div>
@endsection
