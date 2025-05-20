@extends('layouts.admin')

@section('script')
    <script src="{{ asset('js/typology_tecnlogy_script.js') }}"></script>
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
            <a href="#" class="state_active">
                Tipologie
            </a>
        </li>
    </ul>



    @include('partials.session')

    <div class="header_page">
        <h2>Tipologie</h2>
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
                        <th scope="col">N. Progetti</th>

                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($types as $type)
                        <tr class="">
                            <td>
                                <form action="{{ route('admin.types.update', $type) }}" method="post" class="form_small"
                                    onsubmit="formUpdate(this, event)">
                                    @csrf

                                    @method('PUT')
                                    <div class="mb-3 d-flex gap-2 flex-wrap">

                                        <input type="text"
                                            class="form-control input_create @error('name') is-invalid @enderror"
                                            name="name" id="name" aria-describedby="nameHelper"
                                            placeholder="Lavarel-project" value="{{ $type->name }}"
                                            style="min-width: 100px" />

                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror



                                    </div>

                                    <button class="btn btn-warning d-flex align-items-center gap-1" type="submit">
                                        <i class="fa fa-pencil" aria-hidden="true" style="font-size: 15px"></i>
                                        <span>Modifica</span>
                                    </button>

                                </form>
                            </td>
                            <td class="text-center">
                                {{ $type->projects->count() }}
                            </td>


                            <td>
                                <div class="cell_btn_actions">

                                    <a href="#modal_show_type-{{ $type->id }}" class="btn_action btn_view">
                                        <i class="fa-solid fa-eye fs-sm fs-6"></i>
                                    </a>

                                    <div id="modal_show_type-{{ $type->id }}" class="modal_new">
                                        <div class="modal_show">
                                            <div class="header_modal">
                                                <h2>
                                                    Tipologia
                                                </h2>
                                                <a href="#">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </a>
                                            </div>

                                            <div class="body_modal">

                                                <div class="name_tecnlogy">
                                                    <h5>Nome Tipologia:</h5>
                                                    <span>{{ $type->name }}</span>
                                                </div>

                                                <div class="Number_project">
                                                    <h5>Numero di Progetti:</h5>
                                                    <span>{{ $type->projects->count() }}</span>
                                                </div>

                                                <div class="description_tecnlogy">
                                                    <h5>Descrizione</h5>
                                                    <p>
                                                        {{ $type->description ? $type->description : 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn_action btn_delete" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $type->id }}">
                                        <i class="fa-solid fa-trash fs-6"></i>
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId-{{ $type->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitleId-{{ $type->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId-{{ $type->id }}">
                                                        Attenzione!!⚡⚡ Eliminazione: {{ $type->name }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Sei sicuro di cancellare permanentemente, questa operazione sara
                                                    irreversibile. 💣💣💣
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Chiudi
                                                    </button>
                                                    <form action="{{ route('admin.types.destroy', $type) }}"
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
                                I don't have Type!!! 😭
                            </h1>
                        </tr>
                    @endforelse


                </tbody>
            </table>
            {{ $types->links('pagination::bootstrap-5') }}
        </div>

        <div class="container_create">
            <div class="header_page">
                <h2>Aggiungi tipologia</h2>
            </div>

            <form action="{{ route('admin.types.store') }}" method="post" class="form_small"
                onsubmit="formCreate(this, event)">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label label_create">Name</label>
                    <input type="text" class="form-control  input_create @error('name') is-invalid @enderror"
                        name="name" id="name" aria-describedby="nameHelper" placeholder="Lavarel-project"
                        value="{{ old('name') }}" />


                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="btn_container">
                    <button class="btn btn-primary" type="submit">
                        Crea tipologia
                    </button>

                    <button class="btn btn-primary btn_loading" disabled>
                        Attendi...
                    </button>
                </div>


            </form>
        </div>
    </div>
@endsection
