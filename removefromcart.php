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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['item_name'])) {
    $itemName = $_GET['item_name'];
    $email = $_SESSION['user']['email'];

    // Retrieve the ID of the item based on the item name and user's email
    $getIdQuery = "SELECT id FROM cart WHERE email = '$email' AND product_name = '$itemName'";
    $result = $conn->query($getIdQuery);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $itemId = $row['id'];

        // Delete the item from the cart table based on item ID
        $deleteFromCart = "DELETE FROM cart WHERE id = $itemId";
        if ($conn->query($deleteFromCart) === TRUE) {
            echo "Item removed from cart successfully";
        } else {
            echo "Error deleting item from cart: " . $conn->error;
        }
    } else {
        echo "Item not found in cart";
    }
}
?>
