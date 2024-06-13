@extends('layouts.admin')

@section('content')
    <div class="container " style="height: calc(100vh - 125px)">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        {{ __('User ') }}
                        <span>{{ '@' . $user->name }}</span>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h5>{{ __('You are logged in!') }}</h5>
                        <div class="d-flex gap-4 mt-4 flex-wrap">
                            <a href="{{ route('admin.projects.index') }}"
                                class="btn btn-primary d-flex align-items-center gap-2">
                                <span>My projects</span>
                                <i class="fa-solid fa-database"></i>
                            </a>

                            <a href="{{ route('admin.types.index') }}" class="btn btn-dark d-flex align-items-center gap-2">
                                My types
                                <i class="fa-solid fa-database"></i>
                            </a>
                            <a href="{{ route('admin.technologies.index') }}"
                                class="btn btn-warning d-flex align-items-center gap-2">
                                My technology
                                <i class="fa-solid fa-database"></i>
                            </a>

                            <a href="{{ route('admin.notes.index') }}" class="btn btn-info d-flex align-items-center gap-2">
                                My notes
                                <i class="fa-solid fa-database"></i>
                            </a>

                            <a href="{{ route('admin.notes.index') }}"
                                class="btn btn-danger d-flex align-items-center gap-2">
                                My collaborator
                                <i class="fa-solid fa-database"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
