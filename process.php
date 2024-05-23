<?php
// process.php
session_start();

// Store the token in the session
$token = $_GET['token'];
$_SESSION['token'] = $token;

// Redirect to the verification script
header("Location: verify.php");
exit();