@extends('layouts.admin')

@section('content')
    <div class="container " style="height: 100vh; padding: 30px 0;">
        <div class="d-flex align-items-center justify-content-end gap-2">
            <a href="{{ route('admin.collaborators.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

            <a class="btn btn-dark" href="{{ route('admin.collaborators.edit', $collaborator) }}"> <i
                    class="fas fa-pencil-alt fa-sm fa-fw"></i>
            </a>

        </div>
        <div class="header pb-5 d-flex justify-content-between align-items-center">
            <div class="info_note">
                <h1>Notes #{{ $collaborator->id }}: {{ $collaborator->name }}</h1>
                <span>{{ $collaborator->slug }}</span>
            </div>
            <div>
                {{-- <h6>Project #{{ $collaborator->project->id }}: {{ $collaborator->project->name }}</h6> --}}
                {{-- <span>{{ $collaborator->project->slug }}</span> --}}
            </div>

        </div>
        <div class="d-flex gap-2">
            <h5 class="">
                <i class="fa-brands fa-square-github"></i>
                Account Github:
            </h5>
            <span>{{ $collaborator->url_git }}</span>
        </div>


        <p>
        <h3>Content:</h3>
        {{ $collaborator->content ? $collaborator->content : 'N/A' }}
        </p>


    </div>
@endsection
