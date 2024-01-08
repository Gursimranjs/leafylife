<?php
session_start(); // Initialize the session

// Check if the user is logged in (authentication check)
if (!isset($_SESSION["user"])) {
    echo "User not logged in"; // Prompt indicating user is not logged in
    exit(); // Stop further execution
}

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your password
$dbname = "users"; // Replace with your database name

// Create a new connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection to the database was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // Display error message and stop execution if connection fails
}

// Retrieve user's email from the session data
$email = $_SESSION['user']['email'];

// Get product information from the form submission
$productName = $_POST['product_name'];
$productPrice = $_POST['product_price'];
$productImage = $_POST['product_image'];
$productquantity = $_POST['quantity'];

// Insert the product information into the cart table
$sql = "INSERT INTO cart (email, product_name, product_image, product_price, quantity) VALUES ('$email', '$productName', '$productImage', $productPrice, $productquantity)";

// Execute the SQL query to add the item to the cart
if ($conn->query($sql) === TRUE) {
    echo "Item added to cart!"; // Display success message if insertion is successful
} else {
    echo "Error: " . $sql . "<br>" . $conn->error; // Display error message if insertion fails
}

$conn->close(); // Close the database connection
?>
