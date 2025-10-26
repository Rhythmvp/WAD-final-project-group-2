<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$host = 'localhost';
$dbname = 'telu_mind';
$username = 'root';
$password = '';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mood_level = $_POST['mood_level'];
    $mood_type = $_POST['mood_type'];
    $notes = $_POST['notes'];
    
    $stmt = $pdo->prepare("INSERT INTO mood_entries (user_id, mood_level, mood_type, notes) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $mood_level, $mood_type, $notes]);
    
    $success = "Mood entry saved successfully!";
}

// Get recent mood entries
$stmt = $pdo->prepare("SELECT * FROM mood_entries WHERE user_id = ? ORDER BY created_at DESC LIMIT 7");
$stmt->execute([$_SESSION['user_id']]);
$recent_moods = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mood Tracker - TelU Mind</title>
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
        
        .back-btn {
            padding: 0.5rem 1rem;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        
        .container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 2rem;
            border-radius: 15px;
            color: white;
            margin-bottom: 2rem;
        }
        
        .mood-form {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }
        
        .mood-selector {
            display: flex;
            justify-content: space-around;
            margin: 2rem 0;
        }
        
        .mood-option {
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s;
        }
        
        .mood-option:hover {
            transform: scale(1.1);
        }
        
        .mood-option input[type="radio"] {
            display: none;
        }
        
        .mood-icon {
            font-size: 3rem;
            margin-bottom: 0.5rem;
            opacity: 0.5;
            transition: opacity 0.3s;
        }
        
        .mood-option input[type="radio"]:checked + .mood-icon {
            opacity: 1;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-weight: 500;
        }
        
        select, textarea {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
        }
        
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
        }
        
        .success {
            background: #efe;
            color: #3c3;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        
        .mood-history {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .mood-entry {
            padding: 1rem;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .mood-entry:last-child {
            border-bottom: none;
        }
        
        .entry-date {
            color: #888;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">🧠 TelU Mind</div>
        <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>
    </nav>
    
    <div class="container">
        <div class="header">
            <h1>😊 Mood Tracker</h1>
            <p>Track your daily emotional wellbeing</p>
        </div>
        
        <?php if (isset($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <div class="mood-form">
            <h2>How are you feeling today?</h2>
            <form method="POST" action="">
                <div class="mood-selector">
                    <label class="mood-option">
                        <input type="radio" name="mood_level" value="1" required>
                        <div class="mood-icon">😢</div>
                        <div>Very Bad</div>
                    </label>
                    <label class="mood-option">
                        <input type="radio" name="mood_level" value="2" required>
                        <div class="mood-icon">😕</div>
                        <div>Bad</div>
                    </label>
                    <label class="mood-option">
                        <input type="radio" name="mood_level" value="3" required>
                        <div class="mood-icon">😐</div>
                        <div>Okay</div>
                    </label>
                    <label class="mood-option">
                        <input type="radio" name="mood_level" value="4" required>
                        <div class="mood-icon">😊</div>
                        <div>Good</div>
                    </label>
                    <label class="mood-option">
                        <input type="radio" name="mood_level" value="5" required>
                        <div class="mood-icon">😄</div>
                        <div>Excellent</div>
                    </label>
                </div>
                
                <div class="form-group">
                    <label for="mood_type">Mood Type</label>
                    <select id="mood_type" name="mood_type" required>
                        <option value="">Select mood type...</option>
                        <option value="stressed">Stressed</option>
                        <option value="anxious">Anxious</option>
                        <option value="happy">Happy</option>
                        <option value="calm">Calm</option>
                        <option value="excited">Excited</option>
                        <option value="tired">Tired</option>
                        <option value="motivated">Motivated</option>
                        <option value="overwhelmed">Overwhelmed</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="notes">Notes (Optional)</label>
                    <textarea id="notes" name="notes" placeholder="What's affecting your mood today?"></textarea>
                </div>
                
                <button type="submit" class="submit-btn">Save Mood Entry</button>
            </form>
        </div>
        
        <div class="mood-history">
            <h2>Your Recent Moods</h2>
            <?php if (count($recent_moods) > 0): ?>
                <?php foreach ($recent_moods as $entry): ?>
                    <div class="mood-entry">
                        <div>
                            <strong><?php echo htmlspecialchars($entry['mood_type']); ?></strong>
                            <?php if ($entry['notes']): ?>
                                <p><?php echo htmlspecialchars($entry['notes']); ?></p>
                            <?php endif; ?>
                        </div>
                        <div>
                            <div style="font-size: 2rem;">
                                <?php 
                                    $mood_icons = ['😢', '😕', '😐', '😊', '😄'];
                                    echo $mood_icons[$entry['mood_level'] - 1];
                                ?>
                            </div>
                            <div class="entry-date"><?php echo date('M d, Y', strtotime($entry['created_at'])); ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align: center; color: #888; padding: 2rem;">No mood entries yet. Start tracking your mood today!</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>