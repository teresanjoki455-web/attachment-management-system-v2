<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Portal - Post Vacancy</title>
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
        
        /* Clean Form Card Styling */
        .form-card { background: white; border-radius: 12px; padding: 30px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #e5e7eb; max-width: 600px; }
        .form-group { margin-bottom: 20px; }
        .form-label { display: block; margin-bottom: 8px; font-weight: 600; color: #374151; font-size: 0.95rem; }
        .form-control { width: 100%; padding: 10px 12px; border: 1px solid #d1d5db; border-radius: 6px; box-sizing: border-box; font-size: 0.95rem; }
        .form-control:focus { outline: none; border-color: #3490dc; box-shadow: 0 0 0 3px rgba(52,144,220,0.1); }
        .submit-btn { background-color: #3490dc; color: white; border: none; padding: 12px 24px; border-radius: 6px; font-weight: 600; cursor: pointer; font-size: 0.95rem; transition: background 0.2s; }
        .submit-btn:hover { background-color: #2779bd; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">💼 Company Portal</div>
        <ul class="sidebar-menu">
            <li><a href="/company/dashboard">📁 Dashboard Home</a></li>
            <li class="active"><a href="/company/post-vacancy">➕ Post Vacancy</a></li>
            <li><a href="/company/applicants">👥 Review Applicants</a></li>
            <li style="margin-top: 50px;"><a href="/" style="border-left: none; color: #f87171;">⬅ Back to Home</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="page-header">
            <h1 class="page-title">Post New Attachment Opportunity</h1>
        </div>

        <div class="form-card">
            <form action="#" method="POST" >
                <div class="form-group">
                    <label class="form-label">Job/Attachment Title</label>
                    <input type="text" class="form-control" placeholder="e.g., Software Engineering Intern" required>
                </div>
                @if(session('success'))
            <div style="background-color: #d1e7dd; color: #0f5132; padding: 15px; border-radius: 6px; margin-bottom: 20px; font-weight: bold;">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-card">
            <form action="/company/post-vacancy" method="POST">
                @csrf
                <div class="form-group">
                    <label class="form-label">Job/Attachment Title</label>
                    <input type="text" name="title" class="form-control" placeholder="e.g., Software Engineering Intern" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Duration (Months)</label>
                    <input type="text" name="duration" class="form-control" placeholder="e.g., 3 Months" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Location / Region</label>
                    <input type="text" name="location" class="form-control" placeholder="e.g., Nairobi, Kenya" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Description & Requirements</label>
                    <textarea name="description" class="form-control" rows="5" placeholder="Describe core tasks and student requirements..." required></textarea>
                </div>
                <button type="submit" class="submit-btn">Publish Attachment Slot</button>
            </form>
        </div>
    </div>
</body>
</html>