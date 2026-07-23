<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Authentication - Secure Gate</title>
    <link rel="preconnect" href="https://bunny.net">
    <link href="https://bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        body { font-family: 'Figtree', sans-serif; background-color: #0f172a; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .login-card { background: #ffffff; padding: 2.5rem; border-radius: 0.75rem; box-shadow: 0 10px 25px rgba(0,0,0,0.3); width: 100%; max-width: 400px; }
        h2 { margin-bottom: 1.5rem; color: #1e293b; font-weight: 700; text-align: center; }
        .form-group { margin-bottom: 1.25rem; }
        label { display: block; font-weight: 600; margin-bottom: 6px; color: #475569; }
        input { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background-color: #0f172a; color: white; border: none; border-radius: 6px; font-weight: 600; cursor: pointer; margin-top: 10px; }
    </style>
</head>
<body>

    <div class="login-card">
        <h2>Company Portal Sign In</h2>
        @if(session('error'))
            <div style="background-color: #fee2e2; color: #991b1b; padding: 10px; border-radius: 6px; margin-bottom: 15px; font-weight: 500; font-size: 0.9rem;">
                {{ session('error') }}
            </div>
        @endif
        
       <form action="/company/login" method="POST">
            @csrf
            <div class="form-group">
                <label>Company Email</label>
                <input type="email" name="email" placeholder="enter your email" required>
            </div>
            <div class="form-group">
                <label>Secure Password</label>
                <input type="password" name="password" placeholder="••••••••" required>
            </div>
            <button type="submit">Verify & Enter Hub</button>
        </form>

    </div>

</body>
</html>