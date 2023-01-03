@extends('layouts.siode.app')
@section('title', 'Permissions')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="mt-2">
            </div>
            <h3 class="card-title">
                <a href="{{ route('permissions.create') }}" class="btn btn-xs bg-gradient-primary"><i
                        class="fa-solid fa-square-plus"></i> Add
                    permissions</a>
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
            <div class="mt-2">
                @include('layouts.partials.messages')
            </div>

            <table class="table-striped table-sm table-bordered table">
                <thead>
                    <tr class="text-center">
                        <th scope="col" width="5%">No</th>
                        <th scope="col" width="15%">Name</th>
                        <th scope="col">Guard</th>
                        <th scope="col" colspan="2" width="1%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $per => $permission)
                        <tr class="text-center text-sm">
                            <td>{{ $permissions->firstItem() + $per }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                            <td><a href="{{ route('permissions.edit', $permission->id) }}"
                                    class="btn bg-gradient-info btn-xs text-sm">Edit</a>
                            </td>
                            <td>
                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['permissions.destroy', $permission->id],
                                    'style' => 'display:inline',
                                ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn bg-gradient-danger btn-xs text-sm']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            Halaman : {{ $permissions->currentPage() }} <br />
            Jumlah Data : {{ $permissions->total() }} <br />
            Data Per Halaman : {{ $permissions->perPage() }} <br />
            <ul class="pagination pagination-sm float-right m-0">
                {!! $permissions->links() !!}
            </ul>
        </div>
    </div>
@endsection
