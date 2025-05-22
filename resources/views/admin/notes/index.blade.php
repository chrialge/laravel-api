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
            <a href="#" class="state_active">
                Note
            </a>
        </li>
    </ul>

    @include('partials.session')



    <div class="header_page">
        <h2>Note</h2>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-dark">
            <i class="fa fa-arrow-left" aria-hidden="true"></i>
            Ritorna ai progetti
        </a>
    </div>

    <div class="container_small_crud">

        <div class="table-responsive">
            <table class="table table-hover table-dark table_data">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Nome progetto</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($notes as $note)
                        <tr class="">
                            <td>{{ $note->name }}</td>
                            <td>{{ $note->project ? $note->project->name : 'N/A' }}</td>
                            <td>
                                <div class="cell_btn_actions">

                                    <a href="#modal_show_note-{{ $note->id }}" class="btn_action btn_view">
                                        <i class="fa-solid fa-eye fs-sm fs-6"></i>
                                    </a>

                                    <div id="modal_show_note-{{ $note->id }}" class="modal_new">
                                        <div class="modal_show">
                                            <div class="header_modal">
                                                <h2>
                                                    Nota
                                                </h2>
                                                <a href="#">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </a>
                                            </div>

                                            <div class="body_modal">

                                                <div class="name_tecnlogy">
                                                    <h5>Nome Tecnologia:</h5>
                                                    <span>{{ $note->name }}</span>
                                                </div>

                                                <div class="Number_project">
                                                    <h5>Nome progetto correlato:</h5>
                                                    <span>{{ $note->project ? $note->project->name : 'N/A' }}</span>
                                                </div>

                                                <div class="description_tecnlogy">
                                                    <h5>Contenuto</h5>
                                                    <p>
                                                        {{ $note->content }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ route('admin.notes.edit', $note) }}" class="btn_action btn_update">
                                        <i class="fa-solid fa-pencil fs-6"></i>
                                    </a>



                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn_action btn_delete" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $note->id }}">
                                        <i class="fa-solid fa-trash fs-6"></i>
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId-{{ $note->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitleId-{{ $note->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId-{{ $note->id }}">
                                                        Attenzione!!⚡⚡ Eliminazione: {{ $note->name }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di cancellare permanentemente, questa operazione sara
                                                    irreversibile.💣💣💣
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Chiudi
                                                    </button>
                                                    <form action="{{ route('admin.notes.destroy', $note) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            Conferma
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>









                                </div>

                            </td>

                        </tr>
                    @empty
                        <tr class="">
                            <h1>
                                I don't have notes!!! 😭
                            </h1>
                        </tr>
                    @endforelse


                </tbody>
            </table>
            {{ $notes->links('pagination::bootstrap-5') }}
        </div>

        <div class="container_create">
            <div class="header_page">
                <h2>Aggiungi Nota</h2>
            </div>


            <form action="{{ route('admin.notes.store') }}" method="post" class="form_small">
                @csrf

                <div class="mb-3">
                    <label for=" name" class="form-label label_create">Nome*</label>
                    <input type="text" class="form-control input_create @error('name') is-invalid @enderror"
                        name="name" id="name" aria-describedby="nameHelper" placeholder="task1"
                        value="{{ old('name') }}" />


                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="project_id" class="form-label label_create">Progetto*</label>
                    <select class="form-select form-select-lg input_create" name="project_id" id="project_id">
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}"
                                {{ old('project_id') == $project->id ? 'selected' : ' ' }}>{{ $project->name }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-3">
                    <label for="content" class="form-label label_create">Contenuto*</label>
                    <textarea class="form-control input_create @error('content') is-invalid @enderror" name="content" id="content"
                        rows="6">
                        {{ old('content') }}
                    </textarea>
                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="btn_container">
                    <button class="btn btn-primary" type="submit">
                        Crea nota
                    </button>

                    <button class="btn btn-primary btn_loading" disabled>
                        Attendi...
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
