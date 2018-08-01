<?php
require_once('db.config.php');
$q = "SELECT author, message, time FROM messages ORDER by id DESC";

if ($result = $conn->query($q)) {

    while ($row = $result->fetch_assoc()) {
        $message = "";
        $message .= substr( $row['time'], 0, 5);
        $message .= " - " . $row['author'];
        $message .= ": " .  $row['message'];

        echo htmlentities($message) . "<br><br>";
    }

    $result->free();

} else {

    echo "( ! ) Failed loading chat messages.";

}