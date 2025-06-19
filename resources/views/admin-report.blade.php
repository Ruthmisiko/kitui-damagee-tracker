<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Kitui Damage Tracker</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <style>
    /* === REPORT PAGE STYLING === */

form {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    align-items: center;
    margin-bottom: 20px;
}

form label {
    font-weight: bold;
    margin-right: 5px;
}

input[type="date"] {
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    background-color: #fff;
    transition: border-color 0.3s ease-in-out;
}

input[type="date"]:focus {
    outline: none;
    border-color: #f60; /* Kitui County theme color */
    box-shadow: 0 0 5px rgba(255, 102, 0, 0.5);
}

button[type="submit"] {
    padding: 8px 16px;
    background-color: #f60;
    color: white;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
}

button[type="submit"]:hover {
    background-color: #e55b00;
}

/* === SUMMARY STYLING === */
.summary-section h3,
.summary-section h4 {
    margin-top: 20px;
}

.summary-section ul {
    list-style-type: disc;
    margin-left: 20px;
    padding-left: 0;
}

/* === TABLE STYLING === */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    background-color: #fff;
    border: 1px solid #ddd;
    font-size: 14px;
}

table thead {
    background-color: #f60;
    color: white;
}

table th,
table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

/* === MOBILE RESPONSIVENESS === */
@media screen and (max-width: 768px) {
    form {
        flex-direction: column;
        align-items: flex-start;
    }

    table,
    thead,
    tbody,
    th,
    td,
    tr {
        display: block;
        width: 100%;
    }

    thead {
        display: none;
    }

    tbody tr {
        margin-bottom: 15px;
        border-bottom: 2px solid #ccc;
        padding-bottom: 10px;
    }

    tbody td {
        position: relative;
        padding-left: 50%;
        text-align: left;
    }

    tbody td::before {
        content: attr(data-label);
        position: absolute;
        left: 15px;
        top: 12px;
        font-weight: bold;
        white-space: nowrap;
    }
}

  </style>
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
            <button type="submit">Filter</button>
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
                    <th>Reported By</th>
                    <th>Phone Number</th>
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
                    <td data-label="Reported By">{{ $issue->complainant_name }}</td>
                    <td data-label="Phone Number">{{ $issue->phone_number}}</td>
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
