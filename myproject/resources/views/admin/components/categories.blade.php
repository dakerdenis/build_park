@extends('admin.layouts.app')

@section('content')
    <div class="admin__content__block">
        <div class="admin__content__line">
            <p>Categories</p>
            <a href="{{ route('admin.categories.create') }}">
                <p>Add Category</p>
            </a>
        </div>

        <div class="admin__content__content">

            @if (session('success'))
                <div class="alert created_category-success alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($categories->isEmpty())
                <p>No categories found.</p>
            @else
                <table class="category-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name (EN)</th>
                            <th>Name (RU)</th>
                            <th>Name (AZ)</th>
                            <th>Projects Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->name_en }}</td>
                                <td>{{ $category->name_ru }}</td>
                                <td>{{ $category->name_az }}</td>
                                <td>{{ $category->projects_count }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="edit-link">Edit</a> |

                                    <button type="button" class="delete-link"
                                        onclick="openModal({{ $category->id }})">Delete</button>

                                    <form id="delete-form-{{ $category->id }}"
                                        action="{{ route('admin.categories.delete', $category->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>



                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>

    <div id="deleteModal" class="modal-overlay">
        <div class="modal-box">
            <p>Are you sure you want to delete this category?</p>
            <div class="modal-actions">
                <button onclick="closeModal()" class="cancel-btn">Cancel</button>
                <button id="confirmDeleteBtn" class="confirm-btn">Yes, Delete</button>
            </div>
        </div>
    </div>
<script>
    let selectedCategoryId = null;

    function openModal(id) {
        selectedCategoryId = id;
        document.getElementById('deleteModal').style.display = 'flex';
    }

    function closeModal() {
        selectedCategoryId = null;
        document.getElementById('deleteModal').style.display = 'none';
    }

    document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
        if (selectedCategoryId) {
            const form = document.getElementById(`delete-form-${selectedCategoryId}`);
            if (form) {
                form.submit();
            }
        }
    });
</script>

@endsection
