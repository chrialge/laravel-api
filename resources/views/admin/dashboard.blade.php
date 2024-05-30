@extends('layouts.admin')

@section('content')
    <div class="container " style="height: calc(100vh - 125px)">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h5>{{ __('You are logged in!') }}</h5>

                        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary mt-2">
                            My projects
                        </a>
                        <a href="{{ route('admin.types.index') }}" class="btn btn-dark mt-2">
                            My types
                        </a>
                        <a href="{{ route('admin.technologies.index') }}" class="btn btn-warning mt-2">
                            My technology
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
