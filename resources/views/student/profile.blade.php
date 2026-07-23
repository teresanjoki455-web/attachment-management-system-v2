<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Management - Attachment System</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { display: flex; background-color: #f8fafc; min-height: 100vh; }
        
        /* Sidebar Styling */
        .sidebar { width: 260px; background-color: #1e3a8a; color: white; padding: 25px 20px; display: flex; flex-direction: column; gap: 20px; }
        .sidebar h2 { font-size: 1.2rem; border-bottom: 1px solid #3b82f6; padding-bottom: 15px; margin-bottom: 10px; }
        .sidebar a { color: #93c5fd; text-decoration: none; padding: 12px 15px; border-radius: 8px; font-weight: 500; transition: 0.2s; }
        .sidebar a:hover, .sidebar a.active { background-color: #2563eb; color: white; }
        
        /* Main Area */
        .main-content { flex: 1; padding: 40px; }
        .header { margin-bottom: 30px; border-bottom: 2px solid #e2e8f0; padding-bottom: 15px; }
        .card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); max-width: 600px; }
        
        /* Form Inputs */
        .form-group { margin-bottom: 20px; display: flex; flex-direction: column; gap: 8px; }
        .form-group label { font-weight: 600; color: #334155; }
        .form-group input, .form-group textarea { padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 1rem; width: 100%; }
        .btn-save { background-color: #2563eb; color: white; border: none; padding: 12px 20px; border-radius: 6px; font-weight: 600; cursor: pointer; width: 100%; font-size: 1rem; }
        .btn-save:hover { background-color: #1d4ed8; }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h2>Student Portal</h2>
        <a href="/student/dashboard">📊 Dashboard Home</a>
        <a href="/student/profile" class="active">👤 Profile Mgmt.</a>
        <a href="/student/vacancies">🔍 View Vacancies</a>
        <a href="/student/applications">📂 Track Applications</a>
        <a href="/logout" style="margin-top: auto; color: #fca5a5;">🚪 Logout</a>
    </div>

    <!-- Profile Form Workspace -->
    <div class="main-content">
        <div class="header">
            <h1>Profile Management 👤</h1>
            <p>Update your personal and academic skills profile</p>
        </div>
        <!-- Success Message Flash Banner -->
@if(session('success'))
    <div style="background-color: #d1fae5; color: #065f46; padding: 12px 16px; border-radius: 6px; margin-bottom: 20px; font-weight: 500; font-size: 0.95rem; border: 1px solid #a7f3d0;">
        ✓ {{ session('success') }}
    </div>
@endif

        <div class="card">
            <!-- Form will post data to profile save path later -->
            <form action="/student/profile" method="POST">
                @csrf
                
                <div class="form-group">
                    <label>Institution / University Name</label>
                    <input type="text" name="institution" placeholder="e.g., JKUAT, Kenyatta University" required>
                </div>

                <div class="form-group">
                    <label>Skills & Competencies</label>
                    <textarea name="skills" rows="3" placeholder="e.g., Web Design, PHP, Data Entry, Customer Service" required></textarea>
                </div>

                <div class="form-group">
                    <label>Brief Bio / Introduction</label>
                    <textarea name="bio" rows="4" placeholder="Tell companies a little bit about yourself..." required></textarea>
                </div>

                <button type="submit" class="btn-save">Save Profile Details</button>
            </form>
        </div>
    </div>

</body>
</html>