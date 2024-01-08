<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    echo "User not logged in";
    exit();
} 

// Database connection
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "users"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['user']['email'];

// Empty the cart for the logged-in user
$sql = "DELETE FROM cart WHERE email = '$email'";

if ($conn->query($sql) === TRUE) {
    echo "Cart emptied successfully";
} else {
    echo "Error emptying cart: " . $conn->error;
}

$conn->close();
?>
