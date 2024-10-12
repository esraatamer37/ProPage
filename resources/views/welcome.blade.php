<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Profile</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f3f4f6;
        }
        .profile-header {
            text-align: center;
            padding: 50px;
            background-color: #1f2937;
            color: white;
        }
        .profile-content {
            padding: 30px;
        }
    </style>
</head>
<body class="antialiased">
<div class="profile-header">
    <h1>Welcome to My Profile</h1>
</div>

<div class="profile-content">
    <p>Hi, this is your profile page where you can display user information, recent activities, and more.</p>
</div>
</body>
</html>
