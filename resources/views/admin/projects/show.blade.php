@extends('layouts.admin')

@section('content')
    <div class="container vh-100">
        <div class="d-flex align-items-center justify-content-end gap-2">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-dark">
                <i class="fa-solid fa-arrow-left"></i>
            </a>

            <a class="btn btn-dark" href="{{ route('admin.projects.edit', $project) }}"> <i
                    class="fas fa-pencil-alt fa-sm fa-fw"></i>
            </a>

        </div>
        <div class="image_project">
            @if (Str::contains($project->cover_image, 'https://'))
                <img src="{{ $project->cover_image }}" alt="Image of project: {{ $project->title }}">
            @else
                <img width="140" src="{{ asset('storage/' . $project->cover_image) }}"
                    alt="Image of project: {{ $project->title }}">
            @endif
        </div>
        <div class="d-flex justify-content-between align-items-lg-center py-5">

            <div class="col">

                <h3 class=" d-inline">Project Name: </h3>
                <span style="font-size: 30px;">{{ $project->name }}</span>
            </div>


            <div class="col d-flex justify-content-end gap-3">
                <span><strong>Start date:</strong> {{ $project->start_date }}</span>
                <span><strong>Finish date:</strong>
                    @if (isset($project->finish_date))
                        {{ $project->finish_date }}
                    @else
                        N/A
                    @endif

                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h5 class=" d-inline py-2">Status: </h5>
                @if ($project->status == 0)
                    <span>
                        Completed
                        <td><i class="fa-solid fa-circle" style="color: #0fd212;"></i></td>
                    </span>
                @elseif ($project->STATUS == 1)
                    <span>
                        Incompleted
                        <td><i class="fa-solid fa-circle" style="color: #ebee53;"></i></td>
                    </span>
                @else
                    <span>
                        don't initialized
                        <td><i class="fa-solid fa-circle" style="color: #fa0000;"></i></td>
                    </span>
                @endif

                <span class="d-block py-2"><strong>URL: </strong> {{ $project->url }}</span>

                <span class="d-block py-2"><strong>Author: </strong>
                    {{ $project->user ? $project->user->name : 'N/A' }}</span>


                <span class="d-block py-2"><strong>Type:
                    </strong>{{ $project->type ? $project->type->name : 'Untyped' }}</span>

                <span class=" d-block py-2">
                    <strong>Technology: </strong>


                    @forelse ($project->technologies as $technology)
                        @if ($loop->last)
                            <span class=" badge bg-dark">
                                {{ $technology->name }}
                            </span>
                        @else
                            <span class=" badge bg-dark">
                                {{ $technology->name }}
                            </span>,
                        @endif


                    @empty
                        <span class=" badge bg-dark">
                            N/A
                        </span>
                    @endforelse


                </span>


                <p class="py-2">
                    <strong>Description:</strong>
                    @if (isset($project->description))
                        {{ $project->description }}
                    @else
                        N/A
                    @endif

                </p>

            </div>
            <div class="col-6">


                @if (isset($project->video))
                    <h5>Videos:</h5>
                    <video width="320" height="240" controls>
                        @if (Str::finish($project->video, '.mp4'))
                            <source src="{{ asset('storage/' . $project->video) }}" type="video/mp4">
                        @elseif (Str::finish($project->video, '.webm'))
                            <source src="{{ asset('storage/' . $project->video) }}" type="video/webm">
                        @endif


                    </video>
                @endif
                <p class="py-2">
                    <strong>Notes:</strong>


                    @if (isset($project->notes))
                        {{ $project->notes }}
                    @else
                        N/A
                    @endif


                </p>
            </div>
        </div>



    </div>
@endsection
