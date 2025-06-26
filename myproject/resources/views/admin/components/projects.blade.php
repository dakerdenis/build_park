@extends('admin.layouts.app')

@section('content')
    <div class="admin__content__block">

        <div class="admin__content__line">
            <p>All Projects</p>
            <a href="{{ route('admin.projects.add') }}">
                <p>Add Project</p>
                <img src="{{ asset('images/admin/Plus.svg') }}" alt="">
            </a>
        </div>

        <!-- Filters Section -->
        <div class="admin__filters__block">
            <form method="GET" action="{{ route('admin.projects') }}" class="admin__filters__form">
                <div class="admin__filters__group">
                    <label for="categoryFilter">Filter by Category</label>
                    <select name="category_id" id="categoryFilter" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                                {{ $category->name_en }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Future filters can be added here -->
                <!-- Example: Date range, Status, Sorting -->
            </form>
        </div>


        <div class="admin__content__content">
            <div class="admin__content__content-projects">
                @foreach ($projects as $project)
                    <div class="admin__content__content-singleproject" data-project-id="{{ $project->id }}">
                        <h3>{{ $project->name_en }}</h3>

                        <div class="singleproject__image">
                            <img src="{{ asset('uploads/project_images/' . $project->main_image) }}" alt="Main Image">
                        </div>

                        <div class="admin-project_description">
                            <p>{{ $project->description_en }}</p>
                        </div>

                        <div class="project-images">
                            @foreach ($project->images as $image)
                                <img src="{{ asset('uploads/project_images/' . $image) }}" alt="Project Image">
                            @endforeach
                        </div>

                        @if ($project->youtube_url)
                            <a href="{{ $project->youtube_url }}" target="_blank" class="project__youtube__link">Watch
                                Video</a>
                        @endif

                        <div class="project__action__buttons">
                            <a href="{{ url(app()->getLocale() . '/our-projects/' . $project->id) }}" target="_blank" class="view-button">View</a>
                            <a href="{{ route('admin.projects.edit', ['id' => $project->id]) }}" class="edit-button">Edit</a>
                            <button class="delete-button" data-id="{{ $project->id }}">Delete</button>
                        </div>
                        
                    </div>
                @endforeach

                @if ($projects->isEmpty())
                    <p>No projects available.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Popup -->
    <div id="deletePopup" class="popup-overlay">
        <div class="popup-content">
            <p>Are you sure you want to delete this project?</p>
            <div class="popup-buttons">
                <button id="confirmDeleteButton">Yes</button>
                <button id="cancelDeleteButton">No</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let selectedProjectId = null;

            const popup = document.getElementById('deletePopup');
            const confirmButton = document.getElementById('confirmDeleteButton');
            const cancelButton = document.getElementById('cancelDeleteButton');

            document.querySelectorAll('.delete-button').forEach(button => {
                button.addEventListener('click', function() {
                    selectedProjectId = this.getAttribute('data-id');
                    popup.style.display = 'flex';
                });
            });

            cancelButton.addEventListener('click', function() {
                popup.style.display = 'none';
                selectedProjectId = null;
            });

            confirmButton.addEventListener('click', function() {
                if (selectedProjectId) {
                    fetch(`/admin/projects/${selectedProjectId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            } else {
                                alert('Error deleting project.');
                            }
                        });
                }
            });
        });
    </script>
@endsection
