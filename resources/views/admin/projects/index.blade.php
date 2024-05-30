@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between py-5">
            <h3>Projects</h3>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
                Add Project
            </a>
        </div>

        @include('partials.session')
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">project github</th>
                        <th scope="col">type</th>

                        <th scope="col">Image</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Finish Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($projects as $project)
                        <tr class="">
                            <td scope="row">{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td><a href="{{ $project->url }}">view project</a></td>
                            <td>{{ $project->type ? $project->type->name : 'Untyped' }}</td>

                            <td>
                                @if (Str::contains($project->cover_image, ['https://', 'http://']))
                                    <img src="{{ $project->cover_image }}" alt="Image of project: {{ $project->title }}">
                                @else
                                    <img width="140" src="{{ asset('storage/' . $project->cover_image) }}"
                                        alt="{{ $project->title ? "Image of project: $project->title" : "don't image of the project" }}">
                                @endif


                            </td>
                            <td>{{ $project->start_date }}</td>
                            <td>
                                @if ($project->status === 0)
                                    {{ $project->finish_date }}
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($project->status == 0)
                                    <i class="fa-solid fa-circle" style="color: #0fd212;"></i>
                                @elseif ($project->status == 1)
                                    <i class="fa-solid fa-circle" style="color: #ebee53;"></i>
                                @else
                                    <i class="fa-solid fa-circle" style="color: #fa0000;"></i>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-between alig-items-center gap-2">
                                    <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-dark">
                                        <i class="fa-solid fa-eye fs-sm fs-6"></i>
                                    </a>
                                    <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-dark">
                                        <i class="fa-solid fa-pencil fs-6"></i>
                                    </a>



                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
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
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
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
                        <tr class="">
                            <h1>
                                I don't have Projects!!! 😭
                            </h1>
                        </tr>
                    @endforelse


                </tbody>
            </table>
        </div>

        {{ $projects->links('pagination::bootstrap-5') }}

    </div>
@endsection
