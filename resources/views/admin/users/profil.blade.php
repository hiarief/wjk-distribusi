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
                    <a href="{{ route('auth.change_password') }}" class="btn btn-primary btn-block"><b>Ganti
                            Password</b></a>
                </div>
            </div>

        </div>
    </div>

@endsection
