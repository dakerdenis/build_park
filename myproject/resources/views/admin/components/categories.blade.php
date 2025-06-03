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
                                    <a href="#" class="delete-link">Delete</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
@endsection
