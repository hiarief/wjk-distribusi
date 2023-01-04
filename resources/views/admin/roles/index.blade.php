@extends('layouts.siode.app')
@section('title', 'Roles')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="mt-2">
            </div>
            <h3 class="card-title">
                <a href="{{ route('roles.create') }}" class="btn btn-xs bg-gradient-primary"><i
                        class="fa-solid fa-square-plus"></i> Add
                    role</a>
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

            {{--  <div class="mt-2">
                @include('layouts.partials.messages')
            </div>  --}}
            <table class="table-bordered table-sm table">
                <thead>
                    <tr class="text-center text-sm">
                        <th width="1%">No</th>
                        <th width="10%">Name</th>
                        <th>Permissions</th>
                        <th width="3%" colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                        <tr class="text-center text-sm">
                            <td>{{ $roles->firstItem() + $key }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions()->pluck('name') as $permission)
                                    <span class="badge bg-gradient-navy">{!! $permission !!}</span>
                                @endforeach
                            </td>
                            <td>
                                <a class="btn btn-warning btn-xs" href="{{ route('roles.show', $role->id) }}">Show</a>
                            </td>
                            <td>
                                <a class="btn btn-info btn-xs" href="{{ route('roles.edit', $role->id) }}">Edit</a>
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>

                </tfoot>
            </table>
        </div>
        <div class="card-footer">
            Halaman : {{ $roles->currentPage() }} <br />
            Jumlah Data : {{ $roles->total() }} <br />
            Data Per Halaman : {{ $roles->perPage() }} <br />
            <ul class="pagination pagination-sm float-right m-0">
                {!! $roles->links() !!}
            </ul>
        </div>
    </div>


@endsection
