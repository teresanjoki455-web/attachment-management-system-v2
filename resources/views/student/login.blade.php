<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Login</title>
  <style>
    /* Global Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: #f1f5f9;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 16px;
    }

    /* Layout Container */
    .login-box {
      display: flex;
      width: 100%;
      max-width: 900px;
      height: 550px;
      background-color: #ffffff;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
    }

    /* Left Side Form Details */
    .form-pane {
      flex: 1;
      padding: 48px;
      display: flex;
      align-items: center;
    }

    .form-wrapper {
      width: 100%;
    }

    h2 {
      font-size: 28px;
      font-weight: 700;
      color: #1e3a8a; /* Deep Blue Title */
      letter-spacing: -0.5px;
    }

    .subtitle {
      font-size: 14px;
      color: #64748b;
      margin-top: 8px;
      margin-bottom: 32px;
    }

    .input-field {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-size: 14px;
      font-weight: 600;
      color: #334155;
      margin-bottom: 6px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px 16px;
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      font-size: 14px;
      color: #1e293b;
      outline: none;
      transition: all 0.2s;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      border-color: #2563eb; /* Vibrant Blue Focus Accent */
      box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }

    /* Remember and Forgot options */
    .extra-options {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 14px;
      margin-bottom: 24px;
    }

    .checkbox-container {
      display: flex;
      align-items: center;
      gap: 8px;
      color: #475569;
      cursor: pointer;
    }

    .checkbox-container input {
      width: 16px;
      height: 16px;
      accent-color: #2563eb;
    }

    .forgot-link {
      color: #2563eb;
      text-decoration: none;
      font-weight: 500;
    }

    .forgot-link:hover {
      text-decoration: underline;
    }

    /* Submit Button */
    .submit-button {
      width: 100%;
      padding: 12px;
      background-color: #2563eb; /* Primary Accent Blue */
      color: #ffffff;
      border: none;
      border-radius: 8px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.2s;
    }

    .submit-button:hover {
      background-color: #1d4ed8;
    }

    /* Right Side Banner Picture */
    .visual-pane {
      flex: 1;
      background-image: url('https://unsplash.com');
      background-size: cover;
      background-position: center;
      display: flex;
      align-items: flex-end;
    }

    .gradient-overlay {
      background: linear-gradient(to top, rgba(15, 23, 42, 0.95), rgba(30, 58, 138, 0.6), transparent);
      padding: 40px;
      width: 100%;
      height: 50%;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
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

    /* Responsive Breakdown for Small Screens */
    @media (max-width: 768px) {
      .visual-pane {
        display: none;
      }
      .login-box {
        max-width: 450px;
        height: auto;
      }
      .form-pane {
        padding: 32px 24px;
      }
    }
  </style>
</head>
<body>

  <div class="login-box">
    
    <!-- Form Side -->
    <div class="form-pane">
      <div class="form-wrapper">
        <h2>Student Login</h2>
        <p class="subtitle">Welcome back! Please enter your details.</p>
        
        <!-- Clean, Single Form Setup -->
        <form action="{{ url('/student/login') }}" method="POST">
          @csrf
          @if(session('error'))
            <div style="color: red; margin-bottom: 15px;">
             {{ session('error') }}
           </div>
         @endif

          <div class="input-field">
            <label for="username">Student ID / Email</label>
            <input type="text" id="username" name="username" placeholder="Enter your ID or email" required>
          </div>
          
          <div class="input-field">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="......" required>
          </div>
          
          <div class="extra-options">
            <label class="checkbox-container">
              <input type="checkbox" name="remember">
              Remember me
            </label>
            <a href="#" class="forgot-link">Forgot password?</a>
          </div>
          
          <button type="submit" class="submit-button">Sign In</button>
        </form>
      </div>
    </div>
    
    <!-- Image Side -->
    <div class="visual-pane">
      <div class="gradient-overlay">
        <h3>Empower Your Learning Journey</h3>
        <p>Access your courses, schedules, and academic progress all in one centralized hub.</p>
      </div>
    </div>

  </div>

</body>
</html>