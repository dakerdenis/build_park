@extends('admin.layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/create_category.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/edit_category.css') }}">
@endsection
@section('content')

    @include('admin.components.edit_category')
@endsection
