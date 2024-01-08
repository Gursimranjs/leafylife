
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylecart.css">
    <title>Leafylife</title>
</head>
<body>
    
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    echo '
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

    ';
    echo '<a href="LoginSetup/login.php">Sign in</a>';
    echo '</div></div><br>';
    echo '<div class="notsignedin">Oops you are not signed in!! Please sign in....</div><br>';
    
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

// Retrieve order items for the user from the orders table
$sql = "SELECT * FROM orders WHERE email = '$email'";
$result = $conn->query($sql);
?>


    <section class="section1cart">
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
        <br>

        <div class="cartitems">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="card">
                        <div class="imagescart">
                            <img src="<?php echo $row["product_image"]; ?>" alt="">
                        </div>
                        <div class="caption">
                            <p class="product_name">
                            <?php echo $row["product_name"]; ?>
                            </p>
                            <p class="price"><b>$
                                <?php echo $row["total_amount"]; ?>
                                </b></p>
                            <p class="quantity"><b>Quantity:
                                <?php echo $row["quantity"]; ?>
                                </b></p>
                        </div>
                        <div class="rmbtn">
                        <button class="cancelorder" data-order-id="<?php echo $row["order_id"]; ?>">Cancel order</button>
                    </div>
                    </div>
                    <?php
                }
            } else {
                echo "<h2>No orders</h2>";
            }
            ?>
        </div>

   
    </section>

    <script>
    document.querySelectorAll('.cancelorder').forEach(button => {
        button.addEventListener('click', function () {
            const orderId = this.getAttribute('data-order-id');

            // Send the item name to the server to remove from the cart
            fetch('cancelorder.php?order_id=' + orderId, { method: 'POST'})
                .then(response => {
                    if (response.ok) {
                        return response.text(); // Retrieve the response as text
                    } else {
                        throw new Error('Network response was not ok.');
                    }
                })
                .then(data => {
                    console.log(data); // Log the response from the server
                    // Remove the item from the cart visually if deletion was successful
                    const itemToRemove = this.closest('.card');
                    if (itemToRemove) {
                        itemToRemove.remove();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });

    </script>

</body>
</html>
