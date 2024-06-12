@extends('layouts.admin')

@section('content')
    <div class="container vh-100">
        <div class="flex">
            <div class="col">
                <div class="d-flex align-items-center justify-content-between">
                    <h3>Add Type</h3>
                    <a href="{{ route('admin.types.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>

                </div>

                @include('partials.validate')

                <form action="{{ route('admin.types.update', $type) }}" method="post">
                    @csrf

                    @method('PUT')
                    <div class="mb-3">
                        <label for=" name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            id="name" aria-describedby="nameHelper" placeholder="task1"
                            value="{{ old('name', $type->name) }}" />
                        <small id="nameHelper" class="form-text text-muted">type name in your current note</small>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>




                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                            rows="6">
                        {{ old('description', $type->description) }}
                    </textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning">
                        Update
                    </button>

                </form>
            </div>
        </div>


    </div>
@endsection
