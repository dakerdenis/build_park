<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login 123</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
</head>
<body>

    <div class="admin_login__wrapper">
        <div class="admin_login__logo">
            <img src="{{ asset('images/logo.png') }}" alt="Build Park Company Logo">
        </div>
        
        <div class="admin_login__form-block">
            <form action="{{ route('admin.login.submit') }}" method="POST">
                @csrf
                <div class="login__hello">
                    Xoş gəldiniz!
                </div>
                <div class="login__desc">
                    BUILDPARK İdarəetmə panelı
                </div>
                <div class="input__container">
                    <div class="input__container__desc">
                        Login
                    </div>

                    <div class="input__field">
                        <input type="text" id="email" name="email" placeholder="Login |" required="">
                    </div>
                </div>
                <div class="input__container">
                    <div class="input__container__desc">
                        Şifrə
                    </div>

                    <div class="input__field">
                        <input type="password" id="password" name="password" placeholder="Şifrə |" required="">
                    </div>
                </div>
                <button type="submit">Daxil ol</button>
                @if($errors->any())
                    <div style="color: red;">
                        {{ $errors->first('error') }}
                    </div>
                @endif
            </form>
        </div>
        
        <div class="admin_login__background">
            <img src="{{ asset('images/projects/placeholder.jpeg') }}" alt="Build Park Company Logo">
        </div>

    </div>


</body>
</html>
