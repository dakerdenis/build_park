@extends('admin.layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/add_project.css') }}">
@endsection
@section('content')
    @include('admin.components.add_project')
@endsection
