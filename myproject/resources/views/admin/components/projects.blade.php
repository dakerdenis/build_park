                    <div class="admin__content__block">
                        <div class="admin__content__line">
                            <p>All Projects</p>
                            <a href="{{ route('admin.projects.add') }}">
                                <p>Add Project</p>
                                <img src="{{ asset('images/admin/Plus.svg') }}" alt="" srcset="">
                            </a>
                        </div>
                        <div class="admin__content__content">
                            <div class="admin__content__content-projects">
                                @foreach ($projects as $project)
                                    <div class="admin__content__content-singleproject">
                                        <!-- Display project name -->
                                        <h3>{{ $project->name_en }}</h3>

                                        <!-- Display project description -->
                                        <p>{{ $project->description_en }}</p>

                                        <!-- Display project images -->
                                        <div class="project-images">
                                            @foreach ($project->images as $image)
                                                <img src="{{ asset('uploads/project_images/' . $image) }}"
                                                    alt="Project Image">
                                            @endforeach
                                        </div>

                                        <!-- Display YouTube link -->
                                        @if ($project->youtube_link)
                                            <a href="{{ $project->youtube_link }}" target="_blank">Watch Video</a>
                                        @endif
                                    </div>
                                @endforeach

                                @if ($projects->isEmpty())
                                    <p>No projects available.</p>
                                @endif
                            </div>
                        </div>
                    </div>