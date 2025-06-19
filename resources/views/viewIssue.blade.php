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
        <div class="main-content">
            <div class="content-box">
                <h1>Issue Details</h1>
                <ul>
                    <li><strong>Complainant:</strong> {{ $issue->complainant_name }}</li>
                    <li><strong>Phone Number:</strong> {{ $issue->phone_number }}</li>
                    <li><strong>Subcounty:</strong> {{ $issue->subcounty }}</li>
                    <li><strong>Ward:</strong> {{ $issue->ward ?? $issue->new_area }}</li>
                    <li><strong>Type:</strong> {{ $issue->infrastructure_type }}</li>
                    <li><strong>Description:</strong> {{ $issue->damage_description }}</li>
                    <li><strong>Severity:</strong> {{ $issue->severity_level }}</li>
                    <li><strong>Location:</strong> {{ $issue->location_details }}</li>
                    <li><strong>Status:</strong> {{ $issue->status ?? 'Pending Review' }}</li>
                    <li><strong>Date Reported:</strong> {{ $issue->created_at->format('Y-m-d') }}</li>
                </ul>
                @if(Auth::user()->user_type === 'admin')
                <button style="
                background-color: #f60;
                border: none;
                border-radius: 6px;
                font-weight: bold;
                cursor: pointer;
                transition: background-color 0.3s;"
                >
                <a href="{{ route('issues.admin') }}" style="text-decoration: none;color:white; ">Back to Issues List</a></button>
                @else
                <button style="
                background-color: #f60;
                border: none;
                border-radius: 6px;
                font-weight: bold;
                cursor: pointer;
                transition: background-color 0.3s;"
                >
                <a href="{{ route('issues.index') }}" style="text-decoration: none;color:white; ">Back to Issues List</a></button>
                @endif

            </div>
        </div>
    </div>
</body>
</html>
