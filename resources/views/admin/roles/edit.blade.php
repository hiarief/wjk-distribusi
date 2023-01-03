@extends('layouts.siode.app')
@section('title', 'Update role')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h5>
                    Edit role and manage permissions.
                </h5>
            </div>
        </div>
        <form method="POST" action="{{ route('roles.update', $role->id) }}">
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $role->name }}" type="text" class="form-control" name="name" placeholder="Name"
                        required>
                </div>

                <label for="permissions" class="form-label">Assign Permissions</label>

                <table class="table-striped table-sm table-bordered table">
                    <thead class="text-center">
                        <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                        <th scope="col" width="1%">No</th>
                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="1%">Guard</th>
                    </thead>

                    @foreach ($permissions as $key => $permission)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" name="permission[{{ $permission->name }}]"
                                    value="{{ $permission->name }}" class='permission'
                                    {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                            </td>
                            <th class="text-center">{{ $loop->iteration }}</th>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                        </tr>
                    @endforeach
                </table>

            </div>
            <div class="card-footer">

                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission"]').on('click', function() {

                if ($(this).is(':checked')) {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', true);
                    });
                } else {
                    $.each($('.permission'), function() {
                        $(this).prop('checked', false);
                    });
                }

            });
        });
    </script>
@endpush
