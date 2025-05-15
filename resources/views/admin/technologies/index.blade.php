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
                Tecnlogie
            </a>
        </li>
    </ul>




    @include('partials.session')



    <div class="header_page">
        <h2>Tecnlogie</h2>
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

                    @forelse ($technologies as $technology)
                        <tr class="">
                            <td>
                                <form action="{{ route('admin.technologies.update', $technology) }}" method="post">
                                    @csrf

                                    @method('PUT')
                                    <div class="mb-3 d-flex gap-2 flex-wrap">

                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" aria-describedby="nameHelper"
                                            placeholder="Lavarel-project" value="{{ $technology->name }}"
                                            style="min-width: 100px" />

                                        <button class="btn btn-warning d-flex align-items-center gap-1" type="submit">
                                            <i class="fa fa-pencil" aria-hidden="true" style="font-size: 15px"></i>
                                            <span>Modifica</span>
                                        </button>

                                    </div>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </form>
                            </td>

                            <td class="text-center">

                                {{ $technology->projects->count() }}

                            </td>


                            <td>
                                <div class="cell_btn_actions">


                                    <a href="#modal_show_tecno-{{ $technology->id }}" class="btn_action btn_view">
                                        <i class="fa-solid fa-eye fs-sm fs-6"></i>
                                    </a>

                                    <div id="modal_show_tecno-{{ $technology->id }}" class="modal_new">
                                        <div class="modal_show_tecnlogy">
                                            <div class="header_modal">
                                                <h2>
                                                    Tecnologia
                                                </h2>
                                                <a href="#">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </a>
                                            </div>

                                            <div class="body_modal">

                                                <div class="name_tecnlogy">
                                                    <h5>Nome Tecnologia:</h5>
                                                    <span>{{ $technology->name }}</span>
                                                </div>

                                                <div class="Number_project">
                                                    <h5>Numero di Progetti:</h5>
                                                    <span>{{ $technology->projects->count() }}</span>
                                                </div>

                                                <div class="description_tecnlogy">
                                                    <h5>Descrizione</h5>
                                                    <p>
                                                        {{ $technology->description ? $technology->description : 'N/A' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn_action btn_delete" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $technology->id }}">
                                        <i class="fa-solid fa-trash fs-6"></i>
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId-{{ $technology->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitleId-{{ $technology->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId-{{ $technology->id }}">
                                                        Attention!!⚡⚡ Deleting: {{ $technology->name }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    You are about to dlete this record. This operation is
                                                    DESCTRUCTIVE!💣💣💣
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <form action="{{ route('admin.technologies.destroy', $technology) }}"
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
                        <tr class="">
                            <h1>
                                I don't have Type!!! 😭
                            </h1>
                        </tr>
                    @endforelse


                </tbody>
            </table>
            {{ $technologies->links('pagination::bootstrap-5') }}
        </div>



        <div class="container_create">
            <div class="header_page">
                <h2>Aggiungi tecnologia</h2>
            </div>

            @include('partials.validate')

            <form action="{{ route('admin.technologies.store') }}" method="post" class="form_small">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label label_create">Nome Tecnlogia*</label>
                    <input type="text" class="form-control input_create @error('name') is-invalid @enderror"
                        name="name" id="name" aria-describedby="nameHelper" placeholder="Lavarel-project"
                        value="{{ old('name') }}" />


                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="btn_container">
                    <button class="btn btn-primary" type="submit">
                        Crea tecnologia
                    </button>

                    <button class="btn btn-primary btn_loading" disabled>
                        Attendi...
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
