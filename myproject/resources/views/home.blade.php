@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('messages.welcome') }}</h1>
        <p>{{ __('messages.home_message') }}</p>
    </div>

    <ul>
        <li><a href="{{ route('home', 'en') }}">English</a></li>
        <li><a href="{{ route('home', 'ru') }}">Русский</a></li>
        <li><a href="{{ route('home', 'az') }}">Azərbaycan</a></li>
    </ul>


    <!----header----->
        <!----Hero block----->
@endsection
