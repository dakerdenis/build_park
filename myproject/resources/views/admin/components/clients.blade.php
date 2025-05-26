                    <div class="admin__content__block admin__content__block-clients">
                        <div class="admin__content__line">
                            <p>All Clients</p>
                            <a href="{{ route('admin.clients.add') }}">
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