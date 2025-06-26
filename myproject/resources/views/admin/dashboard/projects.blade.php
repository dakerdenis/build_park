@extends('admin.layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/all_project.css') }}">
@endsection
@section('content')
    @include('admin.components.projects')
@endsection
