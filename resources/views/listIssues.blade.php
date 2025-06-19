<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Raised Issues - Kitui Damage Tracker</title>
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
        <h1>View Raised Issues</h1>
        <div class="issues-table">
            <table>
                <thead>
                    <tr>
                        <th>Issue ID</th>
                        <th>Date Reported</th>
                        <th>Subcounty & Ward</th>
                        <th>Type of Infrastructure</th>
                        <th>Brief Description</th>
                        <th>Current Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($issues as $issue)
                        <tr>
                            <td>{{ $issue->id }}</td>
                            <td>{{ $issue->created_at->format('Y-m-d') }}</td>
                            <td>{{ $issue->subcounty }} & {{ $issue->ward ?? $issue->new_area }}</td>
                            <td>{{ $issue->infrastructure_type }}</td>
                            <td>{{ Str::limit($issue->damage_description, 50) }}</td>
                            <td>{{ $issue->status ?? 'Pending Review' }}</td>
                            <td><a href="{{ route('issues.show', $issue->id) }}"><ion-icon name="eye-outline"></ion-icon> View Details</a></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($issues->isEmpty())
                <p>No issues reported yet.</p>
            @endif
        </div>
       </div>
    </div>
</div>
</body>
</html>