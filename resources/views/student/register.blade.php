<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration - Track Application</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://bunny.net">
    <link href="https://bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Unified Dashboard Styling -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8fafc; /* Light admin dashboard background */
            margin: 0;
            display: flex;
            min-height: 100vh;
        }
        /* Sidebar layout matching Option 3 and Track view */
        .sidebar {
            width: 260px;
            background-color: #0f172a; /* Deep dark slate blue used in admin panels */
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
        /* Main Workspace Container */
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
    </style>
</head>
<body>

    <!-- Functional Navigation Links Option 3 -->
    <div class="sidebar">
        <h2>Student Portal</h2>
        <a href="/student/register" class="active">Register Placement</a>
        <a href="/student/track">Track Application</a>
    </div>

    <!-- Main Form Workspace -->
    <div class="main-content">
        <h1 class="header-title">Submit Attachment Application</h1>
        <p class="header-subtitle">Fill in your information to register your industrial attachment details.</p>

        <!-- Success Alert Flash Banner -->
        @if(session('success'))
            <div style="background-color: #d1fae5; color: #065f46; padding: 15px; border-radius: 6px; margin-bottom: 20px; font-weight: 500;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="background-color: #fee2e2; color: #991b1b; padding: 15px; border-radius: 6px; margin-bottom: 20px; font-weight: 500;">
                {{ session('error') }}
            </div>
        @endif
        <!-- Success Message Flash Banner -->
@if(session('success'))
    <div style="background-color: #d1fae5; color: #065f46; padding: 15px; border-radius: 6px; margin-bottom: 20px; font-weight: 500; border: 1px solid #a7f3d0;">
        ✓ {{ session('success') }}
    </div>
@endif

<!-- Validation Errors Flash Banner -->
@if($errors->any())
    <div style="background-color: #fee2e2; color: #991b1b; padding: 15px; border-radius: 6px; margin-bottom: 20px; font-weight: 500; border: 1px solid #fca5a5;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="form-card">
    <!-- Updated with file upload support -->
    <form action="/student/register" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- 1. Full Name -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #334155;">Full Name</label>
            <input type="text" name="name" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;" placeholder="Enter full name" required>
        </div>

        <!-- 2. Email -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #334155;">Email Address</label>
            <input type="email" name="email" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;" placeholder="student@example.com" required>
        </div>

        <!-- 3. Phone -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #334155;">Phone Number</label>
            <input type="text" name="phone" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;" placeholder="e.g., 0712345678" required>
        </div>

        <!-- 4. Course -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #334155;">Course of Study</label>
            <input type="text" name="course" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;" placeholder="e.g., BSc. Information Technology" required>
        </div>

        <!-- 5. Skills -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #334155;">Key Skills</label>
            <textarea name="skills" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box; rows: 3;" placeholder="e.g., Laravel, PHP, MySQL, HTML" required></textarea>
        </div>

        <!-- 6. CV File Upload -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #334155;">Upload CV (PDF or Word)</label>
            <input type="file" name="cv" style="width: 100%; padding: 5px;" required>
        </div>

        <!-- 7. Password -->
        <div class="form-group" style="margin-bottom: 15px;">
            <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #334155;">Create Password</label>
            <input type="password" name="password" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;" placeholder="Minimum 6 characters" required>
        </div>

        <!-- 8. Confirm Password -->
        <div class="form-group" style="margin-bottom: 25px;">
            <label style="display: block; font-weight: 600; margin-bottom: 5px; color: #334155;">Confirm Password</label>
            <input type="password" name="password_confirmation" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;" placeholder="Repeat password" required>
        </div>
       <!-- Missing Input 1: Company Name -->
       <div class="form-group" style="margin-bottom: 20px;">
          <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #334155;">Company Name</label>
          <input type="text" name="company_name" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;" placeholder="e.g., Safaricom PLC" required>
       </div>

       <!-- Missing Input 2: Assigned Position -->
       <div class="form-group" style="margin-bottom: 25px;">
          <label style="display: block; font-weight: 600; margin-bottom: 8px; color: #334155;">Assigned Position</label>
          <input type="text" name="job_title" style="width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box;" placeholder="e.g., Software Engineering Intern" required>
       </div>
    
       <div>
          <!-- Action Button -->
          <button type="submit" style="width: 100%; padding: 12px; background-color: #4f46e5; color: white; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">
            Submit Application
          </button>
            <!-- Add this inside your form card right before the submit button -->
       </div>
 </form>
</body>
</html>