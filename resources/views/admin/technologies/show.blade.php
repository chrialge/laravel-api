@extends('layouts.admin')

@section('content')
    <div class="container" style="height: calc(100vh - 125px)">
        <div class="d-flex align-items-center justify-content-end gap-2">
            <a href="{{ route('admin.technologies.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

        </div>
        <div class=" py-5">
            <div class="header pb-5">
                <div class="header-technologies">
                    <div class="title">

                        <h3 class=" d-inline">Technology Name: </h3>
                        <span style="font-size: 30px;">{{ $technology->name }}</span>
                    </div>
                    <div class="slug fs-4 text-gray pb-5">
                        <span>{{ $technology->slug }}</span>
                    </div>
                </div>

                <div class="total_project">
                    <h5>Number project use this technology: {{ $technology->total_projects }}</h5>
                </div>
            </div>



            <p>
            <h4>Description: </h4>
            {{ $technology->description ? $technology : 'N/A' }}
            </p>
        </div>




    </div>
@endsection
