<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TelU Mind - Campus Wellness Platform</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .nav-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #667eea;
        }
        
        .nav-links a {
            margin-left: 2rem;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .nav-links a:hover {
            color: #667eea;
        }
        
        .hero {
            max-width: 1200px;
            margin: 4rem auto;
            padding: 2rem;
            text-align: center;
            color: white;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .cta-button {
            display: inline-block;
            padding: 1rem 2rem;
            background: white;
            color: #667eea;
            text-decoration: none;
            border-radius: 50px;
            font-weight: bold;
            transition: transform 0.3s;
        }
        
        .cta-button:hover {
            transform: translateY(-3px);
        }
        
        .features {
            max-width: 1200px;
            margin: 4rem auto;
            padding: 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }
        
        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        .feature-card h3 {
            color: #667eea;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-content">
            <div class="logo">🧠 TelU Mind</div>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            </div>
        </div>
    </nav>
    
    <div class="hero">
        <h1>Welcome to TelU Mind</h1>
        <p>Your integrated campus wellness platform for physical, mental, and social health</p>
        <a href="register.php" class="cta-button">Get Started Today</a>
    </div>
    
    <div class="features">
        <div class="feature-card">
            <div class="feature-icon">🧘</div>
            <h3>Mind</h3>
            <p>Track your mood, journal anonymously, and connect with peer counselors for mental wellness support</p>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">💪</div>
            <h3>Body</h3>
            <p>Movement tracker, personalized health food recommendations, and healthy lifestyle challenges</p>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">🤝</div>
            <h3>Connect</h3>
            <p>Campus community wellness calendar, quick access to clinics, and professional counselor directory</p>
        </div>
    </div>
</body>
</html>