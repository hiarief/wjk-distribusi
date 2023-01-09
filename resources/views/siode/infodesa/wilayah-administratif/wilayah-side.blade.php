@extends('layouts.siode.app')
@section('title', 'Wilayah Administratif')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <a href="mailbox.html" class="btn btn-primary btn-block mb-3">Back to Inbox</a>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Administratif</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item active">
                            <a href="{{ route('siode.infodesa.rw.index') }}" class="nav-link">
                                <i class="fas fa-inbox"></i> RW
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('siode.infodesa.rt.index') }}" class="nav-link">
                                <i class="far fa-envelope"></i> Rt
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            @yield('content-administratif')
        </div>

    </div>
@endsection

@push('styles')
    @stack('styles-administratif')
@endpush

@push('scripts')
    @stack('scripts-administratif')
@endpush
