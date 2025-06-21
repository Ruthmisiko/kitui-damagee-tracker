<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kitui Damage Tracker</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body>
   <div class="dashboard-container">
        <!-- Side Navigation -->
        @include('side-nav')
        <div class="main-content">
            <div class="content-box">
            <h2>Generate Report</h2>

        <form method="GET" action="{{ route('reports.index') }}">
            <label>Start Date:</label>
            <input type="date" name="start_date" value="{{ $start }}">
            <label>End Date:</label>
            <input type="date" name="end_date" value="{{ $end }}">
            <button type="submit" style="background-color:#d64500; color:white;border:none;">Filter</button>
        </form>

        <hr>

        <h3>Summary</h3>
        <p><strong>Total Issues:</strong> {{ $summary['total'] }}</p>

        <h4>By Type</h4>
        <ul>
            @foreach($summary['by_type'] as $infrastructure_type => $count)
                <li>{{ $infrastructure_type }}: {{ $count }}</li>
            @endforeach
        </ul>

        <h4>By Status</h4>
        <ul>
            @foreach($summary['by_status'] as $status => $count)
                <li>{{ $status }}: {{ $count }}</li>
            @endforeach
        </ul>

        <hr>

        <h3>Detailed Issues</h3>
        <div class="issues-table">
          <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Reported Date</th>
                    <th>Subcounty</th>
                    <th>Ward</th>
                    <th>Type</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($issues as $issue)
                <tr>
                    <td data-label="ID">{{ $issue->id }}</td>
                    <td data-label="Reported Date">{{ $issue->created_at->format('Y-m-d') }}</td>
                    <td data-label="Subcounty">{{ $issue->subcounty }}</td>
                    <td data-label="Ward">{{ $issue->ward }}</td>
                    <td data-label="Type">{{ $issue->infrastructure_type  }}</td>
                    <td data-label="Status">{{ $issue->status }}</td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
            </div>
        </div>
    </div>
</body>
</html>
