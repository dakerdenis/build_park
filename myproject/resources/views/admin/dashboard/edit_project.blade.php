@extends('admin.layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/admin/add_project.css') }}">   
<link rel="stylesheet" href="{{ asset('css/admin/edit_project.css') }}">
@endsection
@section('content')
    @include('admin.components.edit_project')
@endsection
