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
                    <tbody id="category-table-body">
                        @foreach ($categories as $index => $category)
                            <tr data-id="{{ $category->id }}" draggable="true">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->name_en }}</td>
                                <td>{{ $category->name_ru }}</td>
                                <td>{{ $category->name_az }}</td>
                                <td>{{ $category->projects_count }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="edit-link">Edit</a>
                                    |
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
    <script>
        const tbody = document.getElementById('category-table-body');

        let dragSrcEl = null;

        function handleDragStart(e) {
            dragSrcEl = this;
            e.dataTransfer.effectAllowed = 'move';
            e.dataTransfer.setData('text/html', this.outerHTML);
            this.classList.add('dragElem');
        }

        function handleDragOver(e) {
            if (e.preventDefault) e.preventDefault();
            this.classList.add('over');
            e.dataTransfer.dropEffect = 'move';
            return false;
        }

        function handleDragLeave() {
            this.classList.remove('over');
        }

        function handleDrop(e) {
            if (e.stopPropagation) e.stopPropagation();

            if (dragSrcEl !== this) {

                let dropHTML = e.dataTransfer.getData('text/html');
                const draggedRow = dragSrcEl.cloneNode(true);
                addDnDHandlers(draggedRow);
                this.parentNode.insertBefore(draggedRow, this);
                dragSrcEl.remove();

            }

            updateOrder();
            return false;
        }

        function handleDragEnd() {
            this.classList.remove('over');
        }

        function addDnDHandlers(row) {
            row.addEventListener('dragstart', handleDragStart);
            row.addEventListener('dragover', handleDragOver);
            row.addEventListener('dragleave', handleDragLeave);
            row.addEventListener('drop', handleDrop);
            row.addEventListener('dragend', handleDragEnd);
        }

        document.querySelectorAll('#category-table-body tr').forEach(addDnDHandlers);

        function updateOrder() {
            const ids = Array.from(tbody.querySelectorAll('tr')).map(tr => tr.dataset.id);

            fetch("{{ route('admin.categories.reorder') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        order: ids
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        console.log('Order updated!');
                    }
                });
        }
    </script>

@endsection
