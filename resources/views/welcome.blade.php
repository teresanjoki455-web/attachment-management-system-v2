<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attachment Management System</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body {
            background-color: #f1f5f9;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 16px;
        }

        .landing-box {
            display: flex;
            width: 100%;
            max-width: 960px;
            min-height: 560px;
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.1);
        }

        /* Left: Image side */
        .visual-pane {
            flex: 1;
            background-image: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: flex-end;
        }
        .gradient-overlay {
            background: linear-gradient(to top, rgba(15, 23, 42, 0.9), rgba(30, 58, 138, 0.5), transparent);
            padding: 40px;
            width: 100%;
            color: #ffffff;
        }
        .gradient-overlay h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .gradient-overlay p {
            font-size: 14px;
            color: #e2e8f0;
            line-height: 1.5;
        }

        /* Right: Portal selection side */
        .content-pane {
            flex: 1;
            padding: 56px 48px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .logo-badge {
            width: 48px;
            height: 48px;
            background: #2563eb;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            margin-bottom: 24px;
        }
        h1 {
            color: #1e293b;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }
        .subtitle {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 36px;
        }
        .portal-links {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        .portal-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 18px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            color: #1e293b;
            border: 1px solid #e2e8f0;
            transition: all 0.2s;
        }
        .portal-btn:hover {
            border-color: #2563eb;
            background-color: #eff6ff;
            transform: translateY(-2px);
        }
        .icon-circle {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: white;
            flex-shrink: 0;
        }
        .student-icon { background: #2563eb; }
        .company-icon { background: #0d9488; }
        .admin-icon { background: #7c3aed; }

        @media (max-width: 768px) {
            .visual-pane { display: none; }
            .landing-box { max-width: 450px; min-height: auto; }
            .content-pane { padding: 40px 28px; }
        }
    </style>
</head>
<body>
    <div class="landing-box">
        <div class="visual-pane">
            <div class="gradient-overlay">
                <h3>Empowering Student Attachments</h3>
                <p>Connecting students, companies, and administrators in one seamless placement platform.</p>
            </div>
        </div>

        <div class="content-pane">
            <div class="logo-badge">🎓</div>
            <h1>Attachment Management System</h1>
            <p class="subtitle">Select your portal to continue</p>

            <div class="portal-links">
                <a href="/student/login" class="portal-btn">
                    <span class="icon-circle student-icon">🎓</span>
                    Student Portal
                </a>
                <a href="/company/login" class="portal-btn">
                    <span class="icon-circle company-icon">🏢</span>
                    Company Portal
                </a>
                <a href="/admin/login" class="portal-btn">
                    <span class="icon-circle admin-icon">🔐</span>
                    Admin Portal
                </a>
            </div>
        </div>
    </div>
</body>
</html>