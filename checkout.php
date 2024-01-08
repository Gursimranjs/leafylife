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
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylecheckout.css">
    <title>Document</title>
</head>
<body>

        <!-- Navbar code -->

        <div class="navbar">
            <div class="Brandlogo">
                <a href="index.php">LeafyLife</a>
            </div>

            <div class="nav-items">
                <ul class="items">
                    <li class="nav-item"><a href="about.php">About</a></li>
                    <li class="nav-item"><a href="Food.php">Food</a></li>
                    <li class="nav-item"><a href="fashion.php">Fashion</a></li>
                    <li class="nav-item"><a href="cart.php">Cart</a></li>
                </ul>
            </div>
            <div class="signinlink">

            <?php
            if (isset($_SESSION["user"])) {
                $userN = $_SESSION['user']['name']; // Access the name from the session array
                echo '<div class="dropdown">';
                echo '<a href="#" class="dropbtn">' . $userN . '</a>';
                echo '<div class="dropdown-content">';
                echo '<a href="profile.php">Profile</a>';
                echo '<a href="orders.php">Orders</a>';
                echo '<a href="logout.php">Logout</a>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<a href="LoginSetup/login.php">Sign in</a>';
            }
            ?>


            </div>

        </div>

<div class="checkouttotal">





        <h1>Checkout</h1>

<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $totalPrice = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productTotal = $row["product_price"] * $row["quantity"];
                $totalPrice += $productTotal;
                ?>
                <tr>
                    <td><?php echo $row["product_name"]; ?></td>
                    <td>$<?php echo $row["product_price"]; ?></td>
                    <td><?php echo $row["quantity"]; ?></td>
                    <td>$<?php echo $productTotal; ?></td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='4'>Cart is empty</td></tr>";
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">Total Price:</td>
            <td>$<?php echo $totalPrice; ?></td>
        </tr>
    </tfoot>
</table>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="proceedtopayment">
    <a href="payment-and-address.php" onclick="generateCardDetails()" target="_blank" class="proceed">Address and payment</a>
</div>
    
<script>
function generateCardDetails() {
    var userEmail = '<?php echo $email; ?>'; // Retrieve the email from PHP variable
    $.ajax({
        type: 'POST',
        url: 'generatecard.php', // Verify if this path is correct
        data: {
            email: userEmail // Use the retrieved email
        },
        success: function(response) {
            console.log(response); // Output the response to the browser console
             
        },
        error: function() {
            alert('Error occurred while processing.'); // Display an error message if AJAX request fails
        }
    });
}

</script>

</body>
</html>