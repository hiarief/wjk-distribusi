@extends('layouts.siode.app')
@section('title', 'User')
@section('content')

    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="https://picsum.photos/300/300"
                            alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                    <p class="text-muted text-center">{{ Auth::user()->roles->pluck('name')[0] ?? '' }}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Username</b> <a class="float-right">{{ $user->username }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Terdaftar</b> <a
                                class="float-right">{{ Carbon\Carbon::parse($user->created_at)->isoFormat('DD MMM Y, HH:mm:ss') }}</a>
                        </li>
                    </ul>
                    {{--  <a href="{{ route('auth.change_password') }}" class="btn btn-primary btn-block"><b>Ganti
                            Password</b></a>  --}}
                </div>
            </div>
        </div>
        <div class="col-md">

            <div class="card">
                <div class="card-header">
                    <strong>Ganti Password</strong>
                </div>

                <div class="card-body">
                    <form action="{!! route('auth.change_password') !!}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group {!! $errors->has('current_password') ? 'has-error' : '' !!}">
                            <label for="current_password">Password lama *</label>
                            <input type="password" id="current_password" name="current_password"
                                class="form-control form-control-sm" required>
                            @if ($errors->has('current_password'))
                                <em class="invalid-feedback">
                                    {!! $errors->first('current_password') !!}
                                </em>
                            @endif
                        </div>
                        <div class="form-group {!! $errors->has('new_password') ? 'has-error' : '' !!}">
                            <label for="new_password">Password baru *</label>
                            <input type="password" id="new_password" name="new_password"
                                class="form-control form-control-sm" required>
                            @if ($errors->has('new_password'))
                                <em class="invalid-feedback">
                                    {!! $errors->first('new_password') !!}
                                </em>
                            @endif
                        </div>
                        <div class="form-group {!! $errors->has('new_password_confirmation') ? 'has-error' : '' !!}">
                            <label for="new_password_confirmation">Konfirmasi password baru *</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                class="form-control form-control-sm" required>
                            @if ($errors->has('new_password_confirmation'))
                                <em class="invalid-feedback">
                                    {!! $errors->first('new_password_confirmation') !!}
                                </em>
                            @endif
                        </div>
                        <div>
                            <input class="btn bg-gradient-navy btn-sm" type="submit" value="Simpan">
                            <a href="{{ route('users.profil', Auth::user()->id) }}"
                                class="btn bg-gradient-secondary btn-sm">
                                Batal
                            </a>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
