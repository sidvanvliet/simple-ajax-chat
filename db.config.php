<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "simple-ajax-chat";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Database connection failed!");
}