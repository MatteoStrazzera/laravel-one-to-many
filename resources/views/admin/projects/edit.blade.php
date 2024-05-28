@extends('layouts.admin')

@section('content')
    <div class="container py-5">
        <h2>Editing Project: {{ $project->title }}</h2>

        @include('partials.alert-error-form')

        <form action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    aria-describedby="titleHelper" placeholder="Project name #1"
                    value="{{ old('title', $project->title) }}" />
                <small id="titleHelper" class="form-text text-muted">Type a title for the project</small>
                @error('title')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="d-flex gap-3 mb-3">
                @if (Str::startsWith($project->image, 'https://'))
                    <img width="140" src="{{ $project->image }}" alt="{{ $project->title }}">
                @else
                    <img width="140" src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                @endif
                <div>
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                        id="image" aria-describedby="imageHelper" placeholder="https://"
                        value="{{ old('image', $project->image) }}" />
                    <small id="imageHelper" class="form-text text-muted">Type an image URL</small>
                    @error('image')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select form-select" name="type_id" id="type_id">
                    <option selected disabled>Select a Type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="url_repo" class="form-label">Repository URL</label>
                <input type="text" class="form-control @error('url_repo') is-invalid @enderror" name="url_repo"
                    id="url_repo" aria-describedby="url_repoHelper" placeholder="https://"
                    value="{{ old('url_repo', $project->url_repo) }}" />
                <small id="url_repoHelper" class="form-text text-muted">Type the repository URL</small>
                @error('url_repo')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                    cols="30" rows="10" aria-describedby="descriptionHelper" placeholder="Project description...">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">
                Update Project
            </button>
        </form>
    </div>
@endsection
