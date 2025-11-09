<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_name = $_SESSION['user_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - TelU Mind</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
        }
        
        .navbar {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #667eea;
        }
        
        .user-info {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .logout-btn {
            padding: 0.5rem 1rem;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .logout-btn:hover {
            background: #5568d3;
        }
        
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .welcome {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem;
            border-radius: 15px;
            color: white;
            margin-bottom: 2rem;
        }
        
        .welcome h1 {
            margin-bottom: 0.5rem;
        }
        
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        
        .dashboard-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            text-decoration: none;
            color: inherit;
            display: block;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
        }
        
        .card-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        .card-title {
            color: #667eea;
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        
        .card-description {
            color: #666;
        }
        
        .quick-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
        }
        
        .stat-label {
            color: #666;
            margin-top: 0.5rem;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">🧠 TelU Mind</div>
        <div class="user-info">
            <span>Welcome, <?php echo htmlspecialchars($user_name); ?>!</span>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </nav>
    
    <div class="container">
        <div class="welcome">
            <h1>Your Wellness Dashboard</h1>
            <p>Track your physical, mental, and social health all in one place</p>
        </div>
        
        <div class="quick-stats">
            <div class="stat-card">
                <div class="stat-number">7</div>
                <div class="stat-label">Days Streak</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">85%</div>
                <div class="stat-label">Wellness Score</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">12</div>
                <div class="stat-label">Activities Logged</div>
            </div>
        </div>
        
        <h2 style="margin: 2rem 0 1rem; color: #333;">Your Wellness Tools</h2>
        
        <div class="dashboard-grid">
            <a href="mood_tracker.php" class="dashboard-card">
                <div class="card-icon">😊</div>
                <div class="card-title">Mood Tracker</div>
                <div class="card-description">Track your daily mood and emotional wellbeing</div>
            </a>
            
            <a href="journal.php" class="dashboard-card">
                <div class="card-icon">📝</div>
                <div class="card-title">Anonymous Journal</div>
                <div class="card-description">Express yourself privately and safely</div>
            </a>
            
            <a href="peer_consul.php" class="dashboard-card">
                <div class="card-icon">💬</div>
                <div class="card-title">Peer Consul</div>
                <div class="card-description">Connect with peer counselors for support</div>
            </a>
            
            <a href="movement_tracker.php" class="dashboard-card">
                <div class="card-icon">🏃</div>
                <div class="card-title">Movement Tracker</div>
                <div class="card-description">Log your physical activities and exercise</div>
            </a>
            
            <a href="health_food.php" class="dashboard-card">
                <div class="card-icon">🥗</div>
                <div class="card-title">Health Food Recommendations</div>
                <div class="card-description">Get personalized healthy meal suggestions</div>
            </a>
            
            <a href="challenges.php" class="dashboard-card">
                <div class="card-icon">🎯</div>
                <div class="card-title">Healthy Life Challenges</div>
                <div class="card-description">Join wellness challenges with your peers</div>
            </a>
            
            <a href="community.php" class="dashboard-card">
                <div class="card-icon">👥</div>
                <div class="card-title">Campus Community</div>
                <div class="card-description">Connect with campus wellness initiatives</div>
            </a>
            
            <a href="wellness_calendar.php" class="dashboard-card">
                <div class="card-icon">📅</div>
                <div class="card-title">Wellness Calendar</div>
                <div class="card-description">View upcoming wellness events and activities</div>
            </a>
            
            <a href="clinic_access.php" class="dashboard-card">
                <div class="card-icon">🏥</div>
                <div class="card-title">Quick Access to Clinic</div>
                <div class="card-description">Find campus clinics and professional counselors</div>
            </a>
        </div>
    </div>
</body>
</html>