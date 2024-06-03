@extends('layouts.admin')

@section('content')
    <div class="container" style="height: calc(100vh - 125px)">
        <div class="d-flex align-items-center justify-content-end gap-2">
            <a href="{{ route('admin.types.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

            <a class="btn btn-dark" href="{{ route('admin.types.edit', $type) }}"> <i
                    class="fas fa-pencil-alt fa-sm fa-fw"></i>
            </a>

        </div>
        <div class=" py-5">

            <div class="col">

                <h3 class=" d-inline">Type Name: </h3>
                <span style="font-size: 30px;">{{ $type->name }}</span>
            </div>
            <p class="py-2">
                <strong>Description:</strong>
                @if (isset($type->description))
                    {{ $type->description }}
                @else
                    N/A
                @endif

            </p>

        </div>




    </div>
@endsection
