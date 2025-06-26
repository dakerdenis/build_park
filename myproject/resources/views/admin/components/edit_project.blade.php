@extends('admin.layouts.app')

@section('content')
    <div class="admin__content__block">
        <div class="admin__content__line">
            <p>Back to all Projects</p>
            <a href="{{ route('admin.projects') }}">
                <p>Back</p>
            </a>
        </div>

        <div class="admin__content__content">
            @include('admin.dashboard.partials.project_form', [
                'formAction' => route('admin.projects.update', ['id' => $project->id]),
                'isEdit' => true,
                'project' => $project,
                'categories' => $categories
            ])
        </div>
    </div>
@endsection
