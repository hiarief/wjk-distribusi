@extends('layouts.siode.app')
@section('title', 'Dashboard')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-xs bg-gradient-primary"><i class="fa-solid fa-square-plus"></i> Tambah</button>
                <button class="btn btn-xs bg-gradient-danger"><i class="fa-solid fa-trash"></i> Trash</button>
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
            <button class="btn btn-xs bg-gradient-primary">fasdf</button>
        </div>
        <div class="card-footer">

        </div>
    </div>
@endsection

@push('styles')
    <script>
        // Your custom JavaScript...
    </script>
@endpush

@push('scripts')
    <script>
        // Your custom JavaScript...
    </script>
@endpush
