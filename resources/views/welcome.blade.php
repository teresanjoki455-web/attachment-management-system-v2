<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attachment Management System</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://bunny.net">
    <link href="https://bunny.net/css?family=figtree:300,400,500,600,700&display=swap" rel="stylesheet" />
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            min-height: 100vh;
            display: flex;
        }
        /* Split Screen Container Layout */
        .landing-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }
        /* Left Column: Interactive Launch Control Card Panel */
        .content-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 4rem 5rem;
            background-color: #ffffff;
            max-width: 600px;
            box-shadow: 10px 0 30px rgba(15, 23, 42, 0.02);
            z-index: 10;
        }
        .brand-logo {
            font-size: 0.9rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            color: #4f46e5;
            margin-bottom: 3rem;
        }
        .main-heading {
            font-size: 2.75rem;
            font-weight: 700;
            line-height: 1.2;
            color: #1e293b;
            margin-bottom: 1rem;
        }
        .main-heading span {
            color: #4f46e5;
        }
        .sub-text {
            font-size: 1.1rem;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 3rem;
        }
        /* Launch Gate Controller Action Buttons */
        .button-group {
            display: flex;
            flex-direction: column;
            gap: 1.25rem;
        }
        .portal-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.1rem 1.5rem;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.05rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        .btn-student {
            background-color: #4f46e5;
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(79, 70, 229, 0.25);
        }
        .btn-student:hover {
            background-color: #4338ca;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.35);
        }
        .btn-admin {
            background-color: #0f172a;
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.15);
        }
        .btn-admin:hover {
            background-color: #1e293b;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.25);
        }
        .btn-arrow {
            font-size: 1.2rem;
            transition: transform 0.3s ease;
        }
        .btn-company {
    background-color: #3490dc !important; /* Professional Light Blue */
    color: white !important;
}
.btn-company:hover {
    background-color: #2779bd !important; /* Slightly darker blue on hover */
}
        .portal-btn:hover .btn-arrow {
            transform: translateX(5px);
        }
        /* Right Column: High Density Visual Presentation Graphics Image Panel */
        .graphic-panel {
            flex: 1;
            position: relative;
            background-image: linear-gradient(135deg, rgba(79, 70, 229, 0.85), rgba(15, 23, 42, 0.95)), 
                              url('https://unsplash.com');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem;
        }
        .overlay-card {
            background: rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 3rem;
            border-radius: 1rem;
            color: #ffffff;
            max-width: 500px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }
        .overlay-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #38bdf8;
        }
        .overlay-card p {
            font-size: 1rem;
            line-height: 1.6;
            color: #e2e8f0;
        }
        /* Responsive scaling across windows */
        @media (max-width: 1024px) {
            .graphic-panel {
                display: none;
            }
            .content-panel {
                max-width: 100%;
                padding: 4rem 2rem;
            }
        }
    </style>
</head>
<body>

    <div class="landing-container">
        
        <!-- Left Side Control Column Space -->
        <div class="content-panel">
            <div class="brand-logo">NITA Unified Network</div>
            
            <h1 class="main-heading">Attachment <span>Management</span> System</h1>
            <p class="sub-text">
                Welcome to your central application gateway. Streamline your industrial attachment workflow, connect with verified placement partners, and monitor your clearance records instantly.
            </p>
            
            <div class="button-group">
                <!-- Portal Link 1: Student Core Gateway -->
                <a href="/student/dashboard" class="portal-btn btn-student">
                    <span>Student Portal Gateway</span>
                    <span class="btn-arrow">→</span>
                </a>
                <!-- Portal Link 3: Company Gate -->
                    <a href="/company/login" class="portal-btn btn-company">
                        <span>Company Portal Gateway</span>
                        <span class="btn-arrow">&rarr;</span>
                    </a>
                
                <!-- Portal Link 2: Management Admin Hub -->
                <a href="/admin/login" class="portal-btn btn-admin">
                    <span>Administrative Hub Control</span>
                    <span class="btn-arrow">→</span>
                </a>
            </div>
        </div>
        
        <!-- Right Side Stunning Graphic Column Space -->
        <div class="graphic-panel">
            <div class="overlay-card">
                <h3>Empowering Institutional Progress</h3>
                <p>
                    Connecting institutional student skills with industry leading entities. Our platform ensures data validation tracking maps work perfectly across administrative reviewing networks [Sun, Jul 5, 2026].
                </p>
            </div>
        </div>

    </div>

</body>
</html>