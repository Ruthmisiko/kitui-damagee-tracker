<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kitui Damage Tracker</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <div class="dashboard-container">
        <!-- Side Navigation -->
        @include('side-nav')

        <!-- Main Content -->
        <div class="main-content">
            <div class="content-box">
                <h1>Welcome {{ Auth::user()->name }} to Your Dashboard</h1>
                <p>You are logged in!</p>
            </div>

        </div>

    </div>
</body>
</html>