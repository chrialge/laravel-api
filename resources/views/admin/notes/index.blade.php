@extends('layouts.admin')

@section('content')
    <div class="container vh-100">
        <div class="flex row row-cols-2 py-5">
            <div class="col">
                <div class="d-flex align-items-center justify-content-between ">
                    <h3>Add Note</h3>
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-dark">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Return project
                    </a>
                </div>

                @include('partials.validate')

                <form action="{{ route('admin.notes.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for=" name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" aria-describedby="nameHelper" placeholder="task1" value="{{ old('name') }}" />
                        <small id="nameHelper" class="form-text text-muted">type name in your current note</small>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="project_id" class="form-label">Projects</label>
                        <select class="form-select form-select-lg" name="project_id" id="project_id">
                            <option selected disabled>Select one</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}"
                                    {{ old('project_id') == $project->id ? 'selected' : ' ' }}>{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="content" class="form-label"></label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="6">
                        {{ old('content') }}
                    </textarea>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>

                </form>
            </div>
            <div class="col">
                <div class="d-flex align-items-center justify-content-between pb-4">
                    <h3>Notes</h3>
                    <a href="{{ route('admin.notes.create') }}" class="btn btn-primary">
                        Add note
                    </a>
                </div>

                @include('partials.session')
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Content</th>
                                <th scope="col">Project name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($notes as $note)
                                <tr class="">
                                    <td scope="row">{{ $note->id }}</td>
                                    <td>{{ $note->name }}</td>
                                    <td>{{ $note->slug }}</td>
                                    <td>{{ $note->content }}</td>
                                    <td>{{ $note->project ? $note->project->name : 'N/A' }}</td>
                                    <td>
                                        <div class="d-flex justify-content-between alig-items-center gap-2">
                                            <a href="{{ route('admin.notes.show', $note) }}" class="btn btn-dark">
                                                <i class="fa-solid fa-eye fs-sm fs-6"></i>
                                            </a>
                                            <a href="{{ route('admin.notes.edit', $note) }}" class="btn btn-dark">
                                                <i class="fa-solid fa-pencil fs-6"></i>
                                            </a>



                                            <!-- Modal trigger button -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
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
                                                                Attention!!⚡⚡ Deleting: {{ $note->name }}
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
                                                            <form action="{{ route('admin.notes.destroy', $note) }}"
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
                                        I don't have notes!!! 😭
                                    </h1>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                    {{ $notes->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>


    </div>
@endsection
