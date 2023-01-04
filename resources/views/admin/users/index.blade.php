@extends('layouts.siode.app')
@section('title', 'Users')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="mt-2">
                <h5>Manage your users here.</h5>
            </div>
            <h3 class="card-title">
                <a href="{{ route('users.create') }}" class="btn btn-xs bg-gradient-primary"><i
                        class="fa-solid fa-square-plus"></i> Add new user</a>
            </h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table-striped table-bordered table-sm table">
                <thead>
                    <tr class="text-center">
                        <th scope="col" width="1%">No</th>
                        <th scope="col" width="15%">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col" width="10%">Username</th>
                        <th scope="col" width="10%">Roles</th>
                        <th scope="col" width="1%" colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="badge bg-gradient-gray-dark">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td><a href="{{ route('users.show', $user->id) }}"
                                    class="btn bg-gradient-warning btn-xs">Show</a></td>
                            <td><a href="{{ route('users.edit', $user->id) }}" class="btn bg-gradient-info btn-xs">Edit</a>
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn bg-gradient-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer">
            Halaman : {{ $users->currentPage() }} <br />
            Jumlah Data : {{ $users->total() }} <br />
            Data Per Halaman : {{ $users->perPage() }} <br />
            <ul class="pagination pagination-sm float-right m-0">
                {!! $users->links() !!}
            </ul>
        </div>
    </div>
@endsection
