<?php
// verify.php
session_start();

// Set the session maximum lifetime to 5 minutes
$session_max_lifetime = 300; // 5 minutes in seconds
ini_set('session.gc_maxlifetime', $session_max_lifetime);

// Check if the token is set in the session
if (!isset($_SESSION['token'])) {
    echo "Access denied. Invalid token.";
    exit();
}

// Store the last activity time
$_SESSION['last_activity'] = time();

$token = $_SESSION['token'];

// Connect to the database
$db = new mysqli("localhost", "root", "", "token_database");

// Check if the token is valid
$query = "SELECT * FROM tokens WHERE token = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Token is valid, redirect to the restricted page
    $restricted_page_url = "http://localhost/QR-Code-Tokens/restricted_page.php";
    header("Location: $restricted_page_url");
    exit();
} else {
    // Token is invalid, deny access
    $scan_again_url = "http://localhost/QR-Code-Tokens/scan_again.php";
    header("Location: $scan_again_url");
}

$stmt->close();
$db->close();