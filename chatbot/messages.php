<?php
// Initialize sessions or user authentication if needed

// Check if this is a POST request with a message
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message']) && isset($_POST['email'])) {
    // Sanitize user input
    $message = htmlspecialchars($_POST['message']);
    $email = htmlspecialchars($_POST['email']);

    // Save the message to a file, database, or perform other actions to store the message
    // Here, for demonstration purposes, let's store messages in a file

    // Example: Storing messages in a file (Append mode)
    $filename = 'chat_log.txt';
    $newMessage = date("Y-m-d H:i:s") . " - From: $email - Message: $message" . PHP_EOL;

    // Append the new message to the file
    file_put_contents($filename, $newMessage, FILE_APPEND | LOCK_EX);
} else {
    // Return error or handle other types of requests
    echo "Invalid request";
}
?>
