<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buildpark Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
</head>

<body>
    <div class="admin__panel__container">
        <div class="admin__panel__navigation">
            <div class="admin__navigation__logo">
                <img src="{{ asset('images/logo.png') }}" alt="Build Park Company Logo">
            </div>
            <div class="admin__navigation__line"></div>
            <div class="admin__navigation__block">
                <a href="{{ route('admin.dashboard', ['section' => 'clients']) }}">Our clients</a>
                <a href="{{ route('admin.dashboard', ['section' => 'projects']) }}">Projects</a>
                <a href="{{ route('admin.dashboard', ['section' => 'map']) }}">Map</a>
            </div>

            <div class="admin__navigation__logout">
                <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>

        <div class="admin__panel__content__container">
            <div class="admin__content__wrapper">
                <!-- Default Welcome Block -->
                @if ($section === null)
                    <div class="admin__content__block">
                        <div class="admin__content__block-hello">
                            <h1>Welcome to the Admin Dashboard</h1>
                            <p>This is your main admin panel. Use the navigation links to manage different sections.</p>
                        </div>
                    </div>
                @endif

                <!-- Clients Section -->
                @if ($section === 'clients')
                    <div class="admin__content__block admin__content__block-clients">
                        <div class="admin__content__line">
                            <p>All Clients</p>
                            <a href="{{ route('admin.dashboard', ['section' => 'add_client']) }}">
                                <p>Add Client</p>
                                <img src="{{ asset('images/admin/Plus.svg') }}" alt="" srcset="">
                            </a>
                        </div>
                        <div class="admin__content__content">
                            <!------ Clients Section ------>
                            <div class="admin__content__content-clients">
                                @foreach ($clients as $client)
                                    <div class="admin__content-client">
                                        <!-- Display client image -->
                                        <img src="{{ asset('uploads/client_images/' . $client->image_name) }}"
                                            alt="Client Image">
                                        <div class="admin__content-client__delete"
                                            onclick="openDeletePopup({{ $client->id }})">
                                            Delete
                                        </div>

                                        <!-- Popup Modal for Delete Confirmation -->
                                        <div class="delete-popup" id="deletePopup-{{ $client->id }}"
                                            style="display: none;">
                                            <div class="delete-popup-content">
                                                <h3>Are you sure you want to delete this client?</h3>
                                                <p>This action cannot be undone.</p>

                                                <!-- Delete Form -->
                                                <form action="{{ route('client.delete', $client->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        style="background-color: red; color: white; border: none; padding: 5px 10px; cursor: pointer;">
                                                        Yes, Delete
                                                    </button>
                                                </form>

                                                <button onclick="closeDeletePopup({{ $client->id }})"
                                                    style="background-color: grey; color: white; border: none; padding: 5px 10px; cursor: pointer; margin-top: 10px;">
                                                    No, Cancel
                                                </button>

                                                <!-- Close Icon -->
                                                <span class="close-popup"
                                                    onclick="closeDeletePopup({{ $client->id }})"
                                                    style="cursor: pointer; font-size: 20px; position: absolute; top: 10px; right: 10px;">&times;</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @if ($clients->isEmpty())
                                    <p>No clients available.</p>
                                @endif

                            </div>
                            <!------ End of Clients Section ------>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                    <script>
                        function openDeletePopup(clientId) {
                            const popup = document.getElementById(`deletePopup-${clientId}`);
                            if (popup) {
                                popup.style.display = 'flex';
                            }
                        }
    
                        function closeDeletePopup(clientId) {
                            const popup = document.getElementById(`deletePopup-${clientId}`);
                            if (popup) {
                                popup.style.display = 'none';
                            }
                        }
                    </script>
                @endif



                <!---Add Clinet Section--->
                @if ($section === 'add_client')
                    <div class="admin__content__block admin__content__block-clients">
                        <div class="admin__content__line">
                            <p>Add Client</p>
                            <a href="{{ route('admin.dashboard', ['section' => 'clients']) }}">
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
                @endif

                <!-- Projects Section -->
                @if ($section === 'projects')
                    <div class="admin__content__block">
                        <h2>Projects</h2>
                        <p>Details about our projects will be displayed here.</p>
                        <a href="{{ route('admin.dashboard', ['section' => 'add_client']) }}">Add New project</a>
                    </div>
                @endif

                @if ($section === 'add_project')
                <div class="admin__content__block">
                    <h2>Projects</h2>
                    <p>Details about our projects will be displayed here.</p>
                </div>
            @endif

                <!-- Map Section -->
                @if ($section === 'map')
                    <div class="admin__content__block">
                        <h2>Map</h2>
                        <p>Map-related information will be displayed here.</p>
                    </div>
                @endif




            </div>
        </div>
    </div>
</body>

</html>
