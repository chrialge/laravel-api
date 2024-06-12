@extends('layouts.admin')

@section('content')
    <div class="container vh-100">
        <div class="flex row py-5">
            <div class="col">
                <div class="d-flex align-items-center justify-content-between pb-4">
                    <h3>Collaborators</h3>
                    <div class="button">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-dark">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            Return project
                        </a>
                        <a href="{{ route('admin.collaborators.create') }}" class="btn btn-primary">
                            Add collaborator
                        </a>
                    </div>

                </div>

                @include('partials.session')
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">
                                    <i class="fa-brands fa-square-github fs-4"></i>
                                    Url Github
                                </th>
                                <th scope="col">Project name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($collaborators as $collaborator)
                                <tr class="">
                                    <td scope="row">{{ $collaborator->id }}</td>
                                    <td>{{ $collaborator->name }}</td>
                                    <td>{{ $collaborator->slug }}</td>
                                    <td>{{ $collaborator->url_git }}</td>
                                    <td>{{ $collaborator->project ? $collaborator->project->name : 'N/A' }}</td>
                                    {{-- actions column --}}
                                    <td>

                                        <div class="d-flex justify-content-between alig-items-center gap-2">

                                            {{-- action view --}}
                                            <a href="{{ route('admin.collaborators.show', $collaborator) }}"
                                                class="btn btn-dark">
                                                <i class="fa-solid fa-eye fs-sm fs-6"></i>
                                            </a>

                                            {{-- action edit --}}
                                            <a href="{{ route('admin.collaborators.edit', $collaborator) }}"
                                                class="btn btn-dark">
                                                <i class="fa-solid fa-pencil fs-6"></i>
                                            </a>



                                            {{-- modal for action delete --}}
                                            <!-- Modal trigger button -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
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
                                                            <h5 class="modal-title"
                                                                id="modalTitleId-{{ $collaborator->id }}">
                                                                Attention!!⚡⚡ Deleting: {{ $collaborator->name }}
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
                                                            <form
                                                                action="{{ route('admin.collaborators.destroy', $collaborator) }}"
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
                                        I don't have collaborators!!! 😭
                                    </h1>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                    {{ $collaborators->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>


    </div>
@endsection
