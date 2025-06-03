@extends('admin.layouts.app')

@section('content')
    <div class="admin__content__block">
        <div class="admin__content__line">
            <p>Create New Category</p>
            <a href="{{ route('admin.categories.index') }}">
                <p>Back to Categories</p>
            </a>
        </div>

        <div class="admin__content__content create_category">
            <form method="POST" action="{{ route('admin.categories.store') }}">
                @csrf

                <div class="form-group">
                    <label for="name_en">Name (EN)</label>
                    <input type="text" name="name_en" id="name_en" required>
                </div>

                <div class="form-group">
                    <label for="name_ru">Name (RU)</label>
                    <input type="text" name="name_ru" id="name_ru" required>
                </div>

                <div class="form-group">
                    <label for="name_az">Name (AZ)</label>
                    <input type="text" name="name_az" id="name_az" required>
                </div>

                <button class="craete_category-btn" type="submit">Create Category</button>
            </form>
        </div>
    </div>
@endsection
