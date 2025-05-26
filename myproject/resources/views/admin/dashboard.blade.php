<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buildpark Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
</head>

<body>
    <div class="admin__panel__container">
        <div class="admin__panel__navigation">
            <div class="admin__navigation__logo">
                <img src="{{ asset('images/logo.png') }}" alt="Build Park Company Logo">
            </div>
            <div class="admin__navigation__line"></div>
            <div class="admin__navigation__block">
                <a href="{{ route('admin.dashboard.home') }}">Home</a>
                <a href="{{ route('admin.clients') }}">Our clients</a>
                <a href="{{ route('admin.projects') }}">Projects</a>

            </div>

            <div class="admin__navigation__logout">
                <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>

        <div class="admin__panel__content__container">
            <div class="admin__content__wrapper">
                <!-- Default Welcome Block -->
                @if ($section === null || $section === 'home')
                    @include('admin.components.home')
                @endif

                <!-- Clients Section -->
                @if ($section === 'clients')
                    @include('admin.components.clients')
                @endif



                <!---Add Clinet Section--->
                @if ($section === 'add_client')
                    @include('admin.components.add_client')
                @endif

                <!-- Projects Section -->
                <!-- Projects Section -->
                @if ($section === 'projects')
                    @include('admin.components.projects')
                @endif


                @if ($section === 'add_project')
                    @include('admin.components.add_project')
                @endif





            </div>
        </div>
    </div>
</body>

</html>
