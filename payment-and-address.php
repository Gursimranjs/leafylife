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

// Retrieve cart items for the user
$sql = "SELECT * FROM cart WHERE email = '$email'";
$result = $conn->query($sql);

// Calculate total price
$totalPrice = 0;
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $totalPrice += ($row["product_price"] * $row["quantity"]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment and Address Form</title>
    <link rel="stylesheet" href="stylepayment.css"> 
</head>

<body>
    <h1>Payment and Address Form</h1>

    <form action="process_payment.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>

        <label for="total_amount">Total Amount:</label>
        <input type="text" id="total_amount" name="total_amount" value="$<?php echo number_format($totalPrice, 2); ?>" readonly><br><br>



        <h2>Address</h2>

        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" required><br><br>

        <label for="zip">ZIP Code:</label>
        <input type="text" id="zip" name="zip" required><br><br>

        <h2>Payment Information</h2>

        <label for="card_number">Card Number:</label>
        <input type="text" id="card_number" name="card_number" required><br><br>

        <label for="expiry_date">Expiry Date:</label>
        <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YYYY" required><br><br>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required><br><br>

        <input type="submit" value="Pay Now">
    </form>
</body>

</html>

