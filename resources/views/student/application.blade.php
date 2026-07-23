<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Applications - Attachment System</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { display: flex; background-color: #f8fafc; min-height: 100vh; }
        
        /* Sidebar Styling */
        .sidebar { width: 260px; background-color: #1e3a8a; color: white; padding: 25px 20px; display: flex; flex-direction: column; gap: 20px; }
        .sidebar h2 { font-size: 1.2rem; border-bottom: 1px solid #3b82f6; padding-bottom: 15px; margin-bottom: 10px; }
        .sidebar a { color: #93c5fd; text-decoration: none; padding: 12px 15px; border-radius: 8px; font-weight: 500; transition: 0.2s; }
        .sidebar a:hover, .sidebar a.active { background-color: #2563eb; color: white; }
        
        /* Main Workspace */
        .main-content { flex: 1; padding: 40px; }
        .header { margin-bottom: 30px; border-bottom: 2px solid #e2e8f0; padding-bottom: 15px; }
        .card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        
        /* Table Layout Styling */
        table { width: 100%; border-collapse: collapse; margin-top: 15px; text-align: left; }
        th, td { padding: 14px 16px; border-bottom: 1px solid #e2e8f0; }
        th { background-color: #f1f5f9; color: #475569; font-weight: 600; }
        td { color: #334155; font-size: 0.95rem; }
        
        /* Status Badges */
        .badge { padding: 6px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; display: inline-block; }
        .badge-pending { background-color: #fef3c7; color: #d97706; }
        .badge-accepted { background-color: #d1fae5; color: #059669; }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h2>Student Portal</h2>
        <a href="/student/dashboard">📊 Dashboard Home</a>
        <a href="/student/profile">👤 Profile Mgmt.</a>
        <a href="/student/vacancies">🔍 View Vacancies</a>
        <a href="/student/applications" class="active">📂 Track Applications</a>
        <a href="/logout" style="margin-top: auto; color: #fca5a5;">🚪 Logout</a>
    </div>

    <!-- Main Table Workspace -->
    <div class="main-content">
        <div class="header">
            <h1>Track Applications 📂</h1>
            <p>Review the approval status of your submitted attachment applications</p>
        </div>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Company Name</th>
                        <th>Role Position</th>
                        <th>Submission Date</th>
                        <th>Approval Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($liveApplications as $app)
                        <tr>
                            <td><strong>{{ $app->company_name }}</strong></td>
                            <td>{{ $app->job_title }}</td>
                            <td>{{ $app->created_at->format('M d, Y') }}</td>
                            <td>
                                @if($app->status == 'Approved / Accepted')
                                    <span class="badge badge-accepted">✅ Approved / Accepted</span>
                                @else
                                    <span class="badge badge-pending">⏳ {{ $app->status }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align: center; color: #64748b; padding: 20px;">You haven't submitted any attachment applications yet. Go to vacancies to apply!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>