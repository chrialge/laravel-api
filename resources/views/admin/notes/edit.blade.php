@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/note_validator.js') }}"></script>
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
                Note
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
        <h2>Modifica Nota</h2>
        <a href="{{ route('admin.notes.index') }}" class="btn btn-dark">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>

    @include('partials.validate')


    <form action="{{ route('admin.notes.update', $note) }}" method="post" class="form_small"
        onsubmit="check_form_update(event)">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for=" name" class="form-label label_create">Nome*</label>
            <input type="text" class="form-control input_create @error('name') is-invalid @enderror" name="name"
                id="name" aria-describedby="nameHelper" placeholder="task1" value="{{ old('name', $note->name) }}"
                onblur="check_name()" onkeyup="hide_error_name()" />

            <span class="error_js" id="error_name_js">
                Il nome deve essere di almeno 3 caratteri, e sono accetati solo
                caratteri alfabetici
            </span>

            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="project_id" class="form-label label_create">Progetto*</label>
            <select class="form-select form-select-lg input_create" name="project_id" id="project_id">
                @foreach ($projects as $project)
                    <option value="{{ $project->id }}"
                        {{ old('project_id') == $project->id || $note->project_id == $project->id ? 'selected' : ' ' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="content" class="form-label label_create">Contenuto*</label>
            <textarea class="form-control input_create @error('content') is-invalid @enderror" name="content" id="content"
                rows="6" onblur="check_content()" onkeyup="hide_error_content()">
                {{ old('content', $note->content) }}
            </textarea>

            <span class="error_js" id="error_content_js">
                Il contenuto deve essere di almeno di 20 caratteri
            </span>

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
