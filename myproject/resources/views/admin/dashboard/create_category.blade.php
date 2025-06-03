@extends('admin.layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/create_category.css') }}">
@endsection
@section('content')

    @include('admin.components.create_category')
@endsection
