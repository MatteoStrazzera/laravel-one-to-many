@extends('layouts.admin')

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="text-muted">{{ $project->title }}</h2>
            <div class="row py-4">
                <div class="col-6">
                    @if (Str::startsWith($project->image, 'https://'))
                        <img class="img-fluid" loading="lazy" src="{{ $project->image }}" alt="{{ $project->title }}">
                    @else
                        <img class="img-fluid" loading="lazy" src="{{ asset('storage/' . $project->image) }}"
                            alt="{{ $project->title }}">
                    @endif
                </div>
                <div class="col-6">
                    <ul class="list-unstyled">
                        <li>
                            <strong>Description:</strong> {{ $project->description }}
                        </li>
                        <hr>
                        <li>
                            <div class="metadata">
                                <strong>Type:</strong> {{ $project->type ? $project->type->name : 'No type assigned' }}
                            </div>
                        </li>
                        <hr>
                        <li>
                            <strong>Repository URL:</strong> <a href="{{ $project->url_repo }}">{{ $project->url_repo }}</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
@endsection
