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
    $title = $_POST['title'];
    $content = $_POST['content'];
    $is_anonymous = isset($_POST['is_anonymous']) ? 1 : 0;
    
    $stmt = $pdo->prepare("INSERT INTO journal_entries (user_id, title, content, is_anonymous) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $title, $content, $is_anonymous]);
    
    $success = "Journal entry saved successfully!";
}

// Get user's journal entries
$stmt = $pdo->prepare("SELECT * FROM journal_entries WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$_SESSION['user_id']]);
$journal_entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anonymous Journal - TelU Mind</title>
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
        
        .journal-form {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
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
        
        input[type="text"], textarea {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 1rem;
            font-family: inherit;
        }
        
        textarea {
            resize: vertical;
            min-height: 200px;
        }
        
        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .checkbox-group input[type="checkbox"] {
            width: 20px;
            height: 20px;
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
        
        .submit-btn:hover {
            background: #5568d3;
        }
        
        .success {
            background: #efe;
            color: #3c3;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        
        .info-box {
            background: #e3f2fd;
            border-left: 4px solid #2196f3;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 5px;
        }
        
        .journal-entries {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .journal-entry {
            padding: 1.5rem;
            border: 1px solid #eee;
            border-radius: 10px;
            margin-bottom: 1rem;
        }
        
        .entry-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .entry-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }
        
        .entry-date {
            color: #888;
            font-size: 0.9rem;
        }
        
        .entry-content {
            color: #555;
            line-height: 1.6;
        }
        
        .anonymous-badge {
            background: #ffd700;
            color: #333;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.85rem;
            display: inline-block;
            margin-top: 0.5rem;
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
            <h1>📝 Anonymous Journal</h1>
            <p>Express yourself privately and safely</p>
        </div>
        
        <?php if (isset($success)): ?>
            <div class="success"><?php echo $success; ?></div>
        <?php endif; ?>
        
        <div class="journal-form">
            <h2>New Journal Entry</h2>
            
            <div class="info-box">
                🔒 Your journal entries are private. Enable "Anonymous" mode to share your thoughts without identifying yourself.
            </div>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="Give your entry a title..." required>
                </div>
                
                <div class="form-group">
                    <label for="content">Your Thoughts</label>
                    <textarea id="content" name="content" placeholder="Write your thoughts here..." required></textarea>
                </div>
                
                <div class="form-group checkbox-group">
                    <input type="checkbox" id="is_anonymous" name="is_anonymous" checked>
                    <label for="is_anonymous" style="margin: 0;">Make this entry anonymous</label>
                </div>
                
                <button type="submit" class="submit-btn">Save Entry</button>
            </form>
        </div>
        
        <div class="journal-entries">
            <h2>Your Journal Entries</h2>
            <?php if (count($journal_entries) > 0): ?>
                <?php foreach ($journal_entries as $entry): ?>
                    <div class="journal-entry">
                        <div class="entry-header">
                            <div class="entry-title"><?php echo htmlspecialchars($entry['title']); ?></div>
                            <div class="entry-date"><?php echo date('M d, Y', strtotime($entry['created_at'])); ?></div>
                        </div>
                        <div class="entry-content">
                            <?php echo nl2br(htmlspecialchars($entry['content'])); ?>
                        </div>
                        <?php if ($entry['is_anonymous']): ?>
                            <span class="anonymous-badge">🔒 Anonymous</span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align: center; color: #888; padding: 2rem;">No journal entries yet. Start writing your first entry!</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>