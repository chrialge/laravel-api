@extends('layouts.admin')


@section('script')
    <script src="{{ asset('js/project_validation.js') }}"></script>
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
            <a href="{{ route('admin.projects.index') }}" class="state_disactive">
                Progetti
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
        <h2>Add new Project</h2>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-dark">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
    </div>

    @include('partials.validate')

    {{-- @include('partials.validator_error') --}}
    <form class="form_project" action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label label_create">Nome Progetto*</label>
            <input type="text" class="form-control input_create @error('name') is-invalid @enderror" name="name"
                id="name" aria-describedby="nameHelper" placeholder="Lavarel-project" value="{{ old('name') }}" />


            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="url" class="form-label label_create">URL Git*</label>
            <input type="text" class="form-control input_create @error('url') is-invalid @enderror" name="url"
                id="url" aria-describedby="urlHelper" placeholder="https://" value="{{ old('url', 'https://') }}"
                onkeyup="listResult()" onblur="dropListResult()" />

            <span class="js_error" id="error_url">Url di git non valido</span>

            <ul id="result">

            </ul>

            @error('url')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="demo_project" class="form-label label_create">URl Demo</label>
            <input type="text" class="form-control input_create @error('demo_project') is-invalid @enderror"
                name="demo_project" id="demo_project" aria-describedby="urlHelper" placeholder="Https://"
                value="{{ old('demo_project', 'https://') }}" onkeyup="hideErrorUrlDemo()" onblur="checkUrlDemo()" />

            <span class="js_error" id="error_url_demo">Link non valido</span>

            @error('demo_project')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="cover_image" class="form-label label_create">Immagine</label>
            <input type="file" class="form-control input_create input_file @error('cover_image') is-invalid @enderror"
                name="cover_image" id="cover_image" aria-describedby="cover_imageHelper" placeholder="Https://"
                value="{{ old('cover_image') }}" />

            @error('cover_image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="video" class="form-label label_create">Video Youtube url</label>
            <input type="text" class="form-control input_create @error('video') is-invalid @enderror" name="video"
                id="video" aria-describedby="urlHelper" value="{{ old('video', 'https://') }}"
                onkeyup="hideErrorVideo()" onblur="checkVideo()" />

            <span class="js_error" id="error_video">Url di youtube non valido</span>

            @error('video')
                <div class="text-video">{{ $message }}</div>
            @enderror
        </div>



        <div class="mb-3">
            <label for="type_id" class="form-label label_create">Tipologia</label>
            <select class="form-select form-select-lg" name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                        {{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="collaborators" class="form-label label_create">Collaboratori</label>
            <select multiple class="form-select form-select-lg" name="collaborators[]" id="collaborators">
                <option disabled>Select one</option>
                @foreach ($collaborators as $collaborator)
                    <option value="{{ $collaborator->id }}"
                        {{ in_array($collaborator->id, old('collaborators', [])) ? 'selected' : '' }}>
                        {{ $collaborator->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="row mb-3">
            <h5 class="label_create mb-2">Tecnologie</h5>
            @foreach ($technologies as $technology)
                <div class="col">
                    <div class="form-check">
                        <input name="technologies[]" class="form-check-input" type="checkbox"
                            value="{{ $technology->id }}" id="technology-{{ $technology->id }}"
                            {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }} />
                        <label class="form-check-label" for="technology-{{ $technology->id }}">
                            {{ $technology->name }} </label>
                    </div>


                </div>
            @endforeach

        </div>

        <div class="mb-3">
            <label for="status" class="form-label label_create">Status</label>
            <select class="form-select form-select-lg" name="status" id="status">
                <option value="0">Completa</option>
                <option value="1">Incompleta</option>
                <option value="2" selected>Inizializzata</option>
            </select>
        </div>

        <div class="dates_project">
            <div class="field_date">
                <label for="start_date" class="form-label label_create">Data d'inizio*</label>
                <input type="date" class="form-control input_create @error('start_date') is-invalid @enderror"
                    name="start_date" id="start_date" aria-describedby="startDateHelper" placeholder="19/04/2025"
                    value="{{ old('start_date') }}" />

                @error('start_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="field_date">
                <label for="finish_date" class="form-label label_create">Data di fine</label>
                <input type="date" class="form-control input_create @error('finish_date') is-invalid @enderror"
                    name="finish_date" id="finish_date" aria-describedby="finishDateHelper" placeholder="20/04/2025"
                    value="{{ old('finish_date') }}" />


                @error('finish_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>




        <div class="mb-3">
            <label for="description" class="form-label label_create">Description</label>
            <textarea class="form-control input_create @error('description') is-invalid @enderror" name="description"
                id="description" rows="6">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="container_note ">

            <div class="header_note">
                <h2>Aggiungi nota</h2>
                <i class="fa-solid fa-plus"></i>
            </div>
            <div class="mb-3">
                <label for="note_name" class="form-label label_create">Titolo nota</label>
                <input type="text" class="form-control input_create @error('note_name') is-invalid @enderror"
                    name="note_name" id="note_name" aria-describedby="helpId" placeholder="add scroll custom" />

                @error('note_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="note_content" class="form-label label_create">Descrizione nota</label>
                <textarea class="form-control input_create @error('notes') is-invalid @enderror" name="note_content"
                    id="note_content" rows="6">{{ old('notes') }}</textarea>

                @error('note_content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>


        <div class="container_btn">
            <button class="btn btn-primary" type="submit">
                Crea Progetto
            </button>

            <button class="btn btn-primary btn_loading" disabled>
                Attendi...
            </button>
        </div>



    </form>
@endsection
