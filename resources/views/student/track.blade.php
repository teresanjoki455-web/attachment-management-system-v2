<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Application - Student Portal</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://bunny.net">
    <link href="https://bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Unified Sidebar and Dashboard Styling Layout -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8fafc;
            margin: 0;
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 260px;
            background-color: #0f172a;
            color: #ffffff;
            padding: 2rem 1.5rem;
            box-sizing: border-box;
        }
        .sidebar h2 {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            color: #38bdf8;
            font-weight: 600;
        }
        .sidebar a {
            display: block;
            color: #94a3b8;
            text-decoration: none;
            padding: 0.75rem 1rem;
            margin-bottom: 0.5rem;
            border-radius: 0.375rem;
            font-weight: 500;
        }
        .sidebar a:hover {
            background-color: #1e293b;
            color: #ffffff;
        }
        .sidebar a.active {
            background-color: #4f46e5;
            color: #ffffff;
        }
        .main-content {
            flex: 1;
            padding: 3rem;
            box-sizing: border-box;
        }
        .header-title {
            font-size: 1.75rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 0.5rem;
        }
        .header-subtitle {
            color: #64748b;
            margin-bottom: 2.5rem;
        }
        .table-container {
            background: #ffffff;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }
        th {
            background-color: #f1f5f9;
            color: #475569;
            padding: 1rem;
            font-weight: 600;
            border-bottom: 1px solid #e2e8f0;
        }
        td {
            padding: 1rem;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
        }
    </style>
</head>
<body>

    <!-- Functional Navigation Links Option 3 -->
    <div class="sidebar">
        <h2>Student Portal</h2>
        <a href="/student/register">Register Placement</a>
        <a href="/student/track" class="active">Track Application</a>
    </div>

    <!-- Active Tracker Grid Workspace -->
    <div class="main-content">
        <h1 class="header-title">Track Application Status</h1>
        <p class="header-subtitle">Monitor the live review progress of your industrial placement request.</p>

        <div class="table-container">
            <table>
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Company Name</th>
            <th>Assigned Position</th>
            <th>Live Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($applications as $app)
        <tr>
            <td style="font-weight: 500;">{{ $app->name }}</td>
            <td>{{ $app->company_name }}</td>
            <td>{{ $app->job_title }}</td>
            <td>
                @if($app->status == 'Pending Review')
                    <span style="font-weight: 600; color: #ca8a04; background-color: #fef9c3; padding: 4px 8px; border-radius: 4px;">Pending</span>
                @elseif($app->status == 'Approved / Accepted')
                    <span style="font-weight: 600; color: #16a34a; background-color: #f0fdf4; padding: 4px 8px; border-radius: 4px;">Approved</span>
                @else
                    <span style="font-weight: 600; color: #dc2626; background-color: #fef2f2; padding: 4px 8px; border-radius: 4px;">Rejected</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
        </div>
    </div>
</body>
</html>