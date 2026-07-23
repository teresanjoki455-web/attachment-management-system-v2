<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Console - Attachment Management System</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { display: flex; background-color: #f1f5f9; min-height: 100vh; }
        
        /* Admin Sidebar Styling */
        .sidebar { width: 260px; background-color: #0f172a; color: white; padding: 25px 20px; display: flex; flex-direction: column; gap: 20px; }
        .sidebar h2 { font-size: 1.2rem; border-bottom: 1px solid #334155; padding-bottom: 15px; margin-bottom: 10px; color: #38bdf8; }
        .sidebar a { color: #94a3b8; text-decoration: none; padding: 12px 15px; border-radius: 8px; font-weight: 500; transition: 0.2s; }
        .sidebar a:hover, .sidebar a.active { background-color: #1e293b; color: #38bdf8; }
        
        /* Main Area */
        .main-content { flex: 1; padding: 40px; }
        .header { margin-bottom: 30px; border-bottom: 2px solid #cbd5e1; padding-bottom: 15px; }
        .card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        
        table { width: 100%; border-collapse: collapse; margin-top: 15px; text-align: left; }
        th, td { padding: 14px 16px; border-bottom: 1px solid #e2e8f0; }
        th { background-color: #f8fafc; color: #475569; font-weight: 600; }
        
        /* Action Buttons */
        .btn-action { padding: 6px 12px; border-radius: 6px; font-size: 0.85rem; font-weight: 600; text-decoration: none; cursor: pointer; border: none; color: white; }
        .btn-approve { background-color: #10b981; margin-right: 5px; }
        .btn-approve:hover { background-color: #059669; }
        .btn-reject { background-color: #ef4444; }
        .btn-reject:hover { background-color: #dc2626; }
    </style>
</head>
<body>

    <div class="sidebar">
        <h2>Admin Portal 🛡️</h2>
        <a href="/admin/dashboard" class="active">📋 Manage Requests</a>
        <a href="/logout" style="margin-top: auto; color: #f87171;">Logout 🚪</a>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Incoming Attachment Applications 📋</h1>
            <p>Review student submissions and update official placement statuses</p>
        </div>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Company</th>
                        <th>Position</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allApplications as $app)
                        <tr>
                            <td>Student #{{ $app->student_id }}</td>
                            <td><strong>{{ $app->company_name }}</strong></td>
                            <td>{{ $app->job_title }}</td>
                            <td>
                                @if($app->status == 'Pending Review')
    <form action="/admin/applications/{{ $app->id }}/status" method="POST" style="display:inline;">
        @csrf
        <input type="hidden" name="status" value="Approved / Accepted">
        <button type="submit" class="btn-action btn-approve">Approve</button>
    </form>

    <form action="/admin/applications/{{ $app->id }}/status" method="POST" style="display:inline;">
        @csrf
        <input type="hidden" name="status" value="Rejected">
        <button type="submit" class="btn-action btn-reject">Reject</button>
    </form>
@else
    @if($app->status == 'Approved / Accepted')
        <span style="font-weight: 600; color: #16a34a; background-color: #f0fdf4; padding: 4px 8px; border-radius: 4px;">
            Approved
        </span>
    @else
        <span style="font-weight: 600; color: #dc2626; background-color: #fef2f2; padding: 4px 8px; border-radius: 4px;">
            Rejected
        </span>
    @endif
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