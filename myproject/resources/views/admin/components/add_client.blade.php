@extends('admin.layouts.app')

@section('content')
    <div class="add-client-page">
        <div class="admin__content__block admin__content__block-clients">
            <div class="admin__content__line">
                <p>Add Client</p>
                <a href="{{ route('admin.clients') }}">
                    <p>Back</p>
                </a>
            </div>
            <div class="admin__content__content">
                <form id="imageUploadForm" action="{{ route('admin.clients.upload') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Drag and Drop Zone -->
                    <div class="upload-area" id="uploadArea">
                        <p>Drag & drop an image here or click to select</p>
                        <input type="file" name="image" id="imageInput" accept="image/*" hidden>
                    </div>

                    <!-- Preview Area -->
                    <div class="preview-area" id="previewArea" style="display: none;">
                        <img id="previewImage" src="" alt="Image Preview">
                        <button type="button" id="removeImageButton" class="remove-button">Remove</button>
                    </div>

                    <!-- Description Input -->
                    <textarea name="description" placeholder="Enter a description for the client (optional)"></textarea>

                    <button type="submit">Upload</button>
                </form>

            </div>

        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const uploadArea = document.getElementById('uploadArea');
            const imageInput = document.getElementById('imageInput');
            const previewArea = document.getElementById('previewArea');
            const previewImage = document.getElementById('previewImage');
            const removeImageButton = document.getElementById('removeImageButton');
            const form = document.getElementById('imageUploadForm');

            const MAX_FILE_SIZE_MB = 2;
            const ALLOWED_TYPES = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];

            uploadArea.addEventListener('click', () => imageInput.click());

            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.classList.add('dragover');
            });

            uploadArea.addEventListener('dragleave', () => {
                uploadArea.classList.remove('dragover');
            });

            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.classList.remove('dragover');
                const file = e.dataTransfer.files[0];
                if (file) handleFile(file);
            });

            imageInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) handleFile(file);
            });

            removeImageButton.addEventListener('click', () => {
                previewArea.style.display = 'none';
                previewImage.src = '';
                imageInput.value = '';
            });

            form.addEventListener('submit', (e) => {
                const file = imageInput.files[0];

                if (!file) {
                    e.preventDefault();
                    alert('Please select an image before submitting.');
                    return;
                }

                if (!ALLOWED_TYPES.includes(file.type)) {
                    e.preventDefault();
                    alert('Only JPG, PNG, and GIF images are allowed.');
                    return;
                }

                if (file.size > MAX_FILE_SIZE_MB * 1024 * 1024) {
                    e.preventDefault();
                    alert('Image size must be less than 2MB.');
                    return;
                }
            });



            function handleFile(file) {
                if (!ALLOWED_TYPES.includes(file.type)) {
                    alert('Only JPG, PNG, and GIF images are allowed.');
                    imageInput.value = '';
                    return;
                }

                if (file.size > MAX_FILE_SIZE_MB * 1024 * 1024) {
                    alert('Image size must be less than 2MB.');
                    imageInput.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImage.src = e.target.result;
                    previewArea.style.display = 'block';
                };
                reader.readAsDataURL(file);

                // ⬇️ Создаём новый FileList с этим файлом
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                imageInput.files = dataTransfer.files;
            }

        });
    </script>
@endsection
