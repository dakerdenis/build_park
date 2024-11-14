<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buildpark Admin Panel</title>
</head>
<body>
    <div class="admin__panel__container">
        <div class="admin__panel__navigation">
            <div class="admin__navigation__logo">
                <img src="{{ asset('images/logo.png') }}" alt="Build Park Company Logo">
            </div>
            <div class="admin__navigation__line"></div>
            <div class="admin__navigation__block">
                <a href="#">
                    Our clients
                </a>

                <a href="#">
                    Projects
                </a>
            </div>
        </div>

        <div class="admin__panel__content__container">

        </div>
    </div>

    <!-- Logout form -->
    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
