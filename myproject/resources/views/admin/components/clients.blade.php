@extends('admin.layouts.app')

@section('content')
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
                        <img src="{{ asset('uploads/client_images/' . $client->image_name) }}" alt="Client Image">
                        <div class="admin__content-client__delete" onclick="openDeletePopup({{ $client->id }})">
                            Delete
                        </div>


                        <!-- Popup Modal for Delete Confirmation -->
                        <div class="client__delete__popup" id="deletePopup-{{ $client->id }}" style="display: none;">
                            <div class="client__delete__popup__content">
                                <span class="client__delete__popup__close"
                                    onclick="closeDeletePopup({{ $client->id }})">&times;</span>
                                <h3 class="client__delete__popup__title">Are you sure you want to delete this client?</h3>
                                <p class="client__delete__popup__text">This action cannot be undone.</p>

                                <!-- Delete Form -->
                                <form action="{{ route('admin.clients.delete', $client->id) }}" method="POST"
                                    class="client__delete__popup__form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="client__delete__popup__delete__button">
                                        Yes, Delete
                                    </button>
                                </form>

                                <button onclick="closeDeletePopup({{ $client->id }})"
                                    class="client__delete__popup__cancel__button">
                                    No, Cancel
                                </button>
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
@endsection
