<?php
session_start();

if (!isset($_SESSION["user"])) {
    echo "User not logged in";
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['order_id'])) {
    $orderId = $_GET['order_id'];
    $email = $_SESSION['user']['email'];

    // Check if the order exists for the user
    $checkOrderQuery = "SELECT * FROM orders WHERE order_id = $orderId AND email = '$email'";
    $result = $conn->query($checkOrderQuery);

    if ($result && $result->num_rows > 0) {
        // Delete the order from the orders table
        $deleteOrderQuery = "DELETE FROM orders WHERE order_id = $orderId AND email = '$email'";
        if ($conn->query($deleteOrderQuery) === TRUE) {
            echo "Order canceled successfully";
        } else {
            echo "Error canceling order: " . $conn->error;
        }
    } else {
        echo "Order not found";
    }
}
?>