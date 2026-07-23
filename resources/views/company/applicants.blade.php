<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Portal - Review Applicants</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    <style>
        body { margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; display: flex; background-color: #f3f4f6; }
        .sidebar { width: 260px; height: 100vh; background-color: #0b2545; color: white; position: fixed; top: 0; left: 0; padding-top: 20px; box-shadow: 2px 0 5px rgba(0,0,0,0.1); }
        .sidebar-header { padding: 10px 25px 20px 25px; border-bottom: 1px solid rgba(255,255,255,0.1); font-size: 1.2rem; font-weight: bold; }
        .sidebar-menu { list-style: none; padding: 20px 0 0 0; margin: 0; }
        .sidebar-menu li a { display: block; padding: 12px 25px; color: #cbd5e1; text-decoration: none; font-size: 0.95rem; border-left: 4px solid transparent; }
        .sidebar-menu li a:hover, .sidebar-menu li.active a { background-color: rgba(255,255,255,0.08); color: white; border-left-color: #3490dc; }
        
        .main-content { margin-left: 260px; padding: 40px; width: calc(100% - 260px); box-sizing: border-box; }
        .page-header { margin-bottom: 30px; border-bottom: 2px solid #e5e7eb; padding-bottom: 15px; }
        .page-title { font-size: 1.75rem; color: #1f2937; margin: 0; font-weight: 700; }
        
        /* Clean Professional Table Layout */
        .table-card { background: white; border-radius: 12px; padding: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #e5e7eb; overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { padding: 14px; background-color: #f8fafc; color: #475569; font-weight: 600; border-bottom: 2px solid #e2e8f0; font-size: 0.9rem; }
        td { padding: 14px; border-bottom: 1px solid #e2e8f0; color: #334155; font-size: 0.95rem; }
        .badge { padding: 4px 10px; border-radius: 50px; font-size: 0.8rem; font-weight: 600; display: inline-block; }
        .badge-pending { background-color: #fef3c7; color: #d97706; }
        .action-link { color: #3490dc; text-decoration: none; font-weight: 600; margin-right: 15px; }
        .action-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">💼 Company Portal</div>
        <ul class="sidebar-menu">
            <li><a href="/company/dashboard">📁 Dashboard Home</a></li>
            <li><a href="/company/post-vacancy">➕ Post Vacancy</a></li>
            <li class="active"><a href="/company/applicants">👥 Review Applicants</a></li>
            <li style="margin-top: 50px;"><a href="/" style="border-left: none; color: #f87171;">⬅ Back to Home</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="page-header">
            <h1 class="page-title">Received Student Applications</h1>
        </div>

     
                        
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Position</th>
                        <th>Submission Date</th>
                        <th>Student Name</th>
                        <th>Target Pn Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
@foreach($applications as $application)
<tr>
    <td>{{ $application->job_title }}</td>
    <td>{{ $application->created_at }}</td>
    <td>{{ $application->student_id }}</td>
    <td>-</td>
    <td>{{ $application->status }}</td>
    <td>
        <a href="{{ route('company.student.profile', ['id' => $application->student_id]) }}" class="btn btn-primary">View Profile</a>
    </td>
</tr>
@endforeach
</tbody>
            </table>
        </div>
    </div>
</body>
</html>