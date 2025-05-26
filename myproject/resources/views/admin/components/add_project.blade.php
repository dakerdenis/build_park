                    <div class="admin__content__block">
                        <div class="admin__content__line">
                            <p>Back to all Projects</p>
                            <a href="{{ route('admin.projects') }}">
                                <p>Add Project</p>
                            </a>
                        </div>
                        <div class="admin__content__content">
                            <!------ Projects Section ------>
                            <div class="admin__content__content-clients">
                                <form id="projectImageUploadForm" action="{{ route('projects.upload') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="upload-area" id="uploadArea">
                                        <p>Drag & drop images here or click to select (max: 5 images, max size: 2MB
                                            each)</p>
                                        <input type="file" id="projectImageInput" name="images[]" accept="image/*"
                                            multiple hidden>
                                    </div>

                                    <div class="preview-area" id="previewArea">
                                        <!-- Preview images will be dynamically inserted here -->
                                    </div>

                                    <div class="project__desc__block">
                                        <div class="project__category">
                                            <p>Select Project Category</p>
                                            <select name="category_id" required>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="projects__desc__name-block">
                                            <div class="project__desc__name-input">
                                                <p>Project's name RU</p>
                                                <input required type="text" name="project__name__ru"
                                                    id="project__name__ru">
                                            </div>
                                            <div class="project__desc__name-input">
                                                <p>Project's name EN</p>
                                                <input required type="text" name="project__name__en"
                                                    id="project__name__en">
                                            </div>
                                        </div>

                                        <div class="projects__desc__desc-block">
                                            <div class="project__desc__desc-input">
                                                <p>Project's DESCRIPTION RU</p>
                                                <textarea required name="project__desc__ru" id="project__desc__ru" cols="30" rows="10"></textarea>
                                            </div>
                                            <div class="project__desc__desc-input">
                                                <p>Project's DESCRIPTION EN</p>
                                                <textarea required name="project__desc__en" id="project__desc__en" cols="30" rows="10"></textarea>
                                            </div>
                                        </div>


                                        <div class="project__youtube__link">
                                            <div class="project__desc__desc-input">
                                                <p>Project's YouTube link</p>
                                                <input type="text" name="project__video" id="project__video">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" id="submitButton" disabled>Submit</button>
                                </form>




                            </div>
                            <!------ End of Clients Section ------>
                        </div>
                    </div>



                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const uploadArea = document.getElementById('uploadArea');
                            const projectImageInput = document.getElementById('projectImageInput');
                            const previewArea = document.getElementById('previewArea');
                            const submitButton = document.getElementById('submitButton');

                            let uploadedImages = [];

                            const updateSubmitButtonState = () => {
                                submitButton.disabled = uploadedImages.length === 0;
                            };

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
                                            updateSubmitButtonState();
                                        };

                                        previewDiv.appendChild(img);
                                        previewDiv.appendChild(removeButton);
                                        previewArea.appendChild(previewDiv);

                                        uploadedImages.push(file);
                                        updateSubmitButtonState();
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
                                if (uploadedImages.length === 0) {
                                    e.preventDefault();
                                    alert('Please upload at least one image.');
                                } else {
                                    const formData = new FormData();
                                    uploadedImages.forEach((file) => formData.append('images[]', file));
                                    fetch(this.action, {
                                            method: 'POST',
                                            body: formData,
                                            headers: {
                                                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                            },
                                        })
                                        .then((response) => response.json())
                                        .then((data) => {
                                            alert('Project images uploaded successfully!');
                                            console.log(data);
                                            // Redirect or update UI if needed
                                        })
                                        .catch((error) => {
                                            console.error('Error:', error);
                                        });
                                    e.preventDefault(); // Prevent default form submission
                                }
                            });
                        });
                    </script>
                    <style>
                        .upload-area {
                            border: 2px dashed #ccc;
                            padding: 20px;
                            text-align: center;
                            cursor: pointer;
                            margin-bottom: 20px;
                        }

                        .preview-area {
                            display: flex;
                            flex-wrap: wrap;
                            gap: 10px;
                        }

                        .preview-image {
                            position: relative;
                            display: inline-block;
                        }

                        .preview-image img {
                            max-width: 100px;
                            max-height: 100px;
                            border: 1px solid #ccc;
                            border-radius: 5px;
                        }

                        .preview-image button {
                            position: absolute;
                            top: 0;
                            right: 0;
                            background-color: red;
                            color: white;
                            border: none;
                            border-radius: 50%;
                            width: 20px;
                            height: 20px;
                            cursor: pointer;
                        }
                    </style>