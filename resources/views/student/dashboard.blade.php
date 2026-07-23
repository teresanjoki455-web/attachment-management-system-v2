<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - Attachment System</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { display: flex; background-color: #f8fafc; min-height: 100vh; }
        
        /* Sidebar Styling (Deep Blue Corporate Theme) */
        .sidebar { width: 260px; background-color: #1e3a8a; color: white; padding: 25px 20px; display: flex; flex-direction: column; gap: 20px; }
        .sidebar h2 { font-size: 1.2rem; border-bottom: 1px solid #3b82f6; padding-bottom: 15px; margin-bottom: 10px; }
        .sidebar a { color: #93c5fd; text-decoration: none; padding: 12px 15px; border-radius: 8px; font-weight: 500; transition: 0.2s; }
        .sidebar a:hover, .sidebar a.active { background-color: #2563eb; color: white; }
        
        /* Main Workspace Area */
        .main-content { flex: 1; padding: 40px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; border-bottom: 2px solid #e2e8f0; padding-bottom: 15px; }
        .header h1 { color: #1e293b; font-size: 1.8rem; }
        .card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

    <!-- Sidebar Navigation based on your blueprint -->
    <div class="sidebar">
        <h2>Student Portal</h2>
        <a href="/student/dashboard" class="active">📊 Dashboard Home</a>
        <a href="/student/profile">👤 Profile Mgmt.</a>
        <a href="/student/vacancies">🔍 View Vacancies</a>
        <a href="/student/track" style="color: #0c1014;">📂 Track Applications</a>
        <a href="/logout" style="margin-top: auto; color: #fca5a5;">🚪 Logout</a>
    </div>

    <!-- Main Dynamic Content Workspace -->
    <div class="main-content">
        <div class="header">
            <h1>Welcome Back! 👋</h1>
            <p>Logged in as: <strong>{{ session('student_name') }}</strong></p>
        </div>

        @if(session('success'))
            <div style="background-color: #d1fae5; color: #065f46; padding: 12px 20px; border-radius: 8px; margin-bottom: 20px; font-weight: 600;">
                ✅ {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <h3>Your Application Status Overview</h3>
            <p style="margin-top: 10px; color: #64748b;">Complete your Profile Management settings using the sidebar link to start applying for open attachment roles.</p>
               <!-- PASTE THE OVERVIEW METRICS GRID HERE -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; font-family: 'Segoe UI', sans-serif; width: 100%;">
          
          <!-- Card 1: Total Submitted -->
          <div style="background-color: #ffffff; border-radius: 12px; padding: 20px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; border-left: 5px solid #2563eb;">
            <p style="font-size: 13px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin: 0;">Total Submitted</p>
            <h3 style="font-size: 28px; font-weight: 700; color: #1e293b; margin-top: 8px; margin-bottom: 0;">03</h3>
            <span style="font-size: 12px; color: #2563eb; font-weight: 500; display: block; margin-top: 6px;">Active submissions</span>
          </div>

          <!-- Card 2: Approved Placement -->
          <div style="background-color: #ffffff; border-radius: 12px; padding: 20px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; border-left: 5px solid #16a34a;">
            <p style="font-size: 13px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin: 0;">Approved Placement</p>
            <h3 style="font-size: 28px; font-weight: 700; color: #16a34a; margin-top: 8px; margin-bottom: 0;">01</h3>
            <span style="font-size: 12px; color: #16a34a; font-weight: 500; display: block; margin-top: 6px;">✓ Position Confirmed</span>
          </div>

          <!-- Card 3: Pending Review -->
          <div style="background-color: #ffffff; border-radius: 12px; padding: 20px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); border: 1px solid #e2e8f0; border-left: 5px solid #ea580c;">
            <p style="font-size: 13px; font-weight: 600; color: #64748b; text-transform: uppercase; letter-spacing: 0.05em; margin: 0;">Pending Review</p>
            <h3 style="font-size: 28px; font-weight: 700; color: #ea580c; margin-top: 8px; margin-bottom: 0;">02</h3>
            <span style="font-size: 12px; color: #ea580c; font-weight: 500; display: block; margin-top: 6px;">Under verification</span>
          </div>

        </div>
        <!-- END OF OVERVIEW METRICS GRID -->

    </div>
    <!-- NEW: Submissions Data Table Section -->
        <div style="margin-top: 32px; font-family: 'Segoe UI', sans-serif; width: 100%;">
            
            <h4 style="font-size: 16px; font-weight: 700; color: #1e3a8a; margin-bottom: 16px;">Recent Submissions Timeline</h4>
            
            <div style="width: 100%; overflow-x: auto; border: 1px solid #e2e8f0; border-radius: 8px; background-color: #ffffff;">
                <table style="width: 100%; border-collapse: collapse; text-align: left; font-size: 14px;">
                    <thead>
                        <tr style="background-color: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                            <th style="padding: 12px 16px; font-weight: 600; color: #475569;">Company Name</th>
                            <th style="padding: 12px 16px; font-weight: 600; color: #475569;">Target Role</th>
                            <th style="padding: 12px 16px; font-weight: 600; color: #475569;">Submission Date</th>
                            <th style="padding: 12px 16px; font-weight: 600; color: #475569;">Status</th>
                        </tr>
                    </thead>
                    <tbody style="color: #334155;">
                        <!-- Row 1: Approved Placement -->
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 12px 16px; font-weight: 500; color: #1e293b;">Safaricom PLC</td>
                            <td style="padding: 12px 16px;">IT Support Intern</td>
                            <td style="padding: 12px 16px;">July 10, 2026</td>
                            <td style="padding: 12px 16px;">
                                <span style="background-color: #dcfce7; color: #16a34a; font-size: 12px; font-weight: 600; padding: 4px 8px; border-radius: 9999px;">Approved</span>
                            </td>
                        </tr>
                        <!-- Row 2: Pending Review -->
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 12px 16px; font-weight: 500; color: #1e293b;">KCB Bank Group</td>
                            <td style="padding: 12px 16px;">Software Engineering Intern</td>
                            <td style="padding: 12px 16px;">July 15, 2026</td>
                            <td style="padding: 12px 16px;">
                                <span style="background-color: #ffedd5; color: #ea580c; font-size: 12px; font-weight: 600; padding: 4px 8px; border-radius: 9999px;">Pending</span>
                            </td>
                        </tr>
                        <!-- Row 3: Overdue / Action Required -->
                        <tr>
                            <td style="padding: 12px 16px; font-weight: 500; color: #1e293b;">Equity Bank</td>
                            <td style="padding: 12px 16px;">Data Analyst Intern</td>
                            <td style="padding: 12px 16px;">July 19, 2026</td>
                            <td style="padding: 12px 16px;">
                                <span style="background-color: #fef2f2; color: #dc2626; font-size: 12px; font-weight: 600; padding: 4px 8px; border-radius: 9999px;">Overdue</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- END OF DATA TABLE SECTION -->
        </div>
    </div>

</body>
</html>
    