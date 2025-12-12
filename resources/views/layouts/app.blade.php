<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TelUrMind</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Global Styles -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #E7F3E7; /* Light mint background */
            color: #1F3D1F; /* Dark green text */
        }

        .navbar {
            background: #CFE8CF;
            padding: 12px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #A6C2A6;
        }

        .navbar a {
            color: #1F3D1F;
            font-weight: 500;
            text-decoration: none;
            margin-right: 20px;
        }

        .container {
            width: 90%;
            margin: auto;
            padding-top: 30px;
        }

        .card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            border: 1px solid #A6C2A6;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        .page-title {
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 20px;
            background: #80A980;
            color: white;
            border-radius: 10px;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background: #6E916E;
        }
    </style>

</head>

<body>

    <!-- NAVBAR -->
    <div class="navbar">
        <h2 style="margin:0;">TelUrMind</h2>
        <div>
            <a href="/">Home</a>
            <a href="/challenges">Challenges</a>
            <a href="/clinics">Clinics</a>
            <a href="/quiz">Quiz</a>
            <a href="/diary">Diary</a>
            <a href="/forum">Forum</a>
        </div>
    </div>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
