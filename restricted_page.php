<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Website</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        
        h1 {
            color: #333;
            font-size: 36px;
            margin-bottom: 20px;
        }
        
        p {
            color: #666;
            font-size: 18px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // restricted_page.php
        session_start();

        // Check if the token is still valid in the session
        if (!isset($_SESSION['token'])) {
            // Token is not valid or has expired, deny access
            $scan_again = "http://192.168.110.44/hotel/scan_again.php";
            header("Location: $scan_again");
            exit();
        }

        // Check if the last activity was more than 5 minutes ago
        $last_activity = isset($_SESSION['last_activity']) ? $_SESSION['last_activity'] : time();
        $session_max_lifetime = 300; // 5 minutes in seconds
        if (time() - $last_activity > $session_max_lifetime) {
            // Destroy the session
            session_destroy();
            echo "<h1>Your session has expired due to inactivity.</h1>";
            echo "<p>Please scan the QR code again to access the website.</p>";
            exit();
        }

        // Update the last activity time
        $_SESSION['last_activity'] = time();
        ?>

        <h1>Welcome to Our Hotel</h1>
        <p>Enjoy your stay and explore our world-class amenities.</p>
    </div>
</body>
</html>