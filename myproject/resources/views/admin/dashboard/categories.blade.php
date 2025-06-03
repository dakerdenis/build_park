@extends('admin.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/categories.css') }}">
@endsection
@section('content')

    @include('admin.components.categories')
@endsection
