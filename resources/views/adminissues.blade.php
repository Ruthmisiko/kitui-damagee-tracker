<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - All Issues</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>

<div class="dashboard-container">
    <!-- Side Navigation -->
    @include('side-nav')

    <div class="main-content">
       <div class="content-box">
        <h1>All Reported Issues (Admin View)</h1>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <div class="issues-table">
            <table>
                <thead>
                    <tr>
                        <th>Issue ID</th>
                        <th>Reported On</th>
                        <th>Complainant</th>
                        <th>Subcounty & Ward</th>
                        <th>Infrastructure</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($issues as $issue)
                        <tr>
                            <td>{{ $issue->id }}</td>
                            <td>{{ $issue->created_at->format('Y-m-d') }}</td>
                            <td>{{ $issue->complainant_name }}</td>
                            <td>{{ $issue->subcounty }} & {{ $issue->ward ?? $issue->new_area }}</td>
                            <td>{{ $issue->infrastructure_type }}</td>
                            <td>{{ $issue->status ?? 'Pending Review' }}</td>
                            <td>
                                <a href="{{ route('issues.show', $issue->id) }}">
                                    <ion-icon name="eye-outline"></ion-icon> View
                                </a>

                                <form method="POST" action="{{ route('issues.updateStatus', $issue->id) }}" style="margin-top: 5px;">
                                    @csrf

                                    <select name="status" onchange="this.form.submit()">
                                        <option value="">Update Status</option>
                                        <option value="Pending Review" {{ $issue->status == 'Pending Review' ? 'selected' : '' }}>Pending Review</option>
                                        <option value="Under Investigation" {{ $issue->status == 'Under Investigation' ? 'selected' : '' }}>Under Investigation</option>
                                        <option value="Repair in Progress" {{ $issue->status == 'Repair in Progress' ? 'selected' : '' }}>Repair in Progress</option>
                                        <option value="Resolved" {{ $issue->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if ($issues->isEmpty())
                <p>No issues have been reported yet.</p>
            @endif
        </div>
       </div>
    </div>
</div>

</body>
</html>
