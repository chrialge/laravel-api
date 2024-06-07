@extends('layouts.admin')

@section('content')
    <div class="container vh-100">
        <div class="flex">
            <div class="col">
                <h3>Add Note</h3>

                @include('partials.validate')

                <form action="{{ route('admin.notes.update', $note) }}" method="post">
                    @csrf

                    @method('PUT')
                    <div class="mb-3">
                        <label for=" name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" aria-describedby="nameHelper" placeholder="task1"
                            value="{{ old('name', $note->name) }}" />
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
                                    {{ old('project_id') == $project->id || $note->project_id == $project->id ? 'selected' : ' ' }}>
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="6">
                        {{ old('content', $note->content) }}
                    </textarea>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning">
                        UPDATE
                    </button>

                </form>
            </div>
        </div>


    </div>
@endsection
