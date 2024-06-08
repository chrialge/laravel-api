@extends('layouts.admin')

@section('content')
    <div class="container vh-100">
        <div class="flex">
            <div class="col">
                <h3>Edit Collaborator</h3>

                @include('partials.validate')

                <form action="{{ route('admin.collaborators.update', $collaborator) }}" method="post">
                    @csrf

                    @method('PUT')
                    <div class="mb-3">
                        <label for=" name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" aria-describedby="nameHelper" placeholder="task1"
                            value="{{ old('name', $collaborator->name) }}" />
                        <small id="nameHelper" class="form-text text-muted">type name in your current collaborator</small>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="url_git" class="form-label">
                            <i class="fa-brands fa-square-github"></i>
                            Account Github
                        </label>
                        <input type="text" class="form-control @error('url_git') is-invalid @enderror" name="url_git"
                            id="url_git" aria-describedby="url_gitHelper" placeholder="task1"
                            value="{{ old('url_git', $collaborator->url_git) }}" />
                        <small id="url_gitHelper" class="form-text text-muted">type accoun github in your current
                            collaborator</small>
                        @error('url_git')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="6">
                        {{ old('content', $collaborator->content) }}
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
