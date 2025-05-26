                    <div class="admin__content__block admin__content__block-clients">
                        <div class="admin__content__line">
                            <p>Add Client</p>
                            <a href="{{ route('admin.clients') }}">
                                <p>Back</p>
                            </a>
                        </div>
                        <div class="admin__content__content">
                            <form id="imageUploadForm" action="{{ route('client.upload') }}" method="POST"
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
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const uploadArea = document.getElementById('uploadArea');
                            const imageInput = document.getElementById('imageInput');
                            const previewArea = document.getElementById('previewArea');
                            const previewImage = document.getElementById('previewImage');
                            const removeImageButton = document.getElementById('removeImageButton');

                            // Handle drag-and-drop events
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
                                if (e.dataTransfer.files.length) {
                                    handleFile(e.dataTransfer.files[0]);
                                }
                            });

                            // Handle file input change event
                            imageInput.addEventListener('change', (e) => {
                                if (e.target.files.length) {
                                    handleFile(e.target.files[0]);
                                }
                            });

                            // Handle image removal
                            removeImageButton.addEventListener('click', () => {
                                previewArea.style.display = 'none';
                                previewImage.src = '';
                                imageInput.value = ''; // Clear the file input
                            });

                            // Function to handle the file and display the preview
                            function handleFile(file) {
                                if (file && file.type.startsWith('image/')) {
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        previewImage.src = e.target.result;
                                        previewArea.style.display = 'block';
                                    };
                                    reader.readAsDataURL(file);
                                } else {
                                    alert('Please upload a valid image file.');
                                }
                            }
                        });
                    </script>