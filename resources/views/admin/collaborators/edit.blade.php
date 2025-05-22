@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/collaborator_validation.js') }}"></script>
@endsection

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
                Modifica
            </a>
        </li>
    </ul>

    <div class="header_page">
        <h2>Modifica collaboratore</h2>
        <a href="{{ route('admin.collaborators.index') }}" class="btn btn-dark">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>

    @include('partials.validate')

    <form action="{{ route('admin.collaborators.update', $collaborator) }}" method="post" class="form_small"
        onsubmit="check_form_update()">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for=" name" class="form-label label_create">Name</label>
            <input type="text" class="form-control input_create @error('name') is-invalid @enderror" name="name"
                id="name" aria-describedby="nameHelper" placeholder="task1"
                value="{{ old('name', $collaborator->name) }}" onblur="check_name()" onkeyup="hide_error_name()" />

            <span class="error_js" id="error_name_js">
                Il nome deve essere di almeno 3 caratteri, e sono accetati solo
                caratteri alfabetici
            </span>

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
                id="url_git" aria-describedby="url_gitHelper" placeholder="task1"
                value="{{ old('url_git', $collaborator->url_git) }}" onkeyup="hide_error_url()" onblur="check_url()" />

            <span class="error_js" id="error_url_js">
                l'url non e valido
            </span>

            @error('url_git')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="content" class="form-label label_create">Content</label>
            <textarea class="form-control input_create @error('content') is-invalid @enderror" name="content" id="content"
                rows="6">
                        {{ old('content', $collaborator->content) }}
                    </textarea>
            @error('content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="btn_container">
            <button type="submit" class="btn btn-warning" id="btn_confirm">
                Modifica
            </button>

            <button class="btn btn-warning btn_loading" disabled>
                Attendi...
            </button>
        </div>

    </form>
@endsection
