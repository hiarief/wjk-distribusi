<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{!! csrf_token() !!}">
    <title>@yield('title') | Siode</title>


    <link href="{{ URL::asset('images/desa.png') }}" rel='shortcut icon'>
    <link rel="icon" href="{{ URL::asset('images/desa.png') }}" type="image/x-icon" />

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ URL::asset('assets/dist/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/dist/css/adminlte.min.css') }}">

    @stack('styles')
</head>

<body class="sidebar-mini text-sm">
    <div class="wrapper">

        @include('layouts.siode.navbar')

        @include('layouts.siode.sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                @if (Session::has('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close btn-sm btn" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                        Success, {{ session('success') }}
                                    </div>
                                @endif
                                @if (Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close btn-sm btn" data-dismiss="alert"
                                            aria-hidden="true">×</button>
                                        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                        Error, {{ session('error') }}
                                    </div>
                                @endif

                                {{--  message validate  --}}
                                @if (session('message'))
                                    <div class="row mb-2">
                                        <div class="col-lg-12">
                                            <div class="alert alert-success" role="alert">{!! session('message') !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if ($errors->count() > 0)
                                    <div class="alert alert-danger alert-dismissible">
                                        <ul class="list-unstyled">
                                            @foreach ($errors->all() as $error)
                                                <li>{!! $error !!}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="close btn-sm btn text-white" data-dismiss="alert"
                                            aria-hidden="true"><i
                                                class="fa-regular fa-rectangle-xmark bg-gradient-navy text-white"></i></button>
                                    </div>
                                @endif
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>

        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>

        {{--  <form id="logoutform" action="{!! route('logout') !!}" method="POST" style="display: none;">
            {!! csrf_field() !!}
        </form>  --}}

        <footer class="main-footer text-sm">
            <div class="d-none d-sm-inline float-right">
                Anything you want
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>
    </div>

    <script src="{{ URL::asset('assets/dist/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dist/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dist/js/adminlte.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
