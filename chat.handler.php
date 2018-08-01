<?php
session_start();

require_once('db.config.php');

$author     = $_SESSION['username'];
$message    = $_POST['message'];
$time       = date("H:i:s");
$ip         = $_SERVER['REMOTE_ADDR'];

$stmt = $conn->prepare("INSERT INTO messages (author, message, time, ip) VALUES (?, ?, ?, ?)");
$stmt->bind_param('ssss', $author, $message, $time, $ip);

if ($stmt->execute()) {
    echo "OK";
} else {
    echo "ERR";
}