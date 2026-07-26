<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Vacancies - Attachment System</title>
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
        
        /* Vacancy Grid Layout */
        .vacancy-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 25px; margin-top: 20px; }
        .vacancy-card { background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); display: flex; flex-direction: column; justify-content: space-between; border-top: 4px solid #2563eb; }
        .company-name { color: #2563eb; font-weight: 700; font-size: 0.9rem; text-transform: uppercase; margin-bottom: 5px; }
        .job-title { color: #1e293b; font-size: 1.3rem; margin-bottom: 10px; font-weight: 600; }
        .job-desc { color: #64748b; font-size: 0.95rem; line-height: 1.5; margin-bottom: 20px; }
        .job-meta { font-size: 0.85rem; color: #94a3b8; margin-bottom: 15px; display: flex; gap: 15px; }
        
        .btn-apply { background-color: #2563eb; color: white; text-decoration: none; text-align: center; padding: 10px; border-radius: 6px; font-weight: 600; transition: 0.2s; display: block; }
        .btn-apply:hover { background-color: #1d4ed8; }
    </style>
</head>
<body>

    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <h2>Student Portal</h2>
        <a href="/student/dashboard">📊 Dashboard Home</a>
        <a href="/student/profile">👤 Profile Mgmt.</a>
        <a href="/student/vacancies" class="active">🔍 View Vacancies</a>
        <a href="/student/applications">📂 Track Applications</a>
        <a href="/logout" style="margin-top: auto; color: #fca5a5;">🚪 Logout</a>
    </div>

    <!-- Vacancies Workspace -->
    <div class="main-content">
        <div class="header">
            <h1>Available Vacancies 🔍</h1>
            <p>Browse and apply for verified attachment openings</p>
        </div>

    <div class="vacancies-grid">
            <!-- Fetch active database rows directly -->
@php
    $vacancies = \Illuminate\Support\Facades\DB::table('vacancies')->get();
@endphp

@foreach($vacancies as $vacancy)
           <div class="vacancy-card" style="background: white; border-radius: 12px; padding: 25px; margin-bottom: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <h4 style="color: #6b7280; text-transform: uppercase; font-size: 0.85rem; font-weight: bold; margin: 0;">{{ $vacancy->company_name ?? 'Company' }}</h4>
        <h3 style="color: #1f2937; margin: 5px 0 10px 0; font-size: 1.4rem;">{{ $vacancy->title }}</h3>
        <p style="color: #4b5563; font-size: 1rem; line-height: 1.6;">{{ $vacancy->description }}</p>
        
        <div style="margin: 15px 0; font-size: 0.95rem; color: #6b7280;">
            <span>📍 {{ $vacancy->location }}</span>
        </div>
        
        <form action='/student/register' method="POST">
    @csrf
    
         <!-- 1. ADD THIS UNIQUE ID FIELD (CRITICAL FIX) -->
          <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">
    
          <!-- 2. Dynamic values directly from the database loop -->
          <input type="hidden" name="company_name" value="{{ $vacancy->company_name }}">
          <input type="hidden" name="job_title" value="{{ $vacancy->title }}">
    
         <button type="submit" style="background: #2563eb; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
          Apply For Placement
         </button>
          </form>
          </div>

   
                    <div>
                        <div class="company-name">Safaricom PLC</div>
                        <div class="job-title">Software Engineering Intern</div>
                        <p class="job-desc">Join our core backend team working on next-generation financial technology and APIs using PHP and Laravel frameworks.</p>
                    </div>
                    <div>
                        <div class="job-meta">📍 Nairobi | 🕒 3 Months</div>
                        <button type="submit" class="btn-apply" style="width: 100%; border: none; cursor: pointer;">Apply For Placement</button>
                    </div>
                </form>
            </div>
@endforeach
            <!-- Vacancy Card 2 -->
            <div class="vacancy-card" style="border-top-color: #0d9488;">
                <form action="/student/register" method="POST">
                    @csrf
                    <input type="hidden" name="company_name" value="KCB Bank Group">
                    <input type="hidden" name="job_title" value="ICT Support Attachment">
                    
                    <div>
                        <div class="company-name">KCB Bank Group</div>
                        <div class="job-title">ICT Support Attachment</div>
                        <p class="job-desc">Assist the hardware infrastructure deployment, database maintenance routines, and customer network configurations team.</p>
                    </div>
                    <div>
                        <div class="job-meta">📍 Mombasa | 🕒 3 Months</div>
                        <button type="submit" class="btn-apply" style="width: 100%; border: none; cursor: pointer;">Apply For Placement</button>
                    </div>
                </form>
            </div>

            <!-- Vacancy Card 3 -->
            <div class="vacancy-card" style="border-top-color: #7c3aed;">
                <form action="/student/register" method="POST">
                    @csrf
                    <input type="hidden" name="company_name" value="ICT Authority">
                    <input type="hidden" name="job_title" value="Data Analyst Attachee">
                    
                    <div>
                        <div class="company-name">ICT Authority</div>
                        <div class="job-title">Data Analyst Attachee</div>
                        <p class="job-desc">Work with public data repositories tracking digital literacy statistics across national primary learning centers.</p>
                    </div>
                    <div>
                        <div class="job-meta">📍 Remote / Eldoret | 🕒 6 Months</div>
                        <button type="submit" class="btn-apply" style="width: 100%; border: none; cursor: pointer;">Apply For Placement</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>