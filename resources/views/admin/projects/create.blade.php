@extends('layouts.admin')

@section('content')
    <div class="container p-5">

        @include('partials.validate')

        <div class="d-flex align-items-center justify-content-between">
            <h1>Add new Project</h1>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
        </div>

        {{-- @include('partials.validator_error') --}}
        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelper" placeholder="Lavarel-project" value="{{ old('name') }}" />
                <small id="nameHelper" class="form-text text-muted">Type a name for the current project</small>

                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="url"
                    aria-describedby="urlHelper" placeholder="Https://" value="{{ old('url') }}" />
                <small id="urlHelper" class="form-text text-muted">Type a url for the current project</small>

                @error('url')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="cover_image" class="form-label">Image</label>
                <input type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image"
                    id="cover_image" aria-describedby="cover_imageHelper" placeholder="Https://"
                    value="{{ old('cover_image') }}" />
                <small id="cover_imageHelper" class="form-text text-muted">Type a cover_image for the current
                    project</small>

                @error('cover_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="video" class="form-label">Video</label>
                <input type="file" class="form-control @error('video') is-invalid @enderror" name="video"
                    id="video" aria-describedby="urlHelper" value="{{ old('video') }}" />
                <small id="urlHelper" class="form-text text-muted">Type a video for the current project</small>

                @error('video')
                    <div class="text-video">{{ $message }}</div>
                @enderror
            </div>



            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select form-select-lg" name="type_id" id="type_id">
                    <option selected disabled>Select a category</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <h5>Technologies</h5>
                @foreach ($technologies as $technology)
                    <div class="col">
                        <div class="form-check">
                            <input name="technologies[]" class="form-check-input" type="checkbox"
                                value="{{ $technology->id }}" id="technology-{{ $technology->id }}"
                                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="technology-{{ $technology->id }}">
                                {{ $technology->name }} </label>
                        </div>


                    </div>
                @endforeach

            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select form-select-lg" name="status" id="status">
                    <option value="0">Completed</option>
                    <option value="1">Incompleted</option>
                    <option value="2" selected>don't initialized</option>
                </select>
            </div>


            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                    id="start_date" aria-describedby="startDateHelper" placeholder="2024-03-20"
                    value="{{ old('start_date') }}" />
                <small id="startDateHelper" class="form-text text-muted">Type a start date for the current project</small>

                @error('start_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="finish_date" class="form-label">Finish Date</label>
                <input type="text" class="form-control @error('finish_date') is-invalid @enderror" name="finish_date"
                    id="finish_date" aria-describedby="finishDateHelper" placeholder="2024-03-20"
                    value="{{ old('finish_date') }}" />
                <small id="finishDateHelper" class="form-text text-muted">Type a finish date for the current
                    project</small>

                @error('finish_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    rows="6">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="notes" class="form-label">Notes</label>
                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" id="notes" rows="6">{{ old('notes') }}</textarea>
                @error('notes')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">
                Create
            </button>

        </form>
    </div>
@endsection
