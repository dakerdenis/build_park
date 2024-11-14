<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome to the Admin Dashboard</h1>
    <p>This is a protected area only accessible to admin users.</p>

    <!-- Logout form -->
    <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
