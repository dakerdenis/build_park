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
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Сюда позже выведем список категорий --}}
            <p>Category list will be here.</p>
        </div>
    </div>
@endsection
