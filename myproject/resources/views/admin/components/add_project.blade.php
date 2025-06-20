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
            <div class="admin__content__content-clients">
                <form id="projectImageUploadForm" action="{{ route('admin.projects.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="upload-area" id="uploadArea">
                        <p>Drag & drop images here or click to select (max: 5 images, max size: 2MB each)</p>
                        <input type="file" id="projectImageInput" name="images[]" accept="image/*" multiple hidden>
                    </div>

                    <div class="preview-area" id="previewArea"></div>
                    <!-- MAIN IMAGE UPLOAD -->
                    <div class="main-image-upload">
                        <p>Main Image (required)</p>
                        <input type="file" name="main_image" accept="image/*" required>
                    </div>
                    <!-- Preview for Main Image -->
                    <div class="main-preview-area" id="mainPreviewArea" style="display: none;">
                        <img id="mainPreviewImage" src="" alt="Main Image Preview">
                        <button type="button" id="removeMainImageButton" class="remove-main-button">×</button>
                    </div>


                    <!-- ADDRESS -->
                    <div class="project__desc__desc-input">
                        <p>Project Address</p>
                        <input type="text" name="address" id="address">
                    </div>

                    <div class="project__desc__block">

                        <div class="project__category">
                            <p>Select Project Category</p>
                            <select name="category_id" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="projects__desc__name-block">
                            <div class="project__desc__name-input">
                                <p>Project's name EN</p>
                                <input required type="text" name="project__name__en" id="project__name__en">
                            </div>
                            <div class="project__desc__name-input">
                                <p>Project's name RU</p>
                                <input required type="text" name="project__name__ru" id="project__name__ru">
                            </div>
                            <div class="project__desc__name-input">
                                <p>Project's name AZ</p>
                                <input required type="text" name="project__name__az" id="project__name__az">
                            </div>
                        </div>

                        <div class="projects__desc__desc-block">
                            <div class="project__desc__desc-input">
                                <p>Project's DESCRIPTION EN</p>
                                <textarea required name="project__desc__en" id="project__desc__en" cols="30" rows="10"></textarea>
                            </div>
                            <div class="project__desc__desc-input">
                                <p>Project's DESCRIPTION RU</p>
                                <textarea required name="project__desc__ru" id="project__desc__ru" cols="30" rows="10"></textarea>
                            </div>
                            <div class="project__desc__desc-input">
                                <p>Project's DESCRIPTION AZ</p>
                                <textarea required name="project__desc__az" id="project__desc__az" cols="30" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="project__youtube__link">
                            <div class="project__desc__desc-input">
                                <p>Project's YouTube link</p>
                                <input type="text" name="project__video" id="project__video">
                            </div>
                        </div>

                    </div>

                    <button type="submit" id="submitButton">Submit</button>
                </form>
            </div>
        </div>
    </div>




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadArea = document.getElementById('uploadArea');
            const projectImageInput = document.getElementById('projectImageInput');
            const previewArea = document.getElementById('previewArea');
            const submitButton = document.getElementById('submitButton');

            let uploadedImages = [];




            const handleFiles = (files) => {
                for (let file of files) {
                    if (uploadedImages.length >= 5) {
                        alert('You can only upload a maximum of 5 images.');
                        break;
                    }
                    if (file.size > 2 * 1024 * 1024) {
                        alert(`${file.name} exceeds the maximum size of 2MB.`);
                        continue;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewDiv = document.createElement('div');
                        previewDiv.classList.add('preview-image');

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.alt = file.name;

                        const removeButton = document.createElement('button');
                        removeButton.textContent = '×';
                        removeButton.onclick = function() {
                            previewArea.removeChild(previewDiv);
                            uploadedImages = uploadedImages.filter((uploadedFile) => uploadedFile !==
                                file);

                        };

                        previewDiv.appendChild(img);
                        previewDiv.appendChild(removeButton);
                        previewArea.appendChild(previewDiv);

                        uploadedImages.push(file);

                    };
                    reader.readAsDataURL(file);
                }

            };

            uploadArea.addEventListener('click', () => {
                projectImageInput.click();
            });

            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.style.borderColor = '#000';
            });

            uploadArea.addEventListener('dragleave', () => {
                uploadArea.style.borderColor = '#ccc';
            });

            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.style.borderColor = '#ccc';
                handleFiles(e.dataTransfer.files);
            });

            projectImageInput.addEventListener('change', (e) => {
                handleFiles(e.target.files);
            });

            document.getElementById('projectImageUploadForm').addEventListener('submit', function(e) {
                const fileInput = document.getElementById('projectImageInput');
                const files = fileInput.files;

                if (files.length === 0) {
                    e.preventDefault();
                    alert('Please upload at least one image.');
                }
                // Иначе — форма продолжит отправку как обычно
            });




            const mainImageInput = document.querySelector('input[name="main_image"]');
            const mainPreviewArea = document.getElementById('mainPreviewArea');
            const mainPreviewImage = document.getElementById('mainPreviewImage');
            const removeMainImageButton = document.getElementById('removeMainImageButton');

            mainImageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (!file) return;

                if (file.size > 2 * 1024 * 1024) {
                    alert("Main image exceeds 2MB.");
                    mainImageInput.value = "";
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    mainPreviewImage.src = e.target.result;
                    mainPreviewArea.style.display = 'flex';
                };
                reader.readAsDataURL(file);

            });

            removeMainImageButton.addEventListener('click', function() {
                mainImageInput.value = "";
                mainPreviewArea.style.display = 'none';
                mainPreviewImage.src = "";

            });

        });
    </script>
@endsection
