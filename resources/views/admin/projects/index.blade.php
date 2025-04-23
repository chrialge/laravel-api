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
                Progetti
            </a>
        </li>
    </ul>

    {{-- header page --}}
    <div class="header_page">
        <h2>Progetti</h2>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
            <span>
                Aggiungi Progetto
            </span>
            <i class="ri-add-fill"></i>
        </a>
    </div>

    {{-- message of session --}}
    @include('partials.session')

    <div class="table-responsive">
        <table class="table table-hover table-dark table_data">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col" class="text_hidden">
                        Progetto
                        <i class="ri-github-fill"></i>
                    </th>
                    <th scope="col" style="text-align: center">Status</th>
                    <th scope="col">Data</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr>
                        <td scope="row">{{ $project->name }}</td>
                        <td class="text_hidden">
                            <a href="{{ $project->url }}" target="blank">
                                Vai al progetto.
                            </a>
                        </td>
                        <td style="text-align: center">
                            @if ($project->status == 0)
                                <i class="fa-solid fa-circle" style="color: #0fd212;"></i>
                            @elseif ($project->status == 1)
                                <i class="fa-solid fa-circle" style="color: #ebee53;"></i>
                            @else
                                <i class="fa-solid fa-circle" style="color: #fa0000;"></i>
                            @endif
                        </td>
                        <td>
                            {{ date_format(date_create($project->start_date), 'd/m/Y') }}
                            @if ($project->status === 0)
                                {{ '- ' . date_format(date_create($project->finish_date), 'd/m/Y') }}
                            @endif
                        </td>
                        <td>
                            <div class="cell_btn_actions">

                                <a href="{{ route('admin.projects.show', $project) }}" class="btn_action btn_view">
                                    <i class="fa-solid fa-eye fs-sm fs-6"></i>
                                </a>

                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn_action btn_update">
                                    <i class="fa-solid fa-pencil fs-6"></i>
                                </a>



                                <!-- Modal trigger button -->
                                <button type="button" class="btn_action btn_delete" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $project->id }}">
                                    <i class="fa-solid fa-trash fs-6"></i>
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $project->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId-{{ $project->id }}">
                                                    Attention!!⚡⚡ Deleting: {{ $project->name }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                You are about to dlete this record. This operation is
                                                DESCTRUCTIVE!💣💣💣
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <form action="{{ route('admin.projects.destroy', $project) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        Confirm
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
                    <tr>
                        <th scope="row" colspan="5">Attualmente non ci sono progetti!!😭😭</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>





    {{ $projects->links('pagination::bootstrap-5') }}
@endsection
