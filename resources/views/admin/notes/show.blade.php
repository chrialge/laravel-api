@extends('layouts.admin')

@section('content')
    <div class="container " style="height: 100vh; padding: 30px 0;">
        <div class="d-flex align-items-center justify-content-end gap-2">
            <a href="{{ route('admin.notes.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

            <a class="btn btn-dark" href="{{ route('admin.notes.edit', $note) }}"> <i
                    class="fas fa-pencil-alt fa-sm fa-fw"></i>
            </a>

        </div>
        <div class="header pb-5 d-flex justify-content-between align-items-center">
            <div class="info_note">
                <h1>Notes #{{ $note->id }}: {{ $note->name }}</h1>
                <span>{{ $note->slug }}</span>
            </div>
            <div>
                <h6>Project #{{ $note->project->id }}: {{ $note->project->name }}</h6>
                <span>{{ $note->project->slug }}</span>
            </div>

        </div>

        <p>
        <h3>Content:</h3>
        {{ $note->content }}
        </p>




    </div>
@endsection
