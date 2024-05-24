@extends('layouts.admin')

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="text-muted">{{ $project->title }}</h2>
            <div class="row py-4">
                <div class="col-6">
                    <img class="img-fluid" src="{{ $project->image }}" alt="{{ $project->title }}">
                </div>
                <div class="col-6">
                    <ul class="list-unstyled">
                        <li>

                        </li>
                        <li>
                            <strong>Description:</strong> {{ $project->description }}
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
