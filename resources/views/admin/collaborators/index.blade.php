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
                Collaboratori
            </a>
        </li>
    </ul>

    {{-- header page --}}
    <div class="header_page flex-wrap">
        <h2>Collaboratori</h2>

        <div class="btn_action_header">
            <a href="{{ route('admin.collaborators.create') }}" class="btn btn-primary">
                <span>
                    Aggiungi Collaboratori
                </span>
                <i class="ri-add-fill"></i>
            </a>

            <a href="{{ route('admin.projects.index') }}" class="btn btn-dark">
                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                Return project
            </a>
        </div>

    </div>

    @include('partials.session')

    <div class="table-responsive">
        <table class="table table-hover table-dark table_data">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col" class="d-none-mobile">
                        <i class="fa-brands fa-square-github fs-4"></i>
                        Url Github
                    </th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($collaborators as $collaborator)
                    <tr class="">
                        <td>{{ $collaborator->name }}</td>
                        <td class="d-none-mobile">{{ $collaborator->url_git }}</td>
                        {{-- actions column --}}
                        <td>

                            <div class="cell_btn_actions">

                                {{-- action view --}}
                                <a href="#modal_show_collaborators-{{ $collaborator->id }}" class="btn_action btn_view">
                                    <i class="fa-solid fa-eye fs-sm fs-6"></i>
                                </a>

                                <div id="modal_show_collaborators-{{ $collaborator->id }}" class="modal_new">
                                    <div class="modal_show">
                                        <div class="header_modal">
                                            <h2>
                                                Collaboratore
                                            </h2>
                                            <a href="#">
                                                <i class="fa-solid fa-xmark"></i>
                                            </a>
                                        </div>

                                        <div class="body_modal">

                                            <div class="name_tecnlogy">
                                                <h5>Nome Tecnologia:</h5>
                                                <span>{{ $collaborator->name }}</span>
                                            </div>

                                            <div class="url_git_profile">
                                                <h5>Url git:</h5>
                                                <a href="{{ $collaborator->url_git }}" target="blank">
                                                    Vai al profilo git
                                                </a>
                                            </div>

                                            <div class="project_collaborator">
                                                <h5>Progetto in collaborazione:</h5>
                                                @forelse ($collaborator->projects as $project)
                                                    <a href="{{ route('admin.projects.show', $project) }}">
                                                        {{ $project->name }}
                                                    </a>
                                                @empty
                                                    <span>N/A</span>
                                                @endforelse
                                            </div>

                                            <div class="info_collaborator">
                                                <h5>Info collaboratore</h5>
                                                <p>
                                                    {{ $collaborator->content ? $collaborator->content : 'N/A' }}
                                                </p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                {{-- action edit --}}
                                <a href="{{ route('admin.collaborators.edit', $collaborator) }}"
                                    class="btn_action btn_update">
                                    <i class="fa-solid fa-pencil fs-6"></i>
                                </a>



                                {{-- modal for action delete --}}
                                <!-- Modal trigger button -->
                                <button type="button" class="btn_action btn_delete" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $collaborator->id }}">
                                    <i class="fa-solid fa-trash fs-6"></i>
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $collaborator->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $collaborator->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId-{{ $collaborator->id }}">
                                                    Attenzione!!⚡⚡ Eliminazione: {{ $collaborator->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di cancellare permanentemente, questa operazione sara
                                                irreversibile.💣💣💣
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Chiudi
                                                </button>
                                                <form action="{{ route('admin.collaborators.destroy', $collaborator) }}"
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
                            I don't have collaborators!!! 😭
                        </h1>
                    </tr>
                @endforelse


            </tbody>
        </table>
        {{ $collaborators->links('pagination::bootstrap-5') }}
    </div>
@endsection
