@extends('layouts.admin')

@section('content')
    <div class="container" style="height: calc(100vh - 125px)">
        <div class="d-flex align-items-center justify-content-end gap-2">
            <a href="{{ route('admin.technologies.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

        </div>
        <div class=" py-5">

            <div class="col">

                <h3 class=" d-inline">Technology Name: </h3>
                <span style="font-size: 30px;">{{ $technology->name }}</span>
            </div>


        </div>




    </div>
@endsection
