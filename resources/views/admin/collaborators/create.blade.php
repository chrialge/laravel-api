@extends('layouts.admin')

@section('content')
    {{-- BREADCRUMBS --}}
    <ul class="list-unstyled d-flex gap-2 breadcrumb_page">
        <li>
            <a href="#" class="state_disactive">
                Dashboard
            </a>
        </li>
        <li>
            <span class="state_disactive">
                /
            </span>
        </li>
        <li>
            <a href="{{ route('admin.collaborators.index') }}" class="state_disactive">
                Collaboratori
            </a>
        </li>
        <li>
            <span class="state_disactive">
                /
            </span>
        </li>
        <li>
            <a href="#" class="state_active">
                Creazione
            </a>
        </li>
    </ul>

    <div class="header_page">
        <h2>Nuovo collaboratore</h2>
        <a href="{{ route('admin.collaborators.index') }}" class="btn btn-dark">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>

    @include('partials.validate')

    <form action="{{ route('admin.collaborators.store') }}" method="post" class="form_small">
        @csrf
        <div class="mb-3">
            <label for=" name" class="form-label label_create">Name</label>
            <input type="text" class="form-control input_create @error('name') is-invalid @enderror" name="name"
                id="name" aria-describedby="nameHelper" placeholder="task1" value="{{ old('name') }}" />

            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="url_git" class="form-label label_create">
                <i class="fa-brands fa-square-github"></i>
                Account Github
            </label>
            <input type="text" class="form-control input_create @error('url_git') is-invalid @enderror" name="url_git"
                id="url_git" aria-describedby="url_gitHelper" placeholder="task1" value="{{ old('url_git') }}" />

            @error('url_git')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="content" class="form-label label_create">Content</label>
            <textarea class="form-control input_create @error('content') is-invalid @enderror" name="content" id="content"
                rows="6">
                        {{ old('content') }}
                    </textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="btn_container">
            <button type="submit" class="btn btn-primary">
                Crea
            </button>

            <button class="btn btn-primary btn_loading" disabled>
                Attendi...
            </button>
        </div>



    </form>
@endsection
