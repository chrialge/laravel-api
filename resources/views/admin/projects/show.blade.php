@extends('layouts.admin')

@section('content')
    <div class="container-show-project">

        {{-- header page --}}
        <div class="header_page">

            {{-- name project --}}
            <div class="name_project">
                <h3 class="d-inline">Nome Progetto: </h3>
                <span>{{ $project->name }}</span>
            </div>

            {{-- button for action --}}
            <div class="btn_action">

                {{-- action previous page --}}
                <a href="{{ route('admin.projects.index') }}" class="btn">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>

                {{-- action update project --}}
                <a class="btn" href="{{ route('admin.projects.edit', $project) }}">
                    <i class="fas fa-pencil-alt fa-sm fa-fw"></i>
                </a>
            </div>
        </div>

        {{-- body page --}}
        <div class="body_page">

            {{-- image project --}}
            <div class="image_project">
                @if (Str::contains($project->cover_image, 'https://'))
                    <img src="{{ $project->cover_image }}" alt="Image of project: {{ $project->title }}">
                @elseif (Str::contains($project->cover_image, 'img/project-default'))
                    <img width="100%" src="{{ asset('img/project-default.jpg') }}"
                        alt="Image of project: {{ $project->title }}">
                @else
                    <img width="100%" src="{{ asset('storage/' . $project->cover_image) }}"
                        alt="Image of project: {{ $project->title }}">
                @endif
            </div>

            {{-- info project --}}
            <div class="info_project">

                {{-- author/authors project --}}
                <div class="author_project">
                    @if ($project->collaborators)
                        <h5>Autori:</h5>
                        <span>
                            @foreach ($project->collaborators as $collaborator)
                                {{ $collaborator . ', ' }}
                            @endforeach
                            {{ $project->user->name . '.' }}
                        </span>
                    @else
                        <h5>Autore:</h5>
                        <span>
                            {{ $project->user->name }}
                        </span>
                    @endif
                </div>

                {{-- typology project --}}
                <div class="typology_project">
                    <h5>Tipo di Progetto:</h5>
                    <span>
                        {{ $project->type ? $project->type->name : 'Indefinito' }}
                    </span>
                </div>

                {{-- dates project --}}
                <div class="dates_project">
                    <h5>Durate progetto:</h5>
                    <span>{{ 'dal ' . date_format(date_create($project->start_date), 'd/m/Y') }}</span>
                    @if (isset($project->finish_date))
                        <span>{{ 'al ' . date_format(date_create($project->finish_date), 'd/m/Y') }}</span>
                    @else
                        <span>al ...</span>
                    @endif
                </div>

                {{-- status project --}}
                <div class="status_project">
                    <h5>Stato: </h5>
                    @if ($project->status == 0)
                        <span>
                            Progetto finito
                            <i class="fa-solid fa-circle" style="color: #0fd212;"></i>
                        </span>
                    @elseif ($project->STATUS == 1)
                        <span>
                            Progetto incompleto
                            <i class="fa-solid fa-circle" style="color: #ebee53;"></i>
                        </span>
                    @else
                        <span>
                            Progetto inizializzato
                            <i class="fa-solid fa-circle" style="color: #fa0000;"></i>
                        </span>
                    @endif
                </div>

                {{-- tecnology project --}}
                <div class="tecnology_project">
                    <h5>Tecnologie: </h5>

                    @forelse ($project->technologies as $technology)
                        @if ($loop->last)
                            <span class=" badge bg-dark">
                                {{ $technology->name }}
                            </span>
                        @else
                            <span class=" badge bg-dark">
                                {{ $technology->name }}
                            </span>,
                        @endif
                    @empty
                        <span class=" badge bg-dark">
                            N/A
                        </span>
                    @endforelse
                </div>

                {{-- urls for project --}}
                <div class="urls_project">
                    <h5>Link:</h5>
                    <a href="{{ $project->url }}" target="blank">vai su
                        <i class="fa-brands fa-github" aria-hidden="true"></i>
                    </a>
                    @if ($project->demo_project)
                        <a href="{{ $project->demo_project }}" target="blank">
                            sito demo
                            <i class="fa-solid fa-computer"></i>
                        </a>
                    @endif

                    @if (isset($project->video))
                        <a href="{{ $project->demo_project }}" target="blank">
                            video progetto
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <div class="bottom_page">
            <div class="description_project">
                <h5>Descrizione</h5>
                <p>
                    @if (isset($project->description))
                        {{ $project->description }}
                    @else
                        N/A
                    @endif
                </p>
            </div>
            <div class="notes_project">
                <h5>Note</h5>

                @if (count($project->notes) > 0)
                    <p class="py-2">
                        {{ $project->notes }}
                    </p>
                @endif

            </div>
        </div>



    </div>
@endsection
