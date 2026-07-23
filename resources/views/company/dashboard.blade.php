<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Portal - Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    <style>
        /* Base typography defaults updated to highly readable proportions */
        html { font-size: 16px; transition: font-size 0.2s ease; }
        body { margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; display: flex; background-color: #f3f4f6; }
        
        /* Dark Blue Left Sidebar Layout */
        .sidebar { width: 280px; height: 100vh; background-color: #0b2545; color: white; position: fixed; top: 0; left: 0; padding-top: 20px; box-shadow: 2px 0 5px rgba(0,0,0,0.1); display: flex; flex-direction: column; justify-content: space-between; }
        .sidebar-top { flex-grow: 1; }
        .sidebar-header { padding: 10px 25px 15px 25px; border-bottom: 1px solid rgba(255,255,255,0.1); font-size: 1.3rem; font-weight: bold; letter-spacing: 0.5px; }
        
        /* Accessibility Controls Widget Area */
        .accessibility-widget { padding: 15px 25px; background: rgba(0,0,0,0.2); border-bottom: 1px solid rgba(255,255,255,0.1); }
        .widget-label { font-size: 0.85rem; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px; font-weight: 600; }
        .size-btn-group { display: flex; gap: 8px; }
        .size-btn { flex: 1; background: #1e3a8a; border: 1px solid #3b82f6; color: white; padding: 6px; border-radius: 4px; cursor: pointer; font-weight: bold; font-size: 0.85rem; transition: all 0.2s; }
        .size-btn:hover, .size-btn.active { background: #3490dc; border-color: #60a5fa; }

        .sidebar-menu { list-style: none; padding: 20px 0 0 0; margin: 0; }
        .sidebar-menu li a { display: block; padding: 14px 25px; color: #cbd5e1; text-decoration: none; font-size: 1rem; transition: all 0.2s ease; border-left: 4px solid transparent; }
        .sidebar-menu li a:hover, .sidebar-menu li.active a { background-color: rgba(255,255,255,0.08); color: white; border-left-color: #3490dc; }
        
        /* Content Panel Layout (Using relative sizing units for clean scaling) */
        .main-content { margin-left: 280px; padding: 2.5rem; width: calc(100% - 280px); box-sizing: border-box; }
        .page-header { margin-bottom: 2rem; border-bottom: 2px solid #e5e7eb; padding-bottom: 1rem; }
        .page-title { font-size: 1.85rem; color: #1f2937; margin: 0; font-weight: 700; }
        .page-subtitle { color: #4b5563; margin: 5px 0 0 0; font-size: 1.05rem; }
        
        /* Grid Layout Cards */
        .dashboard-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1.5rem; margin-top: 1.5rem; }
        .stat-card { background: white; border-radius: 12px; padding: 1.75rem; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border: 1px solid #e5e7eb; display: flex; flex-direction: column; justify-content: space-between; }
        .stat-title { font-size: 1.25rem; font-weight: 600; color: #111827; margin: 0 0 10px 0; }
        .stat-desc { color: #374151; font-size: 1rem; line-height: 1.6; margin: 0 0 1.5rem 0; }
        .stat-btn { display: inline-block; background-color: #3490dc; color: white; text-align: center; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 1rem; transition: background 0.2s; }
        .stat-btn:hover { background-color: #2779bd; }
    </style>
</head>
<body>

    <!-- Sidebar with Custom Accessibility Menu Panel -->
    <div class="sidebar">
        <div class="sidebar-top">
            <div class="sidebar-header">💼 Company Portal</div>
            
            <!-- Accessible Font Scaling Controls Widget -->
            <div class="accessibility-widget">
                <div class="widget-label">🔍 Text Scaling</div>
                <div class="size-btn-group">
                    <button class="size-btn active" onclick="changeFontSize('normal', this)">A</button>
                    <button class="size-btn" onclick="changeFontSize('xlarge', this)" style="font-size: 1.25rem;">A++</button>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li class="active"><a href="/company/dashboard">📁 Dashboard Home</a></li>
                <li><a href="/company/post-vacancy">➕ Post Vacancy</a></li>
                <li><a href="/company/applicants">👥 Review Applicants</a></li>
            </ul>
        </div>
        <div style="padding-bottom: 20px;">
            <ul class="sidebar-menu">
                <li><a href="/" style="border-left: none; color: #f87171; font-weight: bold;">⬅ Back to Home</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content Panel Workspace -->
    <div class="main-content">
        <div class="page-header">
            <h1 class="page-title">Welcome Back Dashboard Overview</h1>
            <p class="page-subtitle">Manage your verified industrial attachment openings and track pending attachments.</p>
        </div>

        <div class="dashboard-grid">
            <div class="stat-card">
                <div>
                    <h3 class="stat-title">Active Vacancies</h3>
                    <p class="stat-desc">Review your currently active attachment slots published to the live student feed stream.</p>
                </div>
                <a href="/company/post-vacancy" class="stat-btn">Manage Postings</a>
            </div>

            <div class="stat-card">
                <div>
                    <h3 class="stat-title">Pending Student Applications</h3>
                    <p class="stat-desc">Assess profiles, attachments, CVs, and application structures submitted by student candidates.</p>
                </div>
                <a href="/company/applicants" class="stat-btn">Review Applicants</a>
            </div>
        </div>
    </div>

    <!-- Font Sizer Script Core Logic Engine -->
    <script>
        function changeFontSize(size, element) {
            // Update the HTML root style element to instantly scale content text
            const html = document.documentElement;
            if (size === 'normal') html.style.fontSize = '16px';
            if (size === 'large') html.style.fontSize = '20px';
            if (size === 'xlarge') html.style.fontSize = '24px';
            
            // Toggle active styling states for control tracking
            document.querySelectorAll('.size-btn').forEach(btn => btn.classList.remove('active'));
            element.classList.add('active');
        }
    </script>
</body>
</html>