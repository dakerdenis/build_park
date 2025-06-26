<form id="projectImageUploadForm" action="{{ $formAction }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($isEdit)
        @method('PUT')
    @endif

    <div class="upload-area" id="uploadArea">
        <p>Drag & drop images here or click to select (max: 5 images, max size: 2MB each)</p>
        <input type="file" id="projectImageInput" name="images[]" accept="image/*" multiple hidden>
    </div>

    <div class="preview-area" id="previewArea">
        @if($isEdit && $project->images)
            @foreach($project->images as $image)
                <div class="preview-image">
                    <img src="{{ asset('uploads/project_images/' . $image) }}" alt="Project Image">
                </div>
            @endforeach
        @endif
    </div>

    <!-- MAIN IMAGE UPLOAD -->
    <div class="main-image-upload">
        <p>Main Image (required)</p>
        <input type="file" name="main_image" accept="image/*">
    </div>

    <!-- Preview for Main Image -->
    <div class="main-preview-area" id="mainPreviewArea" style="display: {{ $isEdit ? 'flex' : 'none' }};">
        <img id="mainPreviewImage" src="{{ $isEdit ? asset('uploads/project_images/' . $project->main_image) : '' }}" alt="Main Image Preview">
        <button type="button" id="removeMainImageButton" class="remove-main-button">×</button>
    </div>

    <!-- ADDRESS -->
    <div class="project__desc__desc-input">
        <p>Project Address</p>
        <input type="text" name="address" id="address" value="{{ $isEdit ? $project->address : '' }}">
    </div>

    <div class="project__desc__block">
        <div class="project__category">
            <p>Select Project Category</p>
            <select name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $isEdit && $project->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name_en }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="projects__desc__name-block">
            <div class="project__desc__name-input">
                <p>Project's name EN</p>
                <input required type="text" name="project__name__en" value="{{ $isEdit ? $project->name_en : '' }}">
            </div>
            <div class="project__desc__name-input">
                <p>Project's name RU</p>
                <input required type="text" name="project__name__ru" value="{{ $isEdit ? $project->name_ru : '' }}">
            </div>
            <div class="project__desc__name-input">
                <p>Project's name AZ</p>
                <input required type="text" name="project__name__az" value="{{ $isEdit ? $project->name_az : '' }}">
            </div>
        </div>

        <div class="projects__desc__desc-block">
            <div class="project__desc__desc-input">
                <p>Project's DESCRIPTION EN</p>
                <textarea required name="project__desc__en" cols="30" rows="10">{{ $isEdit ? $project->description_en : '' }}</textarea>
            </div>
            <div class="project__desc__desc-input">
                <p>Project's DESCRIPTION RU</p>
                <textarea required name="project__desc__ru" cols="30" rows="10">{{ $isEdit ? $project->description_ru : '' }}</textarea>
            </div>
            <div class="project__desc__desc-input">
                <p>Project's DESCRIPTION AZ</p>
                <textarea required name="project__desc__az" cols="30" rows="10">{{ $isEdit ? $project->description_az : '' }}</textarea>
            </div>
        </div>

        <div class="project__youtube__link">
            <div class="project__desc__desc-input">
                <p>Project's YouTube link</p>
                <input type="text" name="project__video" value="{{ $isEdit ? $project->youtube_url : '' }}">
            </div>
        </div>
    </div>

    <button type="submit" id="submitButton">Save</button>
</form>
